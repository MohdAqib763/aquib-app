<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;
use Yajra\Datatables\Datatables;


class AuthController extends Controller
{
	

	public function Register(Request $request){
		return view('Authentication/Register');
	}
	public function UserStore(Request $request){
		

		$name = $request->input("user_name");
		$mobile = $request->input("user_mobile");
		$city = $request->input("city");
		$email = $request->input("user_email");
		$state = $request->input("state");
		$country = $request->input("country");
		$pincode = $request->input("pincode");
		$password = $request->input("user_password");
		// die("user_email ".$user_email." pass ".$user_password);

		$validate = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
        ], [
            'user_name.required' => 'Please enter Name ',
            'user_email.unique' => 'This email has already been taken, username must be unique',
        ]);

		$ImgNameToStore = " ";
		if ($request->hasFile('image')) {
			$this->validate($request, [
			'image' => 'required|image|mimes:jpeg,png,JPG,gif,svg|max:1999',
			]);
			//Product Image 1
			
			//Get file name with Extension
			$ImgNameWithExt = $request->file('image')->getClientOriginalName();
			//Get Just file name
			$ImgName = pathinfo($ImgNameWithExt, PATHINFO_FILENAME);
			//Get just extension
			$ext = $request->file('image')->extension();
			//File Name to Store
			$ImgNameToStore = $ImgName.'_'.time().'.'.$ext;
			//Upload Image
			$Profile_img = $request->file('image')->move(public_path('/img'), $ImgNameToStore);
        }

		$user_data = array(
			"name"			=>$name,
			"role_id" 		=> 2,
			"email"			=>$email,
			"phone"			=>$mobile,
			"city"			=>$city,
			"country"		=> $country,
			"state"			 => $state,
			"pincode"		 => $pincode,
			"picture"		 => $ImgNameToStore,
			"password" 		=> $password,
		);

		$data = DB::table("users")->insert($user_data);
		
		if($data != ""){

			return response()->json(['success' => true, 'message' => 'User registered successfully']);

		}else{

			return response()->json(['success' => false, 'message' => 'Please provide proper information']);

		}

	}

	
	
}