<?php 
	class Unit extends Eloquent {
		protected $table = "unit"; 
		protected $primaryKey = 'id';
		public static function loadAreaUnit(){
				$info = Unit::Where('deleted','=','0')
							->Where('type','=','area')
							->get();
				return $info;
		}//End load Types
		public static function loadAmountUnit(){
				$info = Unit::Where('deleted','=','0')
							->Where('type','=','amount')
							->get();
				return $info;
		}//End load Types
	}