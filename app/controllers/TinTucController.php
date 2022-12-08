<?php

Class TinTucController extends Controller {

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
	public function getTinTuc()
	{
		//Declare variable
		$info =array();
		$type_list=array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$districts =array();
		$city_id=0;
		$product_hot =array();
		$product_nomal =array();
		$common_total = 5;
		$nomal_total = 20;
		$products =array();
		$news_category =array();
		$products_category =array();
		$i=0;
		$limit = 5;
		$products_item =array();
		$product_dangtin = array();
		//End Declare variable
		//content
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		$type_list = Types::getTypeByTitle($info_search['type']);
		//get news
		$product_hot = News::loadNewsHot();
		$id_product_hot = $product_hot->id;
		$product_common = News::loadNewsCommon($common_total,$id_product_hot);
		$product_nomal = News::loadNewsNomal($nomal_total,$common_total,$id_product_hot);
		$news_category = Categories::loadCategoryTinTuc();

		foreach($news_category as $category){
			$category_name= $category->name;
			$category_title= $category->title;
			$products_category[$category_title][$category_name]['item'] = Item::loadItemByTitleCategory($category_title);
			$products_category[$category_title][$category_name]['product'] = News::loadNewsByTitleCategory($category_title);
			$products_category[$category_title][$category_name]['product_dot'] = News::loadNewsByTitleCategoryDot($category_title);
		}
		$product_dangtin = Products::loadProductList($limit);
		$common_total=8;
		$news_common =array();
		
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
				//end get news
		//End content
		return View::make('tintuc/index')->with(array('cityinfo'=>$cityinfo,'news_common'=>$news_common,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'product_hot'=>$product_hot,'product_common'=>$product_common,'product_nomal'=>$product_nomal,'products_category'=>$products_category,'products_category'=>$products_category,'product_dangtin'=>$product_dangtin));


		//return View::make('tintuc/basic');
	}

	public function detailNews($category_title,$name)
	{
		$info =array();
		$type_list=array();
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
		$city_id=0;
		$product_id= '';
		$category_id= '';
		$most_viewed =array();
		$most_total =10;
		$limit=10;
		$data_category =array();
		//Content
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
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		//news
		$news_category = Categories::getCategoryByTitle($category_title);
		$category_id = $news_category['id'];
		$data_category = Categories::getCategoryByTitle($category_title);

		$product_id= substr ( $name , strrpos($name,'-')+1);
		$product = News::loadNewsByCategoryById($category_id,$product_id);
       // Log::info('page: '.$news_category['id']);

		if(!empty($product['startdate'])){
					$product['startdate'] = date('m/d/Y',strtotime($product['startdate']));
		}
		if(!empty($product['enddate']) && $product['enddate'] !='0000-00-00'){
					$product['enddate'] = date('m/d/Y',strtotime($product['enddate']));
		}
		$product['enddate'] ='';
		$most_viewed = News::loadNewsMostViewedByCategory($most_total,$category_id,$product_id);
		$product_dangtin = Products::loadProductList($limit);
		//End news
		//Get content
		$type_list = Types::getTypeByTitle($info_search['type']);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('tintuc/detail')->with(array('cityinfo'=>$cityinfo,'news_common'=>$news_common,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'product'=>$product,'most_viewed'=>$most_viewed,'product_dangtin'=>$product_dangtin,'data_category'=>$data_category));


		//return View::make('tintuc/basic');
	}

	
	public function getCategoryPageNews($category)
	{
		//Declare variable

		$info =array();
		$type_list=array();
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
		$city_id=0;
		$product_hot =array();
		$product_nomal =array();
		$common_total = 5;
		$nomal_total = 20;
		$products =array();
		$news_category =array();
		$products_category =array();
		$category_name= '';
		$category_title= '';
		$i=0;
		$limit = 5;
		$products_item =array();
		$product_dangtin = array();
		$data_category =array();
		$category_id='';
		$product=array();
		$data_category =array();
		
		//End declare variable
		//get content
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
		$info_search['district']='';
		$info_search['city']='';
		$info_search['street']='';
		$info_search['area']='';
		$info_search['amount']='';
		$type_list = Types::getTypeByTitle($info_search['type']);
		//get news
		$data_category = Categories::getCategoryByTitle($category);
		$category_id = $data_category['id'];
		$product_hot = News::loadNewsHotByCategory($category_id);
		$product_common = News::loadNewsCommonByCategory($common_total,$category_id);
		$product_nomal = News::loadNewsNomalByCategory($common_total,$nomal_total,$category_id);
		$news_category = Categories::loadCategoryNewsById($category_id);

		foreach($news_category as $category){

			$category_name= $category->name;
			$category_title= $category->title;
			$products_category[$category_title][$category_name]['item'] = Item::loadItemByTitleCategory($category_title);
			$products_category[$category_title][$category_name]['product'] = News::loadNewsByTitleCategory($category_title);
			$products_category[$category_title][$category_name]['product_dot'] = News::loadNewsByTitleCategoryDot($category_title);
		}
		
		$product_dangtin = Products::loadProductList($limit);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
				//end get news
		//End get content
		return View::make('tintuc/category-page')->with(array('cityinfo'=>$cityinfo,'news_common'=>$news_common,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'product_hot'=>$product_hot,'product_common'=>$product_common,'product_nomal'=>$product_nomal,'products_category'=>$products_category,'products_category'=>$products_category,'product_dangtin'=>$product_dangtin,'data_category'=>$data_category));


		//return View::make('tintuc/basic');
	}
	public function uploadImageNews(){
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
			move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/news/".$file_name);
			$info['file_name'] = $file_name;
			return $file_name;
		}
		
	}
	public function addNews()
	{
		//Declare variable
		$startdate='';
		$enddate='';
		$info =array();
		$type_list=array();
		$info_search =array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$amount_unit =array();
		$news_category=array();
		$districts =array();
		$cityinfo = City::loadCity();
		$city_id=0;
		$news_categoryId=5;
		$news_itemId = '';
		$product_dangtin =array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		//End Declare variable
		//Content
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$news_category = Categories::loadCategoryTinTuc();
		$news_item = Item::loadItem($news_categoryId);
		$news_group = Group::loadGroup($news_itemId);
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
		$type_list = Types::getTypeByTitle($info_search['type']);
		$startdate= date('m/d/Y');
		$enddate= date('m/d/Y', strtotime('+1 month'));
		//End Content
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('tintuc/add')->with(array('startdate'=>$startdate,'news_common'=>$news_common,'enddate'=>$enddate,'product_dangtin'=>$product_dangtin,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'news_category'=>$news_category,'news_item'=>$news_item,'news_group'=>$news_group));
	}
	public function createNews(){
		//Declare variable
		$info  =array();
		$data  =array();
		$data['report']= false;
		$data['news_id']= '';
		//End Declare variable
		//Content
		$info = Input::all();
		$rules =array(
            "title" =>"required|min:10",
            "content" =>"required|min:10",
            "content_summary" =>"required|min:10",
            "datepicker_start"=>"required"
            );
		
        if(!Validator::make(Input::all(),$rules)->fails()){
            $news_id = News::createNews($info);
			$data['report']= true;
			$data['news_id']= $news_id;
        }
		//End Content
        
       return json_encode($data);
	}

	public function editNews($name){
		//declare variable
		$info =array();
		$info_search =array();
		$categories =array();
		$item =array();
		$group =array();
		$product =array();
		$file =array();
		$news_category=array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$districts = array();
		$amount_unit =array();
		$file =array();
		$news_categoryId = '';
		$news_itemId = '';
		$product_dangtin =array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		//End declare variable
		//content
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$product_id= substr ( $name , strrpos($name,'-')+1);
		$categories = Categories::loadCategories();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		$product = News::loadNewsById($product_id);
        Log::info('page: '.Input::get('product'.$product_id));

		if(!empty($product->startdate)){
					$product->startdate = date('m/d/Y',strtotime($product->startdate));
		}
		if(!empty($product->enddate) && $product->enddate!='0000-00-00'){
					$product->enddate = date('m/d/Y',strtotime($product->enddate));
		}
		else $product->enddate ='';
		$news_categoryId = $product->categories_id;
		$news_itemId = $product->item_id;
		$news_category = Categories::loadCategoryTinTuc();
		$item = Item::loadItem($news_categoryId);
		$group = Group::loadGroup($news_itemId);
		$files = Files::loadFile($product_id,$news_categoryId);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		//End content
		return View::make('tintuc/edit')->with(array('product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'product'=>$product,'files'=>$files,'categories'=>$categories,'info_search'=>$info_search,'news_category'=>$news_category,'item'=>$item,'group'=>$group,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'streetinfo'=>$streetinfo,'districts'=>$districts));
	}
	public function updateNews($product_id){
		$info  =array();
		$data  =array();
		$info = Input::all();
        //Log::info('page: '.Input::get('content1'));

		$rules =array(
            "title" =>"required|min:2",
            "content" =>"required|min:4",
            "content_summary" =>"required|min:5",
            "datepicker_start"=>"required"
         );
		//$product="2";
		$data['report']= false;
        if(!Validator::make(Input::all(),$rules)->fails()){
            $product_id = News::updateNews($info,$product_id);
			$data['report']= true;
        }
        
       return json_encode($data);
	}
	public function deleteNews(){
		//declare variable
		$info = array();
		$id= Input::get('id');
		$result = News::deleteNewsById($id);
        Log::info('page: '.Input::get('id'));

		return $info;
		//End declare variable

	}
	public function myNewsList(){
		//declare variable
		$info =array();
		$info_search =array();
		$categories =array();
		$item =array();
		$group =array();
		$product =array();
		$products_list=array();
		$files =array();
		$news_category=array();
		$cityinfo = array();
		$areas = array();
		$amounts =array();
		$categories =array();
		$types =array();
		$area_unit =array();
		$districts = array();
		$amount_unit =array();
		$file =array();
		$news_categoryId = '';
		$news_itemId = '';
		$product_dangtin =array();
		$limit = 8;
		$product_dangtin = Products::loadProductList($limit);
		//End declare variable
		//content
		$district_id = 121;
		$streetinfo = Street::loadStreet($district_id);
		$cityinfo = City::loadCity();
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();
		$categories = Categories::loadCategories();
		$info_search['category']='';
		$info_search['type']='';
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		//get list news
		$products_list = News::loadMyNewsTin();
		$i=0;
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;
				$products[$i]['title'] = $product->title;
				$products[$i]['content_summary'] = $product->content_summary;
				$products[$i]['startdate'] = $product->startdate;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['category_name'] = $product->category_name;
				$i++;
		}
		if($i>0){
			$perPage = 1000;
			$currentpage=1;
			$pagedData =array();
			$totalpage = ceil(count($products)/$perPage);
			$pagedData = array_slice($products, ($currentpage-1)* $perPage, $perPage);
			$list = Paginator::make($pagedData, count($products), $perPage);
        }
		//End get list news
		//End content
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('tintuc/mylist')->with(array('product_dangtin'=>$product_dangtin,'news_common'=>$news_common,'products'=>$products,'list'=>$list,'files'=>$files,'categories'=>$categories,'info_search'=>$info_search,'news_category'=>$news_category,'item'=>$item,'group'=>$group,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'streetinfo'=>$streetinfo,'districts'=>$districts));

	}
public function detailMyNews($name)
	{
		$info =array();
		$type_list=array();
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
		$city_id=0;
		$product_id= '';
		$category_id= '';
		$most_viewed =array();
		$most_total =10;
		$limit=10;
		$data_category =array();
		//Content
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
		$info_search['district']='';
		$info_search['street']='';
		$info_search['city']='';
		$info_search['area']='';
		$info_search['amount']='';
		//news
		

		$product_id= substr ( $name , strrpos($name,'-')+1);
		$product = News::loadNewsById($product_id);
		$news_category = Categories::getCategoryById($product->categories_id);
		$category_id = $product->categories_id;
		$data_category = Categories::getCategoryById($product->categories_id);
        Log::info('page: '.Input::get('product'.$product_id));

		if(!empty($product->startdate)){
					$product->startdate = date('m/d/Y',strtotime($product->startdate));
		}
		if(!empty($product->enddate) && $product->enddate!='0000-00-00'){
					$product->enddate = date('m/d/Y',strtotime($product->enddate));
		}
		else $product->enddate ='';
		$most_viewed = News::loadNewsMostViewedByCategory($most_total,$category_id);
		$product_dangtin = Products::loadProductList($limit);
		//End news
		//Get content
		$type_list = Types::getTypeByTitle($info_search['type']);
		$common_total=8;
		$news_common =array();
		$id_product_hot = '';
		$news_common = News::loadNewsCommon($common_total,$id_product_hot);
		return View::make('tintuc/mydetail')->with(array('streetinfo'=>$streetinfo,'news_common'=>$news_common,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'product'=>$product,'most_viewed'=>$most_viewed,'product_dangtin'=>$product_dangtin,'data_category'=>$data_category));


		//return View::make('tintuc/basic');
	}

}