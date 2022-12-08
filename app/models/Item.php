<?php 
	class Item extends Eloquent {
		protected $table = "item"; 
		protected $primaryKey = 'id';
		public static function loadItem($category_id){
			$info = Item::Where('deleted','=','0')
									->Where('categories_id','=',$category_id)
									->get();
		    return $info;
		}
		public static function loadItemByTitleCategory($category_title){
			$info = Item::Join('categories','categories.id','=','item.categories_id')
						->Where('item.deleted','=','0')
						->Where('categories.title','=',$category_title)
						->Select('item.id as id','item.name as name','item.title as title')
						->limit(2)
						->get();
		    return $info;

		}
		public static function loadItemByIdCategory($category_id){
			$info = Item::Join('categories','categories.id','=','item.categories_id')
						->Where('item.deleted','=','0')
						->Where('categories.id','=',$category_id)
						->Select('item.id as id','item.name as name','item.title as title')
						->get();
		    return $info;

		}
	}