<?php 
	class Tags extends Eloquent {
		protected $table = "tags"; 
		protected $primaryKey = 'id';

		public static function loadTags($id){
				$info = Tags::Where('deleted','=','0')
						->Where('id','=',$id)
						->first();
				return $info;
		}//End load city
		public static function loadProductByTag($info){
				if(Auth::check()) $user_id = Auth::user()->id;
				else $user_id='1';
				$data = Products::getWhereOfUser($user_id);
				$categories_id = '';
				$type_id = '';
				$district_id = '';
				$city_id = '';
				$street_id='';
				$sortby = array();
				$area= array();
				$amount= array();
				$sortby = Products::getSortBy($info['sortby']);
				$area = Products::getArea($info['area']);
				$amount = Products::getAmount($info['amount']);
				$categories_id = $info['category'];
				$type_id = $info['type'];
				$district_id = $info['district'];
				//$street_id = $info['street'];
				$city_id = $info['city'];
				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('street','street.id','=','products.street_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Join('city','city.id','=','products.city_id')
								->Where('products.deleted','=','0')
								->Where('products.user_id',$data['operator'],$data['user_id'])
								->Where('products.types_id','like','%'.$type_id.'%')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('products.district_id','like','%'.$district_id.'%')
								->Where('products.street_id','like','%'.$street_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.amount',array($amount['fromamount'],$amount['toamount']))
								->orderBy(DB::raw($sortby['orderBy']),$sortby['typeorderby'])
								->select('products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function loadTagCity(){
				
				$info = Tags::Where('deleted','=','0')
							->Where('district_id','=','')
								 ->get();
			
			return $info;
		}//End load Products
		
	}
