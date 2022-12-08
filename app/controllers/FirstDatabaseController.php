<?php

class FirstDatabaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function createFirst()
	{
		//echo "hi";
		//$user = Session::get("logined");
		$createCity = City::createData();
		echo "finish";
	}
	public function loadMapCity()
	{
		$info=array();
		$city_id = Input::get('city_id');
		$info = City::getCityById($city_id);
		return $info;
	}
	public function loadMapDistrict()
	{
		$info=array();
		$district_id = Input::get('district_id');
		$info = District::getDistrictById($district_id);
		return $info;
	}
	public function loadMapStreet()
	{
		$info=array();
		$street_id = Input::get('street_id');
		$info = Street::getStreetById($street_id);
		return $info;
	}
	public function createstreet()
	{
		//echo "hi";
		//$user = Session::get("logined");
		//$createCity = City::createStreet();
		$createCity = City::createData();
		//$createCity = City::createStreet();
		echo "finish1";
	}
	public function loadDistrict()
	{
		$info=array();
		$city_id = Input::get('city_id');
		$info = District::loadDistrict($city_id);
		return $info;
	}
	public function loadStreet()
	{
		$info=array();
		$district_id = Input::get('district_id');
		$info = Street::loadStreet($district_id);
		return $info;
	}
	public function loadArea()
	{
		$info=array();
		$info = Area::loadArea();
		return $info;
	}
	public function loadProductsAmount()
	{
		$info=array();
		$info = ProductsAmount::loadProductsAmount();
		return $info;
	}
	public function loadItem()
	{
		$info=array();
		$category_id = Input::get('category_id');
		$info = Item::loadItemByIdCategory($category_id);
		return $info;
	}
	public function loadGroup()
	{
		$info=array();
		$item_id = Input::get('item_id');
		$info = Group::loadGroup($item_id);
		return $info;
	}
	public function loadCategory()
	{
		$info=array();
		$category_id = Input::get('category_id');
		$info = Categories::getCategoryById($category_id);
		return $info;
	}
}
