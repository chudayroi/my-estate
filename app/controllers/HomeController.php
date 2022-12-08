<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome(){
		$info =array();
		$products =array();
		$products_vip =array();
		$products_other =array();
		$citytag =array();
		$product_vip =array();
		$list_vip=array();
		$list =array();
		$totalpage =0;
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$limit = 8;
		$amount_unit =array();
		$streets = array();
		$district_id ='';
		$streets = Street::loadStreet($district_id);
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$citytag = Tags::loadTagCity();

		$tintuc_kinhnghiem = array();
		$city_id=0;
		$common_total=8;
		$news_common =array();
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$product_dangtin = array();
		$category_id='';
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		$info_category=array();
		$info_category = Categories::getCategoryById($info_search['category']);
		//$products_list = Products::loadMyProduct($category_id);
		//vip
		$products_type =1;
		$products_vip = Products::loadProductByType($category_id,$products_type);
		$i=0;
        Log::info('categoryId 123456: ');

		foreach($products_vip as $product){
				$product_vip[$i]['name'] = $product->name;
				$product_vip[$i]['title'] = $product->title;
				$product_vip[$i]['area'] = $product->area;
				$product_vip[$i]['amount'] = $product->amount;
				$product_vip[$i]['startdate'] = $product->startdate;
				$product_vip[$i]['district'] = $product->district;
				$product_vip[$i]['city'] = $product->city;
				$product_vip[$i]['city_title'] = $product->city_title;
				$product_vip[$i]['amount_unit'] = $product->amount_unit;
				$product_vip[$i]['category_title'] = $product->category_title;
				$product_vip[$i]['category_name'] = $product->category_name;
				$product_vip[$i]['id'] = $product->id;
				$product_vip[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 30;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($product_vip)/$perPage);
			$pagedData = array_slice($product_vip, ($currentpage-1)* $perPage, $perPage);
			$list_vip = Paginator::make($pagedData, count($product_vip), $perPage);
        }
		//end vip
		$products_type =4;
		$products_list = Products::loadProductByType($category_id,$products_type);
		$i=0;
        //Log::info('categoryId 123456: ');

		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['content_summary'] = $product->content_summary;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 10;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        }
        //project
        $project_list =array();

        $project_list = Products::loadMyProject();
        $projects =array();
		$i=0;
		foreach($project_list as $project){
				$projects[$i]['name'] = $project->name;
				$projects[$i]['content'] = $project->content;
				$projects[$i]['title'] = $project->title;
				$projects[$i]['area'] = $project->area;
				$projects[$i]['amount'] = $project->amount;
				$projects[$i]['startdate'] = $project->startdate;
				$projects[$i]['district'] = $project->district;
				$projects[$i]['city'] = $project->city;
				$projects[$i]['city_title'] = $project->city_title;
				$projects[$i]['amount_unit'] = $project->amount_unit;
				$projects[$i]['category_title'] = $project->category_title;
				$projects[$i]['category_name'] = $project->category_name;
				$projects[$i]['id'] = $project->id;
				$projects[$i]['image'] = $project->image;
				$i++;
		}
        //End project
        //news
        $common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		$kinhnghiem_total=4;
		$news_kinhnghiem = News::loadNewsKinhNghiem($kinhnghiem_total);
		$product_dangtin = Products::loadProductList($limit);
        //news
		return View::make('home/index')->with(array('product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'districts'=>$districts,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'info_search'=>$info_search,'products'=>$products,'list'=>$list,'list_vip'=>$list_vip,'totalpage'=>$totalpage,'info_category'=>$info_category,'projects'=>$projects,'news_common'=>$news_common,'news_kinhnghiem'=>$news_kinhnghiem,'citytag'=>$citytag));
	}
	public function showContact(){
		return View::make('template/contact');
	}
	public function showWebinfo(){
		return View::make('template/webinfo');
	}

	public function showMap(){
		return View::make('template/map');

	}	
	public function loadAuthor(){
		$info =array();
		$products =array();
		$products_vip =array();
		$citytag =array();
		$products_other =array();
		$product_vip =array();
		$list_vip=array();
		$list =array();
		$totalpage =0;
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$limit = 8;
		$amount_unit =array();
		$streets = array();
		$district_id ='';
		$streets = Street::loadStreet($district_id);
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$tintuc_kinhnghiem = array();
		$city_id=0;
		$common_total=8;
		$news_common =array();
		$citytag = Tags::loadTagCity();
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$product_dangtin = array();
		$category_id='';
		$info_search['category']='2';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		$info_category=array();
		$info_category = Categories::getCategoryById($info_search['category']);
		//$products_list = Products::loadMyProduct($category_id);
		//vip
		$products_type =1;
		$products_vip = Products::loadProductByType($info_category->id,$products_type);
		$i=0;
        Log::info('categoryId 123456: ');

		foreach($products_vip as $product){
				$product_vip[$i]['name'] = $product->name;
				$product_vip[$i]['title'] = $product->title;
				$product_vip[$i]['area'] = $product->area;
				$product_vip[$i]['amount'] = $product->amount;
				$product_vip[$i]['startdate'] = $product->startdate;
				$product_vip[$i]['district'] = $product->district;
				$product_vip[$i]['city'] = $product->city;
				$product_vip[$i]['city_title'] = $product->city_title;
				$product_vip[$i]['amount_unit'] = $product->amount_unit;
				$product_vip[$i]['category_title'] = $product->category_title;
				$product_vip[$i]['category_name'] = $product->category_name;
				$product_vip[$i]['id'] = $product->id;
				$product_vip[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 30;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($product_vip)/$perPage);
			$pagedData = array_slice($product_vip, ($currentpage-1)* $perPage, $perPage);
			$list_vip = Paginator::make($pagedData, count($product_vip), $perPage);
        }
		//end vip
		$products_type =4;
		$products_list = Products::loadProductByType($info_category->id,$products_type);
		$i=0;
        Log::info('categoryId 123456: ');

		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['content_summary'] = $product->content_summary;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 4;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        }
        //project
        $project_list =array();

        $project_list = Products::loadMyProject();
        $projects =array();
		$i=0;
		foreach($project_list as $project){
				$projects[$i]['name'] = $project->name;
				$projects[$i]['content'] = $project->content;
				$projects[$i]['title'] = $project->title;
				$projects[$i]['area'] = $project->area;
				$projects[$i]['amount'] = $project->amount;
				$projects[$i]['startdate'] = $project->startdate;
				$projects[$i]['district'] = $project->district;
				$projects[$i]['city'] = $project->city;
				$projects[$i]['city_title'] = $project->city_title;
				$projects[$i]['amount_unit'] = $project->amount_unit;
				$projects[$i]['category_title'] = $project->category_title;
				$projects[$i]['category_name'] = $project->category_name;
				$projects[$i]['id'] = $project->id;
				$projects[$i]['image'] = $project->image;
				$i++;
		}
        //End project
        //news
        $common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		$kinhnghiem_total=4;
		$news_kinhnghiem = News::loadNewsKinhNghiem($kinhnghiem_total);
		$product_dangtin = Products::loadProductList($limit);
        //news
		return View::make('template/author')->with(array('product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'districts'=>$districts,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'info_search'=>$info_search,'products'=>$products,'list'=>$list,'list_vip'=>$list_vip,'totalpage'=>$totalpage,'info_category'=>$info_category,'projects'=>$projects,'news_common'=>$news_common,'news_kinhnghiem'=>$news_kinhnghiem,'citytag'=>$citytag));
	}
	public function loadTuyenDung(){
		$info =array();
		$products =array();
		$products_vip =array();
		$products_other =array();
		$product_vip =array();
		$list_vip=array();
		$citytag =array();
		$list =array();
		$totalpage =0;
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$limit = 8;
		$amount_unit =array();
		$streets = array();
		$district_id ='';
		$streets = Street::loadStreet($district_id);
		$citytag = Tags::loadTagCity();
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$tintuc_kinhnghiem = array();
		$city_id=0;
		$common_total=8;
		$news_common =array();
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$product_dangtin = array();
		$category_id='';
		$info_search['sibar_category']='2';
		$info_search['sibar_type']='';
		$info_search['sibar_district']='';
		$info_search['sibar_city']='';
		$info_search['sibar_street']='';
		$info_search['sibar_area']='';
		$info_search['sibar_amount']='';
		$info_category=array();
		$info_category = Categories::getCategoryById($info_search['sibar_category']);
		//$products_list = Products::loadMyProduct($category_id);
		//vip
		$products_type =1;
		$products_vip = Products::loadProductByType($info_category->id,$products_type);
		$i=0;
        Log::info('categoryId 123456: ');

		foreach($products_vip as $product){
				$product_vip[$i]['name'] = $product->name;
				$product_vip[$i]['title'] = $product->title;
				$product_vip[$i]['area'] = $product->area;
				$product_vip[$i]['amount'] = $product->amount;
				$product_vip[$i]['startdate'] = $product->startdate;
				$product_vip[$i]['district'] = $product->district;
				$product_vip[$i]['city'] = $product->city;
				$product_vip[$i]['city_title'] = $product->city_title;
				$product_vip[$i]['amount_unit'] = $product->amount_unit;
				$product_vip[$i]['category_title'] = $product->category_title;
				$product_vip[$i]['category_name'] = $product->category_name;
				$product_vip[$i]['id'] = $product->id;
				$product_vip[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 30;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($product_vip)/$perPage);
			$pagedData = array_slice($product_vip, ($currentpage-1)* $perPage, $perPage);
			$list_vip = Paginator::make($pagedData, count($product_vip), $perPage);
        }
		//end vip
		$products_type =4;
		$products_list = Products::loadProductByType($info_category->id,$products_type);
		$i=0;
        Log::info('categoryId 123456: ');

		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['content_summary'] = $product->content_summary;
				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city'] = $product->city;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$i++;
		}
		if($i>0){
			$perPage = 4;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        }
        //project
        $project_list =array();

        $project_list = Products::loadMyProject();
        $projects =array();
		$i=0;
		foreach($project_list as $project){
				$projects[$i]['name'] = $project->name;
				$projects[$i]['content'] = $project->content;
				$projects[$i]['title'] = $project->title;
				$projects[$i]['area'] = $project->area;
				$projects[$i]['amount'] = $project->amount;
				$projects[$i]['startdate'] = $project->startdate;
				$projects[$i]['district'] = $project->district;
				$projects[$i]['city'] = $project->city;
				$projects[$i]['city_title'] = $project->city_title;
				$projects[$i]['amount_unit'] = $project->amount_unit;
				$projects[$i]['category_title'] = $project->category_title;
				$projects[$i]['category_name'] = $project->category_name;
				$projects[$i]['id'] = $project->id;
				$projects[$i]['image'] = $project->image;
				$i++;
		}
        //End project
        //news
        $common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		$kinhnghiem_total=4;
		$news_kinhnghiem = News::loadNewsKinhNghiem($kinhnghiem_total);
		$product_dangtin = Products::loadProductList($limit);
        //news
		return View::make('template/tuyendung')->with(array('product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'districts'=>$districts,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'info_search'=>$info_search,'products'=>$products,'list'=>$list,'list_vip'=>$list_vip,'totalpage'=>$totalpage,'info_category'=>$info_category,'projects'=>$projects,'news_common'=>$news_common,'news_kinhnghiem'=>$news_kinhnghiem,'citytag'=>$citytag));
	}
}
