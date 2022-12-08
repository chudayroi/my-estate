<?php 
	class Area extends Eloquent {
		protected $table = "area"; 
		protected $primaryKey = 'id';

		public static function loadArea(){
				$info = Area::Where('deleted','=','0')->get();
				return $info;
		}//End load city

		
	}
