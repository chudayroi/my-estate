<?php

class DangTinController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function getDangtin()
	{
		/*$user_id = Auth::user()->id;
        Log::info('user_id: '.$user_id);
*/
		$info =array();
		$type_list=array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$startdate='';
		$enddate='';
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$districts =array();
		$streetinfo=array();
		$product_dangtin = array();
		$products_type = array();
		$products_type = ProductsType::loadProductsType();

		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$amount_unit = Unit::loadAmountUnit();
		$cityinfo = City::loadCity();
		$city_id=0;
		$districts = District::loadDistrict($city_id);
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$startdate= date('m/d/Y');
		$enddate= date('m/d/Y', strtotime('+1 month'));
		$type_list = Types::getTypeByTitle($info_search['type']);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		
		return View::make('dangtin/add')->with(array('startdate'=>$startdate,'products_type'=>$products_type,'enddate'=>$enddate,'news_common'=>$news_common,'product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list));
	}
	public function detailDangtin($name)
	{
		$product_id= substr ( $name , strrpos($name,'-')+1);
		$info =array();
		$products =array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$districts =array();
		$cityinfo = City::loadCity();
		$product_dangtin = array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$amount_unit = Unit::loadAmountUnit();
		$city_id=0;
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['street']='';
		$info_search['district']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$products = Products::loadDetailProduct($product_id);
		$categoryId = $products['categories_id'];
		$info_category = Categories::getCategoryById($categoryId);

		$images = Files::getListImage($product_id,$categoryId);
		$limit =8;
		$productlist = Products::getListProduct($product_id,$limit);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		
		return View::make('dangtin/detail')->with(array('product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'products'=>$products,'images'=>$images,'productlist'=>$productlist,'info_category'=>$info_category));;
	}
	public function postDangtin(){
		$info  =array();
		if(empty($_FILES['file']['name'])){
			return 'error';
		}
		if($_FILES["file"]["error"]>0){
		 	

		}
		else{
			//echo "Đã upload file: ".$_FILES["file"]["name"];
			//save file den upload
			$file_name = rand().'-'.$_FILES["file"]["name"];
			move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/".$file_name);
			$info['file_name'] = $file_name;
			return $file_name;
		}
		
	}
	public function createProduct(){
		$info  =array();
		$data  =array();
		$info = Input::all();
		$rules =array(
            "title" =>"required|min:2",
            "area" =>"required|numeric|min:2",
            "amount" =>"required|numeric|min:1",
            "content" =>"required|min:6",
            "city" =>"required",
            "district" =>"required",
            "datepicker_start"=>"required"
            );
		//$product="2";
		$data['report']= false;
		$data['product_id']= '';
        if(!Validator::make(Input::all(),$rules)->fails()){
            $product_id = Products::createProduct($info);
			$data['report']= true;
			$data['product_id']= $product_id;
        }
        
       return json_encode($data);
	}
	public function editDangtin($name){
		//Declare variable
		$product_id= substr ( $name , strrpos($name,'-')+1);
		$info =array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$districts = array();
		$amount_unit =array();
		$product =array();
		$file =array();
		$categoryId='';
		//End Declare variable
		
		$cityinfo = City::loadCity();
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$product = Products::loadProduct($product_id);
		if(!empty($product->startdate)){
					$product->startdate = date('m/d/Y',strtotime($product->startdate));
		}
		if(!empty($product->enddate) && $product->enddate!='0000-00-00'){
					$product->enddate = date('m/d/Y',strtotime($product->enddate));
		}
		else $product->enddate ='';
		$districts = District::loadDistrict($product->city_id);
		$district_id = $product->district_id;
		$streetinfo = Street::loadStreet($district_id);
		$categoryId=$product->categories_id;
		$files = Files::loadFile($product_id,$categoryId);
		$product_dangtin =array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('dangtin/edit')->with(array('product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'product'=>$product,'streetinfo'=>$streetinfo,'files'=>$files,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search));
	}
	public function updateDangtin($product_id){
		$info  =array();
		$data  =array();
		$info = Input::all();
        Log::info('page: '.Input::get('content1'));

		$rules =array(
            "title" =>"required|min:2",
            "area" =>"required|numeric|min:2",
            "amount" =>"required|numeric|min:1",
            "content" =>"required|min:6",
            "city" =>"required",
            "district" =>"required",
            "datepicker_start"=>"required"
        );
		//$product="2";
		$data['report']= false;
        if(!Validator::make(Input::all(),$rules)->fails()){
            $product_id = Products::updateProduct($info,$product_id);
			$data['report']= true;
        }
        
       return json_encode($data);
	}
	public function getListDangtin(){

        $list =array();  
        $info_search =array();
        $data =array();  
		$info =array();
		$products =array();
		$totalpage=0;
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$product_dangtin = array();
		$amount_unit =array();
		$cityinfo = City::loadCity();
		$city_id = Input::get('city');
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$sortby = Input::get('sortby');
        //Log::info('page: '.$sortby);
        $total_uptin =0;
		$total_uptin = Auth::user()->total_uptin;

		$i=0;
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$amount_unit = Unit::loadAmountUnit();
		$info_search = Input::all();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$products_list = Products::loadMyTin($info_search['category']);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = $product->startdate;
				$products[$i]['district'] = $product->district;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['city'] = $product->city;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		if($i>0){
			$perPage = 50;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        }
        $common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
       		return View::make('dangtin/list')->with(array('total_uptin'=>$total_uptin,'product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'districts'=>$districts,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'products'=>$products,'list'=>$list,'totalpage'=>$totalpage,'info_search'=>$info_search));
	}
	public function loadDangtin(){
		$info  =array();
		$info_search=array();
		$data  =array();
		$list  =array();
		$products_list =array();
		$totalpage=0;
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$cityinfo = City::loadCity();
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$sortby = Input::get('category');
		$type = Input::get('type');
		$street = Input::get('street');
        Log::info('page: '.$street);
		$info = Input::all();
		$i=0;
		$products_list = Products::loadMyTinCity($info);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = $product->startdate;
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		$perPage = 30;
		if($i>0){
			$currentpage=Input::get('page');
	        //Log::info('page: '.$currentpage);
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
	      	//$list['currentpage'] =1;
        }
       return $list;
	}

	public function postListDangtin(){
		$list =array();  
        $data =array();  
		$info =array();
		$totalpage=0;
		$products =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$districts=array();
		$area_unit =array();
		$amount_unit =array();
		$cityinfo = City::loadCity();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$amount_unit = Unit::loadAmountUnit();
		$city_id = Input::get('city');
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);

		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$products_list = Products::getIdProducts();
		$info=Input::all();
        //Log::info('page: '.$sortby);
		$i=0;
		$products_list = Products::searchMyTin($info);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = $product->startdate;
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		if($i>0){
			$perPage = 30;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
		}
		$product_dangtin =array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
        //$data['totalchurch'] = count($products);
        //$data['totalpage'] = $totalpage;
		return View::make('dangtin/list')->with(array('product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'districts'=>$districts,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'products'=>$products,'list'=>$list,'totalpage'=>$totalpage,'info_search'=>$info));

	}
	public function deleteDangtin(){
		$info = array();
		$id= Input::get('id');
		$images = array();
		//$result = Products::deleteProductById($id);
        $tin = Products::loadProduct($id);
        $category_id = $tin['categories_id'];
		$images =  Files::Where('products_id','=',$id)
	     					->get(); 
	   
	   
		$info = Products::Where('id','=',$id)
				             //->delete();
				             ->update(array('deleted' => 1));
				$info = Files::Where('products_id','=',$id)
								->Where('categories_id','=',$category_id)
				     		->delete();
				//->update(array('deleted' => 1));
       // Log::info('page: '.Input::get('id'));
	     
		return $images;
	}
	public function upDangtin(){
		$info = array();
		$id= Input::get('id');

		if(Auth::user()->total_uptin >0){
			$result = Products::upProductById($id);
			//exchange uptin
			$product_up = Products::loadDetailProduct($id);
			$user_id = Auth::user()->id;
			$total_uptin = Auth::user()->total_uptin -1 ;
			$excess = $total_uptin-1;
			$exchange = new Exchange();
			$exchange->user_id=$user_id;
			$exchange->amount='-1';
			$exchange->content="Uptin :".$product_up->title;
			$exchange->ex_date=date('Y-m-d');
			$exchange->save();
			
			//Exchange uptin
			//uptin
			
			$update = array(
				'total_uptin'=>$total_uptin
			);
			$update = User::Where('id','=',$user_id)
					->update($update);
		//end uptin
				//$info['total_uptin']=$total_uptin;
				$info['total_uptin_conlai']=$total_uptin;
        //Log::info('page: '.Input::get('id'));
		}
			else $info['check_total_uptin']=0;

		return $info;
	}
	public function postAllUp(){
		$info = array();
		$id= Input::get('id');
		$user_id = Auth::user()->id;
		$count_product = Products::countProductByUserId($user_id);
		$total_uptin = Auth::user()->total_uptin;
		if(Auth::user()->total_uptin > 0){ 
			if($count_product <= $total_uptin) $total_uptin = $count_product;
			else $total_uptin = $total_uptin;
			$result = Products::upProductByUserId($user_id,$total_uptin);
			
			$exchange = new Exchange();
			$exchange->user_id=$user_id;
			$exchange->amount=$total_uptin;
			$exchange->content="Uptin ".$total_uptin." tin";
			$exchange->ex_date=date('Y-m-d');
			$exchange->save();
			$total_uptin_conlai = Auth::user()->total_uptin - $total_uptin ;
			$update = array(
				'total_uptin'=>$total_uptin_conlai
			);
			$update = User::Where('id','=',$user_id)
					->update($update);
			$info['total_uptin']=$total_uptin;
				$info['total_uptin_conlai']=$total_uptin_conlai;
			}
			else $info['check_total_uptin']=0;
				
		return $info;
	}
	public function mualuotupDangtin()
	{
		$info =array();
		$type_list=array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$startdate='';
		$enddate='';
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$districts =array();
		$streetinfo=array();
		$product_dangtin = array();
		$products_type = array();
		$products_type = ProductsType::loadProductsType();

		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		$amount_unit = Unit::loadAmountUnit();
		$cityinfo = City::loadCity();
		$city_id=0;
		$districts = District::loadDistrict($city_id);
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$startdate= date('m/d/Y');
		$enddate= date('m/d/Y', strtotime('+1 month'));
		$type_list = Types::getTypeByTitle($info_search['type']);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		$program_uptin = array();
		$program_uptin = ProgramUptin::loadProgramUptin();
		return View::make('dangtin/mualuotuptin')->with(array('program_uptin'=>$program_uptin,'startdate'=>$startdate,'products_type'=>$products_type,'enddate'=>$enddate,'news_common'=>$news_common,'product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list));
	
	}
	public function postmualuotupDangtin()
	{
		$info = array();
		$id= Input::get('id');
		//exchange uptin
		$program_uptin = ProgramUptin::loadProgramUptinById($id);
		$user_id = Auth::user()->id;
		$excess = Auth::user()->amount - $program_uptin->amount;
		$exchange = new Exchange();
		$exchange->user_id=$user_id;
		$exchange->amount='-'.$program_uptin->amount;
		$exchange->content="Mua Lượt Up :".$program_uptin->total;
		$exchange->ex_date=date('Y-m-d');
		$exchange->save();
		$update = array(
			'amount'=>$excess,
			'total_uptin'=>$program_uptin->total
		);
		$update = User::Where('id','=',$user_id)
				->update($update);
		//Exchange uptin
        //Log::info('page: '.Input::get('id'));

		return $info;
	}
	public function getMyDangtin($page1){

        $list =array();  
        $info_search =array();
        $data =array();  
		$info =array();
		$products =array();
		$totalpage=0;
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$product_dangtin = array();
		$amount_unit =array();
		$streetinfo =array();
		$districts =array();
	/*	$cityinfo = City::loadCity();
		$city_id = Input::get('city');
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		*/
		//$sortby = Input::get('sortby');
        //Log::info('page: '.$sortby);
        $total_uptin =0;
		$total_uptin = Auth::user()->total_uptin;

		$i=0;
		$limit = 8;
		//$product_dangtin = Products::loadProductList($limit);
		//$amount_unit = Unit::loadAmountUnit();
		$info_search = Input::all();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$products_list = Products::loadMyTin($info_search['category']);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = $product->startdate;
				$products[$i]['district'] = $product->district;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['city'] = $product->city;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		
		//
		 $perPage = 20;
       // $currentPage = Input::get('page') -1;
        $currentpage = $page1;

       if(empty($currentpage)) $currentpage =1;
        if($currentpage ==1 ) $data['nextpage'] =0;
        $data['prepage'] = $currentpage;
        if($currentpage == 1) $data['prepage'] = 1;
        if($currentpage >1) $data['prepage']--;
        $data['nextpage'] = $currentpage;
		$totalpage = ceil(count($products)/$perPage);
        if($currentpage < $totalpage ){
            $data['last'] = $perPage*$currentpage;
            $data['nextpage']++; 
            $data['start'] = $data['last'] - $perPage +1; 
        }
        else if($currentpage == $totalpage){
            $data['last'] = $perPage*$currentpage;
            $data['nextpage'] =$currentpage; 
            $data['start'] = ($totalpage -1)*$perPage +1;
        }
        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        $data['totalchurch'] = count($products);
        $data['totalpage'] = $totalpage;
		//
		//tin tuc

        $common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		//
       		return View::make('dangtin/list')->with(array('total_uptin'=>$total_uptin,'product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'districts'=>$districts,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'products'=>$products,'list'=>$list,'totalpage'=>$totalpage,'info_search'=>$info_search,'currentpage'=>$currentpage,'data'=>$data));
	}
}
