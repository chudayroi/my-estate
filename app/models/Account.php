<?php 
	class Account extends Eloquent {
		protected $table = "account"; 
		protected $primaryKey = 'id';

		public static function loadAccount(){
				$info = Account::Where('deleted','=','0')->get();
				return $info;
		}//End load city

		
	}
