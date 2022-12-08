<?php 
	class Exchange extends Eloquent {
		protected $table = "exchange"; 
		protected $primaryKey = 'id';

		public static function loadExchange(){
				$info = Exchange::Where('deleted','=','0')->get();
				return $info;
		}//End load city

		
	}
