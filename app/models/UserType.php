<?php 
	class UserType extends Eloquent {
		protected $table = "usertype"; 
		protected $primaryKey = 'id';
		public static function loadUserType(){
				$info = UserType::Where('deleted','=','0')
							  ->get();
				return $info;
		}//End load Types
	}