<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Session,Response,Redirect;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class UserController extends Controller
{
	public function User(Request $request){
		$users = DB::table('users')
		->where('id',Session::get('id'))
		->get();
		// dd($users);
		return view('Users/Dashboard',['users'=>$users[0]]);
		
	}
	
	// public function Profile(Request $request){
	
	// 	$users = DB::table('admin')
	// 	->where('role_id',Session::get('role_id'))
	// 	->get();

	// 	return view('Users.UserProfile',['users'=>$users[0]]);
		
	// }

	public function ProfileUpdate(Request $request){

		$user_id = $request->input("user_id");
		$name = $request->input("user_name");
		$mobile = $request->input("user_mobile");
		$city = $request->input("city");
		$email = $request->input("user_email");
		$state = $request->input("state");
		$country = $request->input("country");
		$pincode = $request->input("pincode");
		$password = $request->input("user_password");
		$status = $request->input('account_status');
		// die("user_email ".$user_email." pass ".$user_password);

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
				"status"		=> $status
			);

        }else{

			$user_data = array(
				"name"			=>$name,
				"role_id" 		=> 2,
				"email"			=>$email,
				"phone"			=>$mobile,
				"city"			=>$city,
				"country"		=> $country,
				"state"			 => $state,
				"pincode"		 => $pincode,
				"password" 		=> $password,
				"status"		=> $status
			);
		}

	

		$data = DB::table("users")->where('id',$user_id)->update($user_data);
		die('<div class="alert alert-success">Profile Updated Successfully</div>');

	}

}
