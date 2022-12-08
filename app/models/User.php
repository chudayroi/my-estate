<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	public static function createUser($data){
		$user = new User();
        $user->email=$data['register_email'];
        $user->password=Hash::make($data['register_password']);
        $user->first_name=$data['register_first_name'];
        $user->last_name=$data['register_last_name'];
        $user->usertype_id=3;
        $user->amount=2000000;
        $user->total_uptin=1000000;
        $user->usertype_id=3;
        $user->usertype_id=3;
        $user->fb_fullname =$data['register_first_name'] . ' '. $data['register_last_name'];
        $user->save();
        $user_id='';
        $user_id = $user->id;
        $exchange = new Exchange();
        $exchange->user_id=$user_id;
        $exchange->amount=2000000;
        $exchange->content="Khuyến mãi 2 triệu cho tạo tài khoản mới";
        $exchange->ex_date=date('Y-m-d');
        $exchange->save();
        return true;
	}
	public static function createNewUser($data){
		$user = new User();
        $user->email=$data['user_email'];
        $user->password=Hash::make($data['user_password']);
        $user->first_name=$data['user_first_name'];
        $user->usertype_id=$data['usertype'];
        $user->last_name=$data['user_last_name'];
        $user->amount=2000000;
        $user->total_uptin=1000000;
        $user->fb_fullname =$data['user_first_name'] . ' '. $data['user_last_name'];
        $user->save();
        return true;
	}
	public static function getUserList(){
		
		$info=array();
		$info=User::Where('deleted','=','0')
					->get();
		return $info;
	}
	public static function getUserById($user_id){
		
		$info=array();
		$info=User::Where('deleted','=','0')
					->Where('id','=',$user_id)
					->get()->first();
		return $info;
	}
	public static function updateUser($user_id,$data){
		if($data['checkbox_password'] ==1){
			$update = array(
					'email'=>$data['user_email'],
					'first_name'=>$data['user_first_name'],
					'last_name'=>$data['user_last_name'],
					'usertype_id'=>$data['usertype'],
					'password' => Hash::make($data['user_password']),
					'fb_fullname'=>$data['user_first_name'] . ' '. $data['user_last_name']
			);
		}
		else {
			$update = array(
					'email'=>$data['user_email'],
					'first_name'=>$data['user_first_name'],
					'last_name'=>$data['user_last_name'],
					'usertype_id'=>$data['usertype'],
					'fb_fullname'=>$data['user_first_name'] . ' '. $data['user_last_name']
			);
		}
		
		$update = User::Where('id','=',$user_id)
									->update($update);
	return true;
		 
	}
	public static function checkEmail($email){
		 if(User::Where('email','=',$email)->count()>0) return "false";
        else return "true";
	}
	public static function getUserByEmail($email){
		
		$info=array();
		$info=User::Where('deleted','=','0')
					->Where('email','=',$email)
					->first();
		return $info;
	}
	public static function updatePassword($email,$password){
		$update = array(
					'password' => Hash::make($password)
			);
		$update = User::Where('email','=',$email)
									->update($update);
		return true;
	}
}
