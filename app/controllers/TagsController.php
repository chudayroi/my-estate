<?php

class TagsController extends Controller {

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
	public function getTags($name){
		$tag_id= substr ( $name , strrpos($name,'-')+1);
		$info_tag = array();
		$info_category=array();
		//$info_category = Categories::getCategoryByTitle($category);
		$products =array();
		$list =array();
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
		$cityinfo = City::loadCity();
		$citytag = Tags::loadTagCity();
		$totalpage =0;
		$city_id=0;
		$common_total=8;
		$news_common =array();
		$streetinfo = array();
		$info_tag = Tags::loadTags($tag_id);
		$street_id = $info_tag['street_id'];
		$city_id = $info_tag['city_id'];
		$data['name'] = $info_tag['title'];
		$data['tagname'] = $info_tag['name'];
		$district_id =$info_tag['district_id'];
		//$catagory_id =$info_tag['category_id'];
		$product_dangtin =array();
		$limit = 8;
		$streetinfo = Street::loadStreet($district_id);
		$districts = District::loadDistrict($city_id);
		$areas = Area::loadArea();
		$amounts = ProductsAmount::loadProductsAmount();
		$categories = Categories::loadCategories();
		$types = Types::loadTypes();
		$area_unit = Unit::loadAreaUnit();
		$amount_unit = Unit::loadAmountUnit();

		$category_id='';
		$info_search['category']=$category_id;
		$info_search['type']='';
		$info_search['district']=$district_id;
		$info_search['city']=$city_id;
		$info_search['street']=$street_id;
		$info_search['area']='';
		$info_search['amount']='';
   
        $data['city'] = '';
        $data['district'] = '';
         $data['type'] = '';
   	    $data['area'] = '';
   	    $data['amount'] = '';
   	    $data['street'] = '';
   	    $data['category'] ='';
        

		$type_list = Types::getTypeByTitle($info_search['type']);
		//$products_list = Products::loadMyProduct($category_id);
		$products_list = Products::getProduct($info_search);
		$i=0;
		foreach($products_list as $product){
				$products[$i]['name'] = $product->name;

				$products[$i]['title'] = $product->title;
				$products[$i]['area'] = $product->area;
				$products[$i]['amount'] = $product->amount;
				$products[$i]['startdate'] = date('d/m/Y',strtotime($product->startdate));
				$products[$i]['district'] = $product->district;
				$products[$i]['city_title'] = $product->city_title;
				$products[$i]['city'] = $product->city;
				$products[$i]['amount_unit'] = $product->amount_unit;
				$products[$i]['id'] = $product->id;
				$products[$i]['image'] = $product->image;
				$products[$i]['category_title'] = $product->category_title;
				$products[$i]['products_type_id'] = $product->products_type_id;
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
        $data['nextpage'] ='';
			$data['prepage'] = '';
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
		$data['tag_name'] ='';
		 return View::make('category/batdongsanbytag')->with(array('list'=>$list,'totalpage'=>$totalpage
			,'currentpage'=>$currentpage,'data'=>$data,'areas'=>$areas,'categories'=>$categories,'types'=>$types
			,'area_unit'=>$area_unit,'cityinfo'=>$cityinfo
			,'streetinfo'=>$streetinfo,'districts'=>$districts
			,'amounts'=>$amounts,'info_search'=>$info_search,'news_common'=>$news_common,'citytag'=>$citytag));
		
	}//End getNhadat
	
}
