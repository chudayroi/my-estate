<?php 
	class Group extends Eloquent {
		protected $table = "group"; 
		protected $primaryKey = 'id';
		public static function loadGroup($item_id){
			$info = Group::Where('deleted','=','0')
									->Where('item_id','=',$item_id)
									->get();
		    return $info;
		}
		
	}