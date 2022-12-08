<?php 
	class Categories extends Eloquent {
		protected $table = "categories"; 
		protected $primaryKey = 'id';
		public static function loadCategories(){
				$info = Categories::Where('deleted','=','0')
									->Where('type','=','1')
									->orderBy('id','DESC')
									->get();
				return $info;
		}//End load Categories
		public static function getCategoryById($id){
				$info = Categories::Where('deleted','=','0')
									->Where('id','=',$id)
									->Where('type','=',1)
									->first();
				return $info;
		}//End load Categories
		public static function getCategoryByTitle($title){
				$info = Categories::Where('deleted','=','0')
									->Where('title','=',$title)
									->first();
				return $info;
		}//End load Categories
		public static function loadCategoryTinTuc(){
			$info = Categories::Where('deleted','=','0')
									->Where('type','!=','1')
									->get();
		    return $info;
		}
		public static function loadCategoryNewsById($category_id){
			$info = Categories::Where('deleted','=','0')
									->Where('type','!=','1')
									->Where('id','!=',$category_id)
									->get();
		    return $info;
		}
	}