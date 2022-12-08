<?php 
	class ProductsType extends Eloquent {
		protected $table = "products_type"; 
		protected $primaryKey = 'id';

		public static function loadProductsType(){
				$info = ProductsType::Where('deleted','=','0')->get();
				return $info;
		}//End load city

		public static function loadProductsTypeById($id){
				$info = ProductsType::Where('deleted','=','0')
									->Where('id','=',$id)
									->first();
				return $info;
		}//End load city

	}
