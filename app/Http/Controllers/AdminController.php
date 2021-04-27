<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Response,Redirect;
use Yajra\Datatables\Datatables;


class AdminController extends Controller
{
    

    public function AdminLogin(){
        return view('Admin.AdminLogin');
    }

    public function LoginAdmin(Request $request){

		$email = $request->input("admin_email");
		$password = $request->input("admin_password");
		// die("email ".$email." pass ".$password);

		$data = DB::table("users")
		->where("email","=",$email)
		->where("password","=",$password)
		->get();
		
		if(count($data) == 0)
		{
			return response()->json(['success' => false, 'message' => 'Invalid credentials']);
		}

		$row = $data[0];

		$request->session()->put('id', $row->id);
		$request->session()->put('role_id', $row->role_id);
		$request->session()->put('name', $row->name);
		$request->session()->put('email', $row->email);
		// $request->session()->put('directory_send', $DirectorySend);
		// $request->session()->put('directory_recieved', $DirectoryRecieved);

		if (Session::get('role_id') == 1) {

			return response()->json(['success' => true, 'message' => 'Admin login successfully']);
			

			
			
		}else if (Session::get('role_id') == 2){
			
			return response()->json(['success' => true, 'message' => 'User login successfully']);
		

		}else {
			
			die("<div class='alert alert-danger'>Invalid credentials</div>");

		}

	}
	public function Dashboard(Request $request){

		return view('Admin/Dashboard');
		
	}


	public function UsersShowList(){
		$data = DB::table('users')
		->where('role_id','=',2)
		->get();
		return Datatables::of($data)
		->addColumn("action", function($data){
		return '<a href="edit-user/'.($data->id).'" class="btn btn-sm btn-primary">Edit</a>';
		})
		->addColumn("status", function($data){
			if($data->status == 1){
				return '<input type="checkbox" id="status" name="user_status" onclick="ChangeStatus('.$data->id.')" value="'.$data->status.'" title="Active" checked data-toggle="toggle">';

			}else{
				return '<input type="checkbox" id="status" name="user_status" onclick="ChangeStatus('.$data->id.')" value="'.$data->status.'" title="Deactivate" data-toggle="toggle">';

			}
		})
		->rawColumns(["action",'status'])
		->make(true);
		
	}


	public function ChangeStatus(Request $request)
	{
		$id = $request->input('id');
		$status = $request->input('status');
		// die('#'.$status);
		if($status == 1){
		$data =	DB::table('users')->where('id',$id)->update(['status'=>'0']);
			return response()->json(['success'=>'true','message'=>'User Deactivated Successfully']);


		}elseif($status == 0){
			$data =	DB::table('users')->where('id',$id)->update(['status'=>'1']);
			return response()->json(['success'=>'true','message'=>'User Activated Successfully']);
		}
	}


	public function EditUser($id){
		$data = DB::table('users')
		->where('id',$id)
		->get();
		return view('Admin.user_edit',['user'=>$data[0]]);
	}

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

	public function UserRemove(Request $request){
		$data = DB::table('users')
		->where('id',$request->input('id'))
		->delete();
		return response()->json(['success' => true, 'message' => 'User Deleted']);
	}

	public function Logout(Request $request){
		$request->session()->flush();
		$request->session()->regenerate();
		return redirect('/');
	}
	
}
