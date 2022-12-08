<?php 
	class News extends Eloquent {
		protected $table = "news"; 
		protected $primaryKey = 'id';
		public static function createNews($data){
			$news_id='';
				$name = Products::convert_vi_to_en($data['title']);
				//$city_id =$data['img1'];
				if(!empty($data['datepicker_start'])){
					$data['datepicker_start'] = date('Y-m-d',strtotime($data['datepicker_start']));
				}
				if(!empty($data['datepicker_finish'])){
					$data['datepicker_finish'] = date('Y-m-d',strtotime($data['datepicker_finish']));
				}
				if(Auth::check()) $user_id = Auth::user()->id;
				else $user_id='1';
				$new = new News();
				$new->title=$data['title'];
				$new->user_id=$user_id;
				$new->name=$name;
				$new->categories_id=$data['category'];
				$new->item_id=$data['item'];
				$new->startdate= $data['datepicker_start'];
				$new->enddate=$data['datepicker_finish'];
				$new->group_id=$data['group'];
				$new->content=$data['content'];
				$new->content_summary=$data['content_summary'];
				$new->tags=$data['tags'];
				$new->save();
				$news_id = $new->id;
				for($i=1;$i<6;$i++){
					$imgs = 'img'.$i;
					if(!empty($data[$imgs])){
						if($i==1){
							$update = array(
								'image'=>$data[$imgs]
								);
							$update = News::Where('id','=',$news_id)
									->update($update);
						}
						$img = new Files();
						$img->products_id = $news_id;
						$img->categories_id = $data['category'];
						$img->name = $data[$imgs];
						$img->save();
					}
				}
				
				
				return $news_id;
				
		}//End create Products
		public static function loadNewsById($id){

				$info = News::Where('deleted','=','0')
								  ->Where('id','=',$id)
								  ->get()->first(); 
				return $info;
		}//End load News by id
		public static function updateNews($data,$product_id){
				//$city_id =$data['img1'];
				$name = Products::convert_vi_to_en($data['title']);

				if(!empty($data['datepicker_start'])){
					$data['datepicker_start'] = date('Y-m-d',strtotime($data['datepicker_start']));
				}
				if(!empty($data['datepicker_finish'])){
					$data['datepicker_finish'] = date('Y-m-d',strtotime($data['datepicker_finish']));
				}
				if(Auth::check()) $user_id = Auth::user()->id;
				else $user_id='1';

				$update = array(
					'title'=>$data['title'],
					'name'=>$name,
					'user_id'=>$user_id,
					'categories_id'=>$data['category'],
					'item_id'=>$data['item'],
					'group_id'=>$data['group'],
					'startdate'=> $data['datepicker_start'],
					'enddate'=>$data['datepicker_finish'],
					'content_summary'=>$data['content_summary1'],
					'content'=>$data['content1'],
					'tags'=>$data['tags1']
				);
				
				$update = News::Where('id','=',$product_id)
									->update($update);
				$deleteimg = Files::Where('products_id','=',$product_id)
								    ->Where('categories_id','=',$data['category'])
									->delete();

				for($i=1;$i<2;$i++){
					$imgs = 'img'.$i;
					if(!empty($data[$imgs])){
						if($i==1){
							$update = array(
								'image'=>$data[$imgs]
								);
							$update = News::Where('id','=',$product_id)
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
		public static function loadMyNewsTin(){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->get();
			return $info;
		}
		public static function deleteNewsById($id){

				$info = News::Where('id','=',$id)
				             ->update(array('deleted' => 1));
				$info = Files::Where('products_id','=',$id)
				     		->update(array('deleted' => 1));
				return $info;
		}//End load News by id
		public static function loadNewsHot(){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->get()->first();
			return $info;
		}
		public static function loadNewsCommon($common_total,$id_hot){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.id','!=',$id_hot)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->limit($common_total)
						->get();
			return $info;
		}
		public static function loadNewsKinhNghiem($kinhnghiem_total){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.categories_id','=','12')
						->Where('news.deleted','=','0')
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->limit($kinhnghiem_total)
						->get();
			return $info;
		}
		public static function loadNewsNomal($nomal_total,$common_total,$id_hot){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.id','!=',$id_hot)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						//->limit($nomal_total)
						->skip($common_total)->take($nomal_total)
						->get();
			return $info;
		}
		public static function loadNewsByIdCategory($category_id){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Join('item','item.id','=','news.item_id')
						->Where('news.deleted','=','0')
						->orderBy('news.startdate','DESC')
						->Where('news.categories_id','=',$category_id)
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name','item.name as item_name')
						->get()->first();
			return $info;

		}
		public static function loadNewsByTitleCategory($category_title){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->orderBy('news.startdate','DESC')
						->Where('categories.title','=',$category_title)
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->skip(1)->take(1)
						->get();
			return $info;
		}
		public static function loadNewsByTitleCategoryDot($category_title){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->orderBy('news.startdate','DESC')
						->Where('categories.title','=',$category_title)
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.enddate as enddate','news.startdate as startdate','news.id as id','categories.title as category_title','categories.name as category_name')
						->skip(2)->take(3)
						->get();
			return $info;
		}
		public static function loadNewsByCategoryById($category_id,$product_id){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Join('item','item.id','=','news.item_id')
						->Where('news.deleted','=','0')
						->Where('news.categories_id','=',$category_id)
						->Where('news.id','=',$product_id)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.content as content','news.image as image','news.startdate as startdate','news.enddate as enddate','news.id as id','categories.title as category_title','categories.name as category_name')
						->get()->first();
			return $info;
		}
		//get news by category
		public static function loadNewsHotByCategory($category_id){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.categories_id','=',$category_id)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.enddate as enddate','news.startdate as startdate','news.id as id','categories.title as category_title','categories.name as category_name')
						->get()->first();
			return $info;
		}
		public static function loadNewsCommonByCategory($common_total,$category_id){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.categories_id','=',$category_id)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.enddate as enddate','news.startdate as startdate','news.id as id','categories.title as category_title','categories.name as category_name')
						->skip(1)->take($common_total)
						->get();
			return $info;
		}
		public static function loadNewsNomalByCategory($common_total,$nomal_total,$category_id){
				$common_total = $common_total+1;
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.categories_id','=',$category_id)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.enddate as enddate','news.startdate as startdate','news.id as id','categories.title as category_title','categories.name as category_name')
						->skip($common_total)->take($nomal_total)
						->get();
			return $info;
		}
		public static function loadNewsMostViewedByCategory($most_total,$category_id,$product_id){
			$info = News::Join('categories','categories.id','=','news.categories_id')
						->Where('news.deleted','=','0')
						->Where('news.categories_id','=',$category_id)
						->Where('news.id','!=',$product_id)
						->orderBy('news.startdate','DESC')
						->select('news.title as title','news.name as name','news.content_summary as content_summary','news.image as image','news.enddate as enddate','news.startdate as startdate','news.id as id','categories.title as category_title','categories.name as category_name')
						->skip(1)->take($most_total)
						->get();
			return $info;
		}
		//End get news by category
	}
