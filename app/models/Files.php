<?php 
	class Files extends Eloquent {
		protected $table = "files"; 
		protected $primaryKey = 'id';

		public static function loadFile($product_id,$category_id){
				$info = Files::Where('deleted','=','0')
							->Where('products_id','=',$product_id)
							->Where('categories_id','=',$category_id)
							->get();
				return $info;
		}//End loadFile
		public static function getListImage($product_id,$category_id)
		{
			 $info=array();
			$info = Files::Where('deleted','=','0')
							->Where('categories_id','=',$category_id)
							->Where('products_id','=',$product_id)
								->Select('files.name as image')
								->get(); 
			return $info;
		}
		
	}
