<?php 
	class Types extends Eloquent {
		protected $table = "types"; 
		protected $primaryKey = 'id';
		public static function loadTypes(){
				$info = Types::Where('deleted','=','0')
						->orderBy('create_by','ASC')
						->get();
				return $info;
		}//End load Types
		public static function getTypeByTitle($title){
				$info = Types::Where('deleted','=','0')
							->Where('title','=',$title)
							  ->first();
				return $info;
		}//End load Types
		public static function getTypeById($id){
				$info = Types::Where('deleted','=','0')
							->Where('id','=',$id)
							  ->first();
				return $info;
		}//End load Types
	}