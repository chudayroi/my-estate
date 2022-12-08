<?php 
	class District extends Eloquent {
		protected $table = "district"; 
		protected $primaryKey = 'id';
		

		public static function loadDistrict($city_id){
			$info = District::Where('deleted','=','0')
							->Where('city_id','=',$city_id)
								->get();
			
			return $info;
		}
		public static function getDistrictById($id){
				$info = District::Where('deleted','=','0')
									->Where('id','=',$id)
									->first();
				return $info;
		}//End load Categories
		public static function getDistrictByTitle($city_id,$title){
			$info = District::Where('deleted','=','0')
							->Where('city_id','=',$city_id)
							->Where('title','=',$title)
								->first();
			
			return $info;
		}

	}