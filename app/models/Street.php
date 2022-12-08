<?php 
	class Street extends Eloquent {
		protected $table = "street"; 
		protected $primaryKey = 'id';
		

		public static function loadStreet($district_id){
			$info = Street::Where('deleted','=','0')
							->Where('district_id','=',$district_id)
								->get();
			
			return $info;
		}
		public static function getStreetById($id){
				$info = Street::Where('deleted','=','0')
									->Where('id','=',$id)
									->first();
				return $info;
		}//End load Categories

	}