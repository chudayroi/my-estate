<?php 
	class ProgramUptin extends Eloquent {
		protected $table = "program_uptin"; 
		protected $primaryKey = 'id';

		public static function loadProgramUptin(){
				$info = ProgramUptin::Where('deleted','=','0')->get();
				return $info;
		}//End load city
		public static function loadProgramUptinById($id){
				$info = ProgramUptin::Where('deleted','=','0')
									->Where('id','=',$id)
									->first();
				return $info;
		}//End load city

		
	}
