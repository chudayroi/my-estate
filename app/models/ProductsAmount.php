<?php 
	class ProductsAmount extends Eloquent {
		protected $table = "products_amount"; 
		protected $primaryKey = 'id';
		
		public static function loadProductsAmount(){
				$info = ProductsAmount::Where('deleted','=','0')->get();
				return $info;
		}//End load city
		public static function getAmount($id)
		{
			
		}
				
	}