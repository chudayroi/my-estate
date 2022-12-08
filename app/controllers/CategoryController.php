<?php

class CategoryController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	

	public function getChitiet($category,$name)
	{
		//Declare variable
		$info_category=array();
		$info =array();
		$products =array();
		$info_search =array();
		$cityinfo = array();
		$citytag =array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$districts =array();
		$products_list=array();
		$city_id=0;
		$images =array();
		
		
		$limit =8;
		$categoryId ='';
		$common_total=8;
		$i=0;
		$news_common =array();
		//End Declare variable
		$info_category = Categories::getCategoryByTitle($category);
        $category_id= $info_category['id'];
		$product_id= substr ( $name , strrpos($name,'-')+1);
		$cityinfo = City::loadCity();
		$citytag = Tags::loadTagCity();
		$district_id = '';
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$product_dangtin =array();
		//$citys= City::getIdCity($products['city_title']);
		//$categoryId = $products['categories_id'];
        $info_search['category']=$category_id;
		$info_search['type']='';
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		$images = Files::getListImage($product_id,$category_id);
		$limit = 8;
			$products_list = Products::getProduct($info_search);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['lt'] = $product->lt;
				$products[$i]['lg'] = $product->lg;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['products_type_id'] = $product->products_type_id;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		 $perPage = 12;
		 $totalpage=0;
		 if($i>0){
		 $totalpage = ceil(count($products)/$perPage);
		}
		 $page = Input::get('page');
        //$currentPage = Input::get('page') -1;
		 //$page1 =Input::get('page');
		 if(empty($page)) $page =1;
        $currentpage = $page;

      if(empty($currentpage)) $currentpage =1;
		$data['nextpage'] ='';


        if($currentpage ==1 ){
        	$data['nextpage'] =2;
			$data['prepage'] = 1;
        } 
        //$data['prepage'] = $currentpage;
        
        else if($currentpage >1 && $currentpage < $totalpage){
        	$data['prepage'] =$currentpage -1;
            $data['nextpage'] =$currentpage +1;
        } 
         
        else if($currentpage == $totalpage){
        	$data['prepage'] =$currentpage -1;

            $data['nextpage'] =$totalpage; 
        }
        $data['start'] = 1; 
	    $data['last'] = $totalpage;

        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
		$products = Products::loadDetailProduct($product_id);
        $data['category'] = $category;
		$data['city'] = $products->city_title;


        $data['page'] = $page;
        $data['totalpage'] = $totalpage;
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		
		return View::make('category/chitiet')->with(array('news_common'=>$news_common,'streetinfo'=>$streetinfo,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'list'=>$list,'images'=>$images,'info_category'=>$info_category,'products'=>$products,'data'=>$data,'currentpage'=>$currentpage,'totalpage'=>$totalpage,'citytag'=>$citytag));;
	}
	public function search(){
		
		$data=array();
		$products= array();
		$info_category=array();
		$citytag =array();
		$infoSearch = array();
		$streetinfo = array();
		$common_total=8;
		$category = '';
   	    $info_search =array();
		$cityinfo = array();
		$amounts =array();
		$districts = array();
		$category_id ='';
		$district_id='';


        $data['city'] = Input::get('city');
        $data['district'] = Input::get('district');
         $data['type'] = Input::get('type');
   	    $data['area'] = Input::get('area');
   	    $data['amount'] = Input::get('amount');
   	    $data['street'] = Input::get('street');
   	    $data['category'] = Input::get('category');
        
        $districts = District::loadDistrict(Input::get('city'));
        $cityinfo = City::loadCity();
        $streetinfo = Street::loadStreet(Input::get('district'));
        $areas = Area::loadArea();
   	    $categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit(); 
		//$amounts = Unit::loadAmountUnit();
		$amounts = ProductsAmount::loadProductsAmount();
		$citytag = Tags::loadTagCity();

		$info_search['category']=Input::get('category');
		$info_search['type']=Input::get('type');
		$info_search['district']=Input::get('district');
		$info_search['city']=Input::get('city');
		$info_search['street']=Input::get('street');
		$info_search['area']=Input::get('area');
		$info_search['amount']=Input::get('amount');

        //Log::info('page: '.$sortby);
		$i=0;
		$products_list = Products::getProduct($info_search);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['lt'] = $product->lt;
				$products[$i]['lg'] = $product->lg;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['products_type_id'] = $product->products_type_id;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		 $perPage = 12;
		 $totalpage=0;
		 if($i>0){
		 $totalpage = ceil(count($products)/$perPage);
		}
		 $page = Input::get('page');
        //$currentPage = Input::get('page') -1;
		 //$page1 =Input::get('page');
		 if(empty($page)) $page =1;
        $currentpage = $page;

      if(empty($currentpage)) $currentpage =1;
		$data['nextpage'] ='';


        if($currentpage ==1 ){
        	$data['nextpage'] =2;
			$data['prepage'] = 1;
        } 
        //$data['prepage'] = $currentpage;
        
        else if($currentpage >1 && $currentpage < $totalpage){
        	$data['prepage'] =$currentpage -1;
            $data['nextpage'] =$currentpage +1;
        } 
         
        else if($currentpage == $totalpage){
        	$data['prepage'] =$currentpage -1;

            $data['nextpage'] =$totalpage; 
        }
        $data['start'] = 1; 
	    $data['last'] = $totalpage;

        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        
        $data['page'] = $page;
        $data['totalpage'] = $totalpage;
		//
        
		//
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
        return View::make('category/batdongsanbysearch')->with(array('news_common'=>$news_common,'list'=>$list,'totalpage'=>$totalpage
			,'currentpage'=>$currentpage,'data'=>$data,'areas'=>$areas,'categories'=>$categories,'types'=>$types
			,'area_unit'=>$area_unit,'cityinfo'=>$cityinfo
			,'streetinfo'=>$streetinfo,'districts'=>$districts
			,'amounts'=>$amounts,'info_search'=>$info_search,'citytag'=>$citytag));
        
		
	}
	//theo ten duong
	

	public function getCategoryDistrict($category,$city,$district,$page){
		$data=array();

		$info_category=array();
		$citytag =array();
		$infoSearch = array();
		$streetinfo = array();
		$infoCity= City::getIdCity($city);
		$city_id = $infoCity->id;
		$info_search =array();
		$cityinfo = array();
		$common_total=8;
		$amounts =array();
		$districts = array();
		$category_id ='';
		$infoDistrict = District::getDistrictByTitle($city_id,$district);
		$district_id = $infoDistrict->id;
   	    $infoSearch['city_id'] = $city_id; 
   	    $infoSearch['district_id'] =  $district_id;
        
        $data['category'] = $category;

        //if($category =='nha-dat') $category = '';
        //$category = 'dat-tho-cu';
        $info_category = Categories::getCategoryByTitle($category);
        $category_id= $info_category['id'];
        $districts = District::loadDistrict($city_id);
        $cityinfo = City::loadCity();
        $areas = Area::loadArea();
   	    $categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit(); 
		$amounts = Unit::loadAmountUnit();
        
        $area_id = Input::get('area');
		$citytag = Tags::loadTagCity();
        //
		$info_search['category']=$category_id;
		$info_search['type']='';
		$info_search['district']=$district_id;
		$info_search['city']=$city_id;
		$info_search['street']='';
		$info_search['area']=$area_id;
		$info_search['amount']='';
		//

   	    $products_list = Products::getProduct($info_search);
		$i=0;
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
				$products[$i]['lt'] = $product->lt;
				$products[$i]['lg'] = $product->lg;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$products[$i]['products_type_id'] = $product->products_type_id;
				$i++;
		}
		 
		  $perPage = 12;
		 $totalpage=0;
		 if($i>0){
		 $totalpage = ceil(count($products)/$perPage);
		}
        $currentpage = $page;

       if(empty($currentpage)) $currentpage =1;
		$data['nextpage'] ='';


        if($currentpage ==1 ){
        	$data['nextpage'] =2;
			$data['prepage'] = 1;
        } 
        //$data['prepage'] = $currentpage;
        
        else if($currentpage >1 && $currentpage < $totalpage){
        	$data['prepage'] =$currentpage -1;
            $data['nextpage'] =$currentpage +1;
        } 
         
        else if($currentpage == $totalpage){
        	$data['prepage'] =$currentpage -1;

            $data['nextpage'] =$totalpage; 
        }
        $data['start'] = 1; 
	    $data['last'] = $totalpage;

        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        $data['city'] = $city;
        $data['district'] = $district;
        $data['page'] = $page;
        $data['totalpage'] = $totalpage;
		//
        $id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('category/citydistrict')->with(array('news_common'=>$news_common,'list'=>$list,'totalpage'=>$totalpage
			,'currentpage'=>$currentpage,'data'=>$data,'areas'=>$areas,'categories'=>$categories,'types'=>$types
			,'area_unit'=>$area_unit,'cityinfo'=>$cityinfo
			,'streetinfo'=>$streetinfo,'districts'=>$districts
			,'amounts'=>$amounts,'info_search'=>$info_search,'citytag'=>$citytag));
        
      
	}
	public function getCategoryCity($category,$city,$page){
		try{

		$data=array();
		$common_total=8;
        $products=array();
		$info_category=array();
		$infoSearch = array();
		$streetinfo = array();
		$citytag =array();
		$infoCity= City::getIdCity($city);
		$city_id = $infoCity->id;
		$info_search =array();
		$cityinfo = array();
		$amounts =array();
		$districts = array();
		$category_id ='';
		$district_id='';
		$citytag = Tags::loadTagCity();
		//$infoDistrict = District::getDistrictByTitle($city_id,$district);
		//$district_id = $infoDistrict->id;
		 $data['city'] = $city;
        $data['district'] = '';
        $data['category'] = $category;
       // if($category =='nha-dat') $category = '';
        $info_category = Categories::getCategoryByTitle($category);
        $category_id= $info_category['id'];
        $districts = District::loadDistrict($city_id);
        $cityinfo = City::loadCity();
        $areas = Area::loadArea();
   	    $categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit(); 
		$amounts = Unit::loadAmountUnit();
        
        //
		$info_search['category']=$category_id;
		$info_search['type']='';
		$info_search['district']=$district_id;
		$info_search['city']=$city_id;
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		//

   	    $products_list = Products::getProduct($info_search);
		$i=0;
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
				$products[$i]['lt'] = $product->lt;
				$products[$i]['lg'] = $product->lg;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$products[$i]['products_type_id'] = $product->products_type_id;
				$i++;
		}
		 $perPage = 12;
		 $totalpage=0;
		 if($i>0){
		 $totalpage = ceil(count($products)/$perPage);
		}
		$data['nextpage'] ='';
		$data['prepage'] = 1;
        
       // $currentPage = Input::get('page') -1;
		// $page1 =1;
        $currentpage = $page;

       if(empty($currentpage)) $currentpage =1;


        if($currentpage ==1 ){
        	$data['nextpage'] =2;
			$data['prepage'] = 1;
        } 
        //$data['prepage'] = $currentpage;
        
        else if($currentpage >1 && $currentpage < $totalpage){
        	$data['prepage'] =$currentpage -1;
            $data['nextpage'] =$currentpage +1;
        } 
         
        else if($currentpage == $totalpage){
        	$data['prepage'] =$currentpage -1;

            $data['nextpage'] =$totalpage; 
        }
        $data['start'] = 1; 
	    $data['last'] = $totalpage;

        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        
        $data['page'] = $page;
        $data['totalpage'] = $totalpage;
		//
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
        
		return View::make('category/city')->with(array('news_common'=>$news_common,'list'=>$list,'totalpage'=>$totalpage
			,'currentpage'=>$currentpage,'data'=>$data,'areas'=>$areas,'categories'=>$categories,'types'=>$types
			,'area_unit'=>$area_unit,'cityinfo'=>$cityinfo
			,'streetinfo'=>$streetinfo,'districts'=>$districts
			,'amounts'=>$amounts,'info_search'=>$info_search,'citytag'=>$citytag));
        }
        catch(Exception $e){
        	return Redirect::to('/');
        }
		}
		public function getCategorySearch($category){
		$data=array();
		$products= array();
		$info_category=array();
		$infoSearch = array();
		$streetinfo = array();
		$category = '';
   	   $info_search =array();
		$cityinfo = array();
		$amounts =array();
		$districts = array();
		$category_id ='';
		$district_id='';


        $data['city'] = Input::get('city');
        $data['district'] = Input::get('district');
        $data['street'] = Input::get('street');
        //$amounts = Unit::loadAmountUnit();
   	    $data['category'] = $category_id;
   	    $data['type'] = Input::get('type');
   	    $data['area'] = Input::get('area');
   	    $data['amount'] = Input::get('amnount');
        $data['category'] = $category;
     //  

       // if($category =='nha-dat') $category = '';
        $info_category = Categories::getCategoryByTitle($category);
        $category_id= $info_category['id'];

		$citytag = Tags::loadTagCity();
       
        $districts = District::loadDistrict(Input::get('city'));
        $cityinfo = City::loadCity();
        $streetinfo = Street::loadStreet(Input::get('district'));
        $areas = Area::loadArea();
   	    $categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit(); 
		
		$amounts = ProductsAmount::loadProductsAmount();

		$info_search['category']=$category_id;
		$info_search['type']=Input::get('type');
		$info_search['district']=Input::get('district');
		$info_search['city']=Input::get('city');
		$info_search['street']=Input::get('street');
		$info_search['area']=Input::get('area');
		$info_search['amount']=Input::get('amount');

        //Log::info('page: '.$sortby);
		$i=0;
		$products_list = Products::getProduct($info_search);
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['lt'] = $product->lt;
				$products[$i]['lg'] = $product->lg;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['products_type_id'] = $product->products_type_id;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}

		  $perPage = 12;
		 $totalpage=0;
		 if($i>0){
		 $totalpage = ceil(count($products)/$perPage);
		}
		$data['nextpage'] ='';
        //$currentPage = Input::get('page') -1;
		if(empty($currentpage)) $currentpage =1;


        if($currentpage ==1 ){
        	$data['nextpage'] =2;
			$data['prepage'] = 1;
        } 
        //$data['prepage'] = $currentpage;
        
        else if($currentpage >1 && $currentpage < $totalpage){
        	$data['prepage'] =$currentpage -1;
            $data['nextpage'] =$currentpage +1;
        } 
         
        else if($currentpage == $totalpage){
        	$data['prepage'] =$currentpage -1;

            $data['nextpage'] =$totalpage; 
        }
        $data['start'] = 1; 
	    $data['last'] = $totalpage;

        $pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        
        $data['page'] = $page;
        $data['totalpage'] = $totalpage;
		//
        $id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
return View::make('category/batdongsanbysearch')->with(array('news_common'=>$news_common,'list'=>$list,'totalpage'=>$totalpage
			,'currentpage'=>$currentpage,'data'=>$data,'areas'=>$areas,'categories'=>$categories,'types'=>$types
			,'area_unit'=>$area_unit,'cityinfo'=>$cityinfo
			,'streetinfo'=>$streetinfo,'districts'=>$districts
			,'amounts'=>$amounts,'info_search'=>$info_search,'citytag'=>$citytag));
        
        
	}
}
