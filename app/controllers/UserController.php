<?php

class UserController extends BaseController {

    
    public static function login(){
		$info=array();

        if (Auth::attempt(array('email' => Input::get('login_email'), 'password' => Input::get('login_password')), true))
        {
        Log::info('login1: ');
            // The user is being remembered...
            $info['login'] = "success";
        } else{
        	$info['login'] = "error";
        } 

            return $info;
   
	}
	public static function logout(){
		$info=array();
		$data = array();
		Auth::logout();
		
        return Redirect::to('/');
	}
	public static function register(){
		$info=array();
		$data = array();
		$data = Input::all();
		$rules =array(
            "register_email" =>"required|email|unique:users,email",
            "register_first_name" =>"required|min:2",
            "register_last_name" =>"required|min:2",
            "register_password" =>"required|min:6",
            "confirm_password" =>"same:register_password"
        );
        if(!Validator::make(Input::all(),$rules)->fails()){
        	$user = User::createUser($data);

        	if($user){
        		Auth::attempt(array('email' => Input::get('register_email'), 'password' => Input::get('register_password')));
        	 	$data['register']  ='success';
        	}
        	else $data['register']  ='error';

        }
        else $data['register']  ='error';
		//$user = User::createUser($data);

		return $data;
	}
    public static function createUser(){
        $info=array();
        $data = array();
        $data = Input::all();
        //Log::info('user_id: '.Input::get('usertype'));

        $rules =array(
            "user_email" =>"required|email|unique:users,email",
            "user_first_name" =>"required|min:2",
            "user_last_name" =>"required|min:2",
            "user_password" =>"required|min:6",
            "confirm_userpassword" =>"same:user_password"
        );
        if(!Validator::make(Input::all(),$rules)->fails()){
            $user = User::createNewUser($data);

            if($user){
                $data['register']  ='success';
            }
            else $data['register']  ='error';

        }
        else $data['register']  ='error';
        //$user = User::createUser($data);

        return $data;
    }
    public static function updateUser($user_id){
        $info=array();
        $data = array();
        $data = Input::all();
        $user ='';
        $email= Input::get('user_email');
        $checkbox= Input::get('checkbox_password');
       // Log::info('checkbox_password: '.$checkbox);
        if($checkbox=='1'){
                $rules =array(
                    "user_first_name" =>"required|min:2",
                    "user_last_name" =>"required|min:2",
                    "user_password" =>"required|min:6",
                    "confirm_userpassword" =>"same:user_password"
                );
        }
        else{
            $data['checkbox_password'] =0;
            $rules =array(
                    "user_first_name" =>"required|min:2",
                    "user_last_name" =>"required|min:2"
                );
        }
        if(!Validator::make(Input::all(),$rules)->fails()){

            $check = User::Where('email','=',$email)
                            ->Where('id','!=',$user_id)
                            ->count();

            if($check<1) {
                //Log::info('user_id: '.Input::get('usertype'));
                $user = User::updateUser($user_id,$data);

                if($user){
                    $data['register']  ='success';
                }
                else $data['register']  ='error';
            }
            else $data['register']  ='error';

        }
        else $data['register']  ='error';
        //$user = User::createUser($data);

        return $data;
    }
	public static function checkEmail(){
		$info=array();
		$data = array();
		$data = Input::all();
		$email = Input::get('register_email');
		//$user = User::Where('email','=',$email)->count();
		if(User::Where('email','=',$email)->count()>0) return "false";
		else return "true";

	}
    public static function recoverypassword(){
        $info=array();
        $info_user=array();
        $data = array();
       // $data = Input::all();
       $email = Input::get('recovery_email');
       // $email = 'mr.thanhbinhnguyen@gmail.com';
        $checkemail = User::checkEmail($email);
        $new_password = rand(100000,10000000);
       
        if($checkemail){    
            $info_user = User::getUserByEmail($email);

           Mail::send('user.welcome', array('firstname'=>$info_user->first_name,'lastname' => $info_user->last_name,'password'=>$new_password), function($message){
        $message->to(Input::get('recovery_email'), "binh")->subject("fuland.vn gửi bạn password mới");
    });
           $update_password = User::updatePassword($email,$new_password);
            $data['recovery']  ='success';
    $data['email']  =$email;
        }
        else $data['register']  ='error';

        return $data;
        
    }
    public static function checkUserEmail(){
        $info=array();
        $data = array();
        $data = Input::all();
        $email=Input::get('user_email');
        //$user = User::Where('email','=',$email)->count();
        if(User::Where('email','=',$email)->count()>0) return "false";
        else return "true";

    }
    public static function checkUpdateUserEmail($user_id){
        $info=array();
        $data = array();
        $data = Input::all();
        $email=Input::get('user_email');
        $user = User::Where('email','=',$email)
                ->Where('id','!=',$user_id)
                ->count();
        if($user>0) return "false";
        else return "true";
    }
    public static function addUser(){
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
        $usertype=array();
        $i=0;
        $limit = 5;
        $products_item =array();
        $product_dangtin = array();
        //End Declare variable
        $district_id =121;
        $streetinfo = Street::loadStreet($district_id);
        $cityinfo = City::loadCity();
        $districts = District::loadDistrict($city_id);
        $areas = Area::loadArea();
        $amounts = ProductsAmount::loadProductsAmount();
        $categories = Categories::loadCategories();
        $types = Types::loadTypes();
        $area_unit = Unit::loadAreaUnit();
        $amount_unit = Unit::loadAmountUnit();
        $usertype = UserType::loadUserType();
        $info_search['sibar_category']='';
        $info_search['sibar_type']='';
        $info_search['sibar_street']='';
        $info_search['sibar_district']='';
        $info_search['sibar_city']='';
        $info_search['sibar_area']='';
        $info_search['sibar_amount']='';
        $common_total=8;
         $news_common =array();
        $id_product_hot = '';
        $news_common = News::loadNewsCommon($common_total,$id_product_hot);
      
        //End content
        return View::make('user/add')->with(array('news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'usertype'=>$usertype));
    }
    public static function getListUser(){
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
        $usertype=array();
        $list=array();
        $user_list=array();
        $i=0;
        $limit = 5;
        $products_item =array();
        $product_dangtin = array();
        //End Declare variable
        $district_id =121;
        $streetinfo = Street::loadStreet($district_id);
        $cityinfo = City::loadCity();
        $districts = District::loadDistrict($city_id);
        $areas = Area::loadArea();
        $amounts = ProductsAmount::loadProductsAmount();
        $categories = Categories::loadCategories();
        $types = Types::loadTypes();
        $area_unit = Unit::loadAreaUnit();
        $amount_unit = Unit::loadAmountUnit();
        $usertype = UserType::loadUserType();
        $info_search['sibar_category']='';
        $info_search['sibar_type']='';
        $info_search['sibar_district']='';
        $info_search['sibar_street']='';
        $info_search['sibar_city']='';
        $info_search['sibar_area']='';
        $info_search['sibar_amount']='';
        $user_list = User::getUserList();
        $common_total=8;
         $news_common =array();
        $id_product_hot = '';
        $news_common = News::loadNewsCommon($common_total,$id_product_hot);
        //End content
        return View::make('user/mylist')->with(array('news_common'=>$news_common,'cityinfo'=>$cityinfo,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'usertype'=>$usertype,'list'=>$list,'user_list'=>$user_list));
    }
    public static function getEditUser($user_id){
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
        $usertype=array();
        $list=array();
        $user=array();
        $i=0;
        $limit = 5;
        $products_item =array();
        $product_dangtin = array();
        //End Declare variable
        $district_id =121;
        $streetinfo = Street::loadStreet($district_id);
        $cityinfo = City::loadCity();
        $districts = District::loadDistrict($city_id);
        $areas = Area::loadArea();
        $amounts = ProductsAmount::loadProductsAmount();
        $categories = Categories::loadCategories();
        $types = Types::loadTypes();
        $area_unit = Unit::loadAreaUnit();
        $amount_unit = Unit::loadAmountUnit();
        $usertype = UserType::loadUserType();
        $info_search['sibar_category']='';
        $info_search['sibar_type']='';
        $info_search['sibar_district']='';
        $info_search['sibar_city']='';
        $info_search['sibar_street']='';
        $info_search['sibar_area']='';
        $info_search['sibar_amount']='';
        $user = User::getUserById($user_id);
        Log::info('page: '.$user_id);
        $common_total=8;
        $news_common =array();
        $id_product_hot = '';
        $news_common = News::loadNewsCommon($common_total,$id_product_hot);
        //End content
        return View::make('user/edit')->with(array('cityinfo'=>$cityinfo,'news_common'=>$news_common,'streetinfo'=>$streetinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'usertype'=>$usertype,'list'=>$list,'users'=>$user));
    }
    public function getThongTinTaiKhoan()
    {
        $info =array();
        $type_list=array();
        $info_search =array();
        $cityinfo = array();
        $areas = array();
        $startdate='';
        $enddate='';
        $amounts =array();
        $user=array();
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
        $info_search['sibar_category']='';
        $info_search['sibar_type']='';
        $info_search['sibar_district']='';
        $info_search['sibar_street']='';
        $info_search['sibar_city']='';
        $info_search['sibar_area']='';
        $info_search['sibar_amount']='';
        $startdate= date('m/d/Y');
        $enddate= date('m/d/Y', strtotime('+1 month'));
        $type_list = Types::getTypeByTitle($info_search['sibar_type']);
        $common_total=8;
        if(Auth::check()) $user_id = Auth::user()->id;
        else $user_id='1';
        $user = User::getUserById($user_id);
        $news_common =array();
        $id_product_hot = '';
        $news_common = News::loadNewsCommon($common_total,$id_product_hot);
        $program_uptin = array();
        $program_uptin = ProgramUptin::loadProgramUptin();
        return View::make('user/infor')->with(array('program_uptin'=>$program_uptin,'startdate'=>$startdate,'products_type'=>$products_type,'enddate'=>$enddate,'news_common'=>$news_common,'product_dangtin'=>$product_dangtin,'streetinfo'=>$streetinfo,'cityinfo'=>$cityinfo,'areas'=>$areas,'amounts'=>$amounts,'categories'=>$categories,'types'=>$types,'area_unit'=>$area_unit,'amount_unit'=>$amount_unit,'districts'=>$districts,'info_search'=>$info_search,'type_list'=>$type_list,'user'=>$user));
    
    }
}