<?php 
	class Products extends Eloquent {
		protected $table = "products"; 
		protected $primaryKey = 'id';
		//part of dangtin
		public static function loadMyTin($category_id){
			$data=array();
			$info=array();
			if(Auth::check()) $user_id = Auth::user()->id;
			else $user_id='1';
			$data = Products::getWhereOfUser($user_id);
        	//Log::info('user_id: '.$user_id);

				$info = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								->Where('products.user_id',$data['operator'],$data['user_id'])
								->Where('products.categories_id','like','%'.$category_id.'%')
								->orderBy('products.updated_at','DESC')
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $info;
		}//End load Products
		public static function searchMyTin($info){
				if(Auth::check()) $user_id = Auth::user()->id;
				else $user_id='1';
				$data = Products::getWhereOfUser($user_id);
				$categories_id = '';
				$type_id = '';
				$district_id = '';
				$city_id = '';
				$sortby = array();
				$area= array();
				$amount= array();
				$sort =0;
				$sortby = Products::getSortBy($sort);
				$area = Products::getArea($info['area']);
				$amount = Products::getAmount($info['amount']);
				$categories_id = $info['category'];
				$type_id = $info['type'];
				$district_id = $info['district'];
				$street_id = $info['street'];
				$city_id = $info['city'];
				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Join('city','city.id','=','products.city_id')
								->Join('street','street.id','=','products.street_id')
								->Where('products.deleted','=','0')
								->Where('products.user_id',$data['operator'],$data['user_id'])
								->Where('products.types_id','like','%'.$type_id.'%')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('categories.type','=','1')
								->Where('products.district_id','like','%'.$district_id.'%')
								->Where('products.street_id','like','%'.$street_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.total_amount',array($amount['fromamount'],$amount['toamount']))
								->orderBy(DB::raw($sortby['orderBy']),$sortby['typeorderby'])
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.title as title','products.image as image','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function loadMyTinCity($info){
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
								->Where('categories.type','=','1')
								->Where('products.user_id',$data['operator'],$data['user_id'])
								->Where('products.types_id','like','%'.$type_id.'%')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('products.district_id','like','%'.$district_id.'%')
								->Where('products.street_id','like','%'.$street_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.total_amount',array($amount['fromamount'],$amount['toamount']))
								->orderBy(DB::raw($sortby['orderBy']),$sortby['typeorderby'])
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function getWhereOfUser($user_id){
			$data=array();
				switch($user_id){
				
				case 1:
					$data['operator'] = 'like';
					$data['user_id'] = '%';
					break;
				default:
					$data['operator'] = '=';
					$data['user_id'] = $user_id;
					
			}
			return $data;
		}//End load Products
		//End part dangtin
		public static function loadProduct($id){

				$info = Products::Where('deleted','=','0')
								  ->Where('id','=',$id)
								  ->get()->first(); 
				return $info;
		}//End load Products
		public static function loadDetailProduct($id){

				$info = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Where('products.deleted','=','0')
								->Where('products.id','=',$id)
								->Select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.title as title','products.content as content','products.content_summary as content_summary','products.area as area',
									'products.amount as amount','products.amount_unit_id as amount_unit_id','products.categories_id as categories_id','products.tags as tags','products.street as street','district.name as district',
									'city.name as city','city.title as city_title','unit.name as amount_unit')
								->first(); 
				return $info;
		}//End load Products
		public static function loadMyProduct($category_id){
        	//Log::info('user_id: '.$user_id);

				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								->Where('categories.type','=','1')
								->Where('products.categories_id','like','%'.$category_id.'%')
								->orderBy('products.updated_at','DESC')
								->select('products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function loadMyProject(){
				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Where('categories.type','=','1')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								->Where('products.categories_id','=','1')
								->orderBy('products.updated_at','DESC')
								->take(3)
								->select('products.products_type_id as products_type_id','products.id as id','products.content as content','products.content_summary as content_summary','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		//get sortby
		public static function getSortBy($id){
			$data =array();
			switch($id){
				case 2:
					$data['orderBy'] = 'products.updated_at';
					$data['typeorderby'] = 'DESC';
					break;
				case 3:
					$data['orderBy'] = 'products.updated_at';
					$data['typeorderby'] = 'ASC';
					break;
				case 4:
					$data['orderBy'] ='products.total_amount';
					$data['typeorderby'] = 'DESC';
					break;

				case 5:
					$data['orderBy'] = "products.total_amount";
					$data['typeorderby'] = 'ASC';
					break;
				case 6:
					$data['orderBy'] = "products.area";
					$data['typeorderby'] = 'DESC';
					break;
				case 7:
					$data['orderBy'] = "products.area";
					$data['typeorderby'] = 'ASC';
					break;
				default:
					$data['orderBy'] = 'products.updated_at';
					$data['typeorderby'] = 'DESC';
					break;

			}
			return $data;
			
		}
		//edn get sorrtby
		//get area
		public static function getArea($id){
			$data =array();
			switch($id){
				
				case 1:
					$data['fromarea'] = '0';
					$data['toarea'] = '100';
					break;
				case 2:
					$data['fromarea'] = '100';
					$data['toarea'] = '500';
					break;
				case 3:
					$data['fromarea'] ='500';
					$data['toarea'] = '1000';
					break;

				case 4:
					$data['fromarea'] = "1000";
					$data['toarea'] = '1000000';
					break;
				default:
					$data['fromarea'] = '0';
					$data['toarea'] = '1000000';
					
			}
			return $data;
			
		}
		//edn get area
		//get amount
		public static function getAmount($id){
			$data =array();
			switch($id){
				
				case 1:
					$data['fromamount'] = '0';
					$data['toamount'] = '300';
					break;
				case 2:
					$data['fromamount'] = '300';
					$data['toamount'] = '500';
					break;
				case 3:
					$data['fromamount'] ='500';
					$data['toamount'] = '1000';
					break;

				case 4:
					$data['fromamount'] = "1000";
					$data['toamount'] = '1000000000';
					break;
				default:
					$data['fromamount'] = '0';
					$data['toamount'] = '1000000000';
			}
			return $data;
			
		}
		//edn get amount

		public static function loadMyProductCity($info){
				$categories_id = '';
				$type_id = '';
				$district_id = '';
				$city_id = '';
				$sortby = array();
				$area= array();
				$amount= array();
				$sortby = Products::getSortBy($info['sortby']);
				$area = Products::getArea($info['area']);
				$amount = Products::getAmount($info['amount']);
				$categories_id = $info['category'];
				$type_id = $info['type'];
				$district_id = $info['district'];
				$street_id = $info['street'];
				$city_id = $info['city'];
				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Join('street','street.id','=','products.street_id')
								->Join('city','city.id','=','products.city_id')
								->Where('products.deleted','=','0')
								->Where('products.types_id','like','%'.$type_id.'%')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('categories.type','=','1')
								->Where('products.district_id','like','%'.$district_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								//->Where('products.street_id','like','%'.$street_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.total_amount',array($amount['fromamount'],$amount['toamount']))
								->orderBy(DB::raw($sortby['orderBy']),$sortby['typeorderby'])
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function searchMyProduct($info){
				$categories_id = '';
				$type_id = '';
				$district_id = '';
				$city_id = '';
				$sortby = array();
				$area= array();
				$amount= array();
				$sort =0;
				$sortby = Products::getSortBy($sort);
				$area = Products::getArea($info['area']);
				$amount = Products::getAmount($info['amount']);
				$categories_id = $info['category'];
				$type_id = $info['type'];
				$district_id = $info['district'];
				$city_id = $info['city'];
				$street_id = $info['street'];
				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Join('city','city.id','=','products.city_id')
								->Join('street','street.id','=','products.street_id')
								->Where('products.deleted','=','0')
								->Where('products.types_id','like','%'.$type_id.'%')
								->Where('categories.type','=','1')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								->Where('products.district_id','like','%'.$district_id.'%')
							    ->Where('products.street_id','like','%'.$street_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.total_amount',array($amount['fromamount'],$amount['toamount']))
								->orderBy(DB::raw($sortby['orderBy']),$sortby['typeorderby'])
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.title as title','products.image as image','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		public static function getIdProducts(){

				$info = Products::Where('deleted','=','0')
								  ->get();
				return $info;
		}//End load Products
		public static function getListProduct($id,$limit){

				
				$info = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								//->Where('products.categories_id','=','1')
								->Where('categories.type','=','1')
								->orderBy('products.updated_at','DESC')
								
								->take($limit)
								->select('products.products_type_id as products_type_id','products.id as id','products.content as content','products.content_summary as content_summary','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
				->get();
				return $info;
		}//End load Products
		public static function loadProductList($limit){
		$info = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								->Where('categories.type','=','1')
								
								->orderBy('products.updated_at','DESC')
								->take($limit)
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				
				return $info;
		}//End load Products
		public static function createProduct($data){
				$name = Products::convert_vi_to_en($data['title']);
				$data['total_amount'] =0;
				//$city_id =$data['img1'];
				if(!empty($data['datepicker_start'])){
					$data['datepicker_start'] = date('Y-m-d',strtotime($data['datepicker_start']));
				}
				if(!empty($data['datepicker_finish'])){
					$data['datepicker_finish'] = date('Y-m-d',strtotime($data['datepicker_finish']));
				}
				if($data['amount_unit']=='3') $data['total_amount']= $data['amount']*1000;
				else if($data['amount_unit']=='4') $data['total_amount']= $data['amount']*$data['area'];
				$content_summary = substr($data['content'],100);
				$user_id = Auth::user()->id;
				$product = new Products();
				$product->title=$data['title'];
				$product->user_id=$user_id;
				$product->name=$name;
				$product->categories_id=$data['category'];
				$product->types_id=$data['type'];
				$product->startdate= $data['datepicker_start'];
				$product->enddate=$data['datepicker_finish'];
				$product->street=$data['street'];
				$product->street_id=$data['street_id'];
				$product->district_id=$data['district'];
				$product->city_id=$data['city'];
				$product->area=$data['area'];
				$product->area_unit_id=$data['area_unit'];
				$product->amount=$data['amount'];
				$product->total_amount=$data['total_amount'];
				$product->amount_unit_id=$data['amount_unit'];
				$product->content=$data['content'];
				$product->content_summary=$content_summary;
				$product->tags=$data['tags'];
				$product->products_type_id=$data['products_type'];
				$product->save();
				//exchange history

				$products_type = array();
				$products_type = ProductsType::loadProductsTypeById($data['products_type']);
				$amount = $products_type->amount;
				$user_id = Auth::user()->id;
				$amount_total = Auth::user()->amount;
				$excess = $amount_total-$amount;
				$exchange = new Exchange();
		        $exchange->user_id=$user_id;
		        $exchange->amount='-'.$amount;
		        $exchange->content="Đăng tin ".$products_type->name.': '.$data['title'];
		        $exchange->ex_date=date('Y-m-d');
		        $exchange->save();
				$update = array(
					'amount'=>$excess
				);
				$update = User::Where('id','=',$user_id)
									->update($update);
				//End exchange history
				$product_id = $product->id;
				for($i=1;$i<6;$i++){
					$imgs = 'img'.$i;
					if(!empty($data[$imgs])){
						if($i==1){
							$update = array(
								'image'=>$data[$imgs]
								);
							$update = Products::Where('id','=',$product_id)
									->update($update);
						}
						$img = new Files();
						$img->products_id = $product_id;
						$img->categories_id = $data['category'];
						$img->name = $data[$imgs];
						$img->save();
					}
				}
				
				return $product_id;
				
		}//End create Products
		public static function updateProduct($data,$product_id){
				//$city_id =$data['img1'];
				$name = Products::convert_vi_to_en($data['title']);
				$data['total_amount'] =0;
				if(!empty($data['datepicker_start'])){
					$data['datepicker_start'] = date('Y-m-d',strtotime($data['datepicker_start']));
				}
				if(!empty($data['datepicker_finish'])){
					$data['datepicker_finish'] = date('Y-m-d',strtotime($data['datepicker_finish']));
				}
				if($data['amount_unit']=='3') $data['total_amount']= $data['amount']*1000;
				else if($data['amount_unit']=='4') $data['total_amount']= $data['amount']*$data['area'];
				$user_id = Auth::user()->id;
				$content_summary = substr($data['content1'],100);
				if(empty($data['street_id'])) $data['street_id']='';
				$update = array(
					'title'=>$data['title'],
					'name'=>$name,
					'user_id'=>$user_id,
					'categories_id'=>$data['category'],
					'types_id'=>$data['type'],
					'startdate'=> $data['datepicker_start'],
					'enddate'=>$data['datepicker_finish'],
					'street'=>$data['street'],
					'street_id'=>$data['street_id'],
					'district_id'=>$data['district'],
					'city_id'=>$data['city'],
					'area'=>$data['area'],
					'area_unit_id'=>$data['area_unit'],
					'amount'=>$data['amount'],
					'total_amount'=>$data['total_amount'],
					'amount_unit_id'=>$data['amount_unit'],
					'content'=>$data['content1'],
					'content_summary'=>$content_summary,
					'tags'=>$data['tags1']
				);
				$update = Products::Where('id','=',$product_id)
									->update($update);
				$deleteimg = Files::Where('products_id','=',$product_id)
								    ->Where('categories_id','=',$data['category'])
									->delete();

				for($i=1;$i<6;$i++){
					$imgs = 'img'.$i;
					if(!empty($data[$imgs])){
						if($i==1){
							$update = array(
								'image'=>$data[$imgs]
								);
							$update = Products::Where('id','=',$product_id)
									->update($update);
						}
						$img = new Files();
						$img->products_id = $product_id;
						$img->categories_id = $data['category'];
						$img->name = $data[$imgs];
						$img->save();
					}
				}
				
				return $product_id;
				
		}//End update Products
		public static function deleteProductById($id){

				$info = Products::Where('id','=',$id)
				             ->update(array('deleted' => 1));
				$info = Files::Where('products_id','=',$id)
				     		->update(array('deleted' => 1));
				return $info;
		}//End load News by id
		public static function upProductById($id){
				$startdate = date('Y-m-d');
				$updateddate = date('Y-m-d H:i:s');
				$info = Products::Where('id','=',$id)
				             ->update(array('startdate' => $startdate,'updated_at'=>$updateddate));
				
				return $info;
		}//End load News by id
		public static function upProductByUserId($user_id){
				$startdate = date('Y-m-d');
				
				$info = Products::Where('deleted','=','0')
								  ->Where('user_id','=',$user_id)
								  ->orderBy('created_at','ASC')
								  ->select('id')
								  ->get(); 
								  $i=0;
				foreach($info as $product){
					$i++;
					$updateddate = date('Y-m-d H:i:s');
					$timestamp = strtotime($updateddate)+$i;
					$updateddate = date("Y-m-d H:i:s",$timestamp);
					$update = Products::Where('id','=',$product['id'])
							
				             ->update(array('startdate' => $startdate,'updated_at'=>$updateddate));
				}
				return $info;
		}//End load News by id
		public static function countProductByUserId($user_id){
				$startdate = date('Y-m-d');
				$info = Products::Where('user_id','=',$user_id)
							->Where('deleted','=','0')
				             ->count();
				
				return $info;
		}//End load News by id
		public static function convert_vi_to_en($str){
			$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
			foreach($unicode as $nonUnicode=>$uni){
				$str = preg_replace("/($uni)/i", $nonUnicode, $str);
			}
			$str = preg_replace("/[\s]+/", '-', $str); //replace n khoảng trắng thành dấu "-"  
			$str = preg_replace("/[\/]+/", '', $str);
			$str = preg_replace('/[\"]+/', '', $str);
			$str = preg_replace('/[?"]+/', '', $str);
			$str = preg_replace('/[%"]+/', '-', $str);
			$str = preg_replace('/[&"]+/', '-', $str);
			$str = preg_replace('/[("]+/', '-', $str);
			$str = preg_replace('/[)"]+/', '-', $str);
			$str = preg_replace('/[*"]+/', '-', $str);
			$str = preg_replace('/[,"]+/', '-', $str);
			$str = preg_replace('/[,]+/', '-', $str);
			return $str;

		}
		//load product by street
		public static function loadMyProductByStreet($category_id,$street_id,$product_id){
        	//Log::info('user_id: '.$user_id);

				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('street','street.id','=','products.street_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('products.deleted','=','0')
								->Where('categories.type','=','1')
								->Where('products.categories_id','like','%'.$category_id.'%')
								->Where('products.street_id','like','%'.$street_id.'%')
								->orderBy('products.updated_at','DESC')
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
		//End load product by street		
		public static function loadProductByType($category_id,$products_type){
        	//Log::info('user_id: '.$user_id);

				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('city','city.id','=','products.city_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Where('categories.type','=','1')
								->Where('products.deleted','=','0')
								->Where('products.products_type_id','=',$products_type)
								->Where('products.categories_id','like','%'.$category_id.'%')
								->orderBy('products.updated_at','DESC')
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.content_summary as content_summary','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products
        public static function getProduct($info){
				$categories_id = '';
				$type_id = '';
				$district_id = '';
				$city_id = '';
				$street_id='';
				$city_id = $info['city'];
				$district_id = $info['district'];
				$street_id = $info['street'];
				$categories_id = $info['category'];
				$types_id = $info['type'];
				$area = Products::getArea($info['area']);
				$amount = Products::getAmount($info['amount']);

				$data = Products::Join('unit','unit.id','=','products.amount_unit_id')
								->Join('district','district.id','=','products.district_id')
								->Join('categories','categories.id','=','products.categories_id')
								->Join('street','street.id','=','products.street_id')
								->Join('city','city.id','=','products.city_id')
								->Where('products.deleted','=','0')
								
								->Where('categories.type','=','1')
								->Where('products.district_id','like','%'.$district_id.'%')
								->Where('products.city_id','like','%'.$city_id.'%')
								->Where('products.street_id','like','%'.$street_id.'%')
								->Where('products.categories_id','like','%'.$categories_id.'%')
								->Where('products.types_id','like','%'.$types_id.'%')
								->WhereBetween('products.area',array($area['fromarea'],$area['toarea']))
								->WhereBetween('products.total_amount',array($amount['fromamount'],$amount['toamount']))
								->select('products.products_type_id as products_type_id','products.id as id','products.name as name','products.image as image','products.title as title','products.area as area','products.amount as amount','products.startdate as startdate',
									     'district.name as district','city.name as city','city.title as city_title','unit.name as amount_unit','categories.name as category_name','categories.title as category_title')
								  ->get();
				return $data;
		}//End load Products

}