<?php 
	class City extends Eloquent {
		protected $table = "city"; 
		protected $primaryKey = 'id';
	
		public static function createFirst(){
			$usertype = array(
				array("1",'admin','Có quyền tất cả'),
				array("2",'news','Có quyền tạo tin tức'),
				array("3",'news','Có quyền tạo đăng tin')
			);
			foreach($usertype as $name){
					$users = new UserType();
					$users->id=$name['0'];
					$users->name=$name['1'];
					$users->description=$name['2'];
					$users->save();
			}
			$user = array(
				array("1",'admin@tinbatdongsan.net','admin','123456','Binh','Nguyen','1')
			);
			foreach($user as $name){
					$users = new User();
					$users->id=$name['0'];
					$users->email=$name['1'];
					$users->fb_fullname=$name['2'];
					$users->password=Hash::make($name['3']);
					$users->first_name=$name['4'];
					$users->last_name=$name['5'];
					$users->usertype_id=$name['6'];
					$users->save();
			}

			$countrys = array(
				array("1",'Việt Nam','viet-nam'),
				array("2",'Anh','Anh'),
				array("3",'Đức','duc'),
				array("4",'Tây Ban Nha','tay-ban-nha'),
				array("5",'Italia','italia')
			);
			foreach($countrys as $name){
					$country = new Country();
					$country->id=$name['0'];
					$country->name=$name['1'];
					$country->title=$name['2'];
					$country->save();
			}
			$city = array(
				array("1",'TP Hồ Chí Minh','ho-chi-minh'),
				array("2",'Bình Dương','binh-duong'),
				array("3",'Bình Phước','binh-phuoc'),
				array("4",'Đồng Nai','dong-nai'),
				array("5",'Long An','long-an')
			);
			foreach($city as $name){
					$citys = new City();
					$citys->id=$name['0'];
					$citys->name=$name['1'];
					$citys->title=$name['2'];
					$citys->save();
			}

			//create quanhuyen
			$district = array(
				array("1",11,'Quận 1'),
				array("1",12,'Quận 2'),
				array("1",13,'Quận 3'),
				array("1",14,'Quận 4'),
				array("1",15,'Quận 5'),
				array("1",16,'Quận 6'),
				array("1",17,'Quận 7'),
				array("1",18,'Quận 8'),
				array("1",19,'Quận 9'),
				array("1",110,'Quận 10'),
				array("1",111,'Quận 11'),
				array("1",112,'Quận 12'),
				array("1",113,'Bình Chánh'),
				array("1",114,'Bình Tân'),
				array("1",115,'Bình Thạnh'),
				array("1",117,'Cần Giờ'),
				array("1",118,'Củ Chi'),
				array("1",119,'Gò Vấp'),
				array("1",120,'Hóc Môn'),
				array("1",121,'Nhà Bè'),
				array("1",122,'Phú Nhuận'),
				array("1",123,'Tân Bình'),
				array("1",124,'Tân Phú'),
				array("1",125,'Thủ Đức'),
				//End hcm
				//binhdung
				array("2",21,'Bến Cát'),
				array("2",22,'Dầu Tiếng'),
				array("2",23,'Dĩ An'),
				array("2",24,'Tân Uyên'),
				array("2",25,'Thuận An'),
				array("2",26,'Thủ Dầu Một'),
				array("2",27,'Phú Giáo'),
				//End binhduong
				//Binhphuoc
  				array("3",31,'Bình Long'),
  				array("3",32,'Bù Đăng'),
  				array("3",33,'Bù Đốp'),
  				array("3",34,'Chơn Thành'),
  				array("3",35,'Đồng Xoài'),
  				array("3",36,'Đồng Phú'),
  				array("3",37,'Lộc Ninh'),
  				array("3",38,'Phước Long'),
				//End binhphuoc
				//dongnai
  				array("4",41,'Biên Hoà'),
  				array("4",42,'Cẩm Mỹ'),
  				array("4",43,'Định Quán'),
  				array("4",44,'Long Khánh'),
  				array("4",45,'Long Thành'),
  				array("4",46,'Tân Phú'),
  				array("4",47,'Thống Nhất'),
  				array("4",48,'Nhơn Trạch'),
  				array("4",49,'Trảng Bom'),
  				array("4",410,'Vĩnh Cửu'),
  				array("4",411,'Xuân Lộc'),
				//End dongnai
				//longan
  				array("5",51,'Bến Lức'),
  				array("5",52,'Cần Đước'),
  				array("5",53,'Cần Giuộc'),
  				array("5",54,'Châu Thành'),
  				array("5",55,'Đức Huệ'),
  				array("5",56,'Đức Hoà'),
  				array("5",57,'Mộc Hoá'),
  				array("5",58,'Tân An'),
  				array("5",59,'Tân Trụ'),
  				array("5",50,'Tân Thạnh'),
  				array("5",511,'Thủ Thừa'),
  				array("5",512,'Thạnh Hoá'),
  				array("5",513,'Tân Hưng'),
  				array("5",514,'Vĩnh Hưng')

				//end longan
			);
			foreach($district as $name){
					$districts = new District();
					$districts->name=$name['2'];
					$districts->id=$name['1'];
					$districts->city_id=$name['0'];
					$districts->save();
			}
			//End create quanhuyen
			//create categories
			$categories = array(
				array('1','Dự Án','du-an'),
				array('2','Nhà Đất','nha-dat'),
				array('3','Nhà','nha'),
				array('4','Đất','dat'),
				array('5','Bất động sản','bat-dong-san'),
				array('6','Thế giới','the-gioi'),
				array('7','Thời sự','thoi-su'),
				array('8','Số hóa','so-hoa'),
				array('9','Thể thao','the-thao'),
				array('10','Giải trí','giai-tri'),
				array('11','Cười','cuoi')
			);
			foreach($categories as $name){
					$category = new Categories();
					$category->id=$name['0'];
					$category->name=$name['1'];
					$category->title=$name['2'];
					$category->save();
			}
			$items = array(
				array('1','Dự án','du-an',5),
				array('2','Tư liệu','tu-lieu',6),
				array('3','Phân tích','phan-tich',6),
				array('4','Bản tin','ban-tin',7),
				array('5','Sản phẩm','san-pham',8),
				array('6','Kinh nghiệm','kinh-nghiem',8),
				array('7','Bóng đá','bong-da',9),
				array('8','Tennis','tennis',9),
				array('9','Cờ vua','co-vua',9),
				array('10','Điện ảnh','dien-anh',10),
				array('11','Âm nhạc','am-nhac',10),
				array('12','Tiểu phẩm','tieu-pham',11)
			);
			foreach($items as $name){
					$item = new Item();
					$item->id=$name['0'];
					$item->name=$name['1'];
					$item->title=$name['2'];
					$item->categories_id=$name['3'];
					$item->save();
			}
			//End create categories
			$groups = array(
				array('1','Trong nước','trong-nuoc',7,1),
				array('2','Ngoại hạng Anh','ngoai-hang-anh',7,2),
				array('3','La Liga','la-liga',7,4),
				array('4','Serie A','serie-a',7,5),
				array('5','Bundesliga','bundesliga',7,3),
			);
			foreach($groups as $name){
					$group = new Group();
					$group->id=$name['0'];
					$group->name=$name['1'];
					$group->title=$name['2'];
					$group->item_id=$name['3'];
					$group->country_id=$name['4'];
					$group->save();
			}
			//create types
			$types = array(
				array(1,'Mua','mua'),
				array(2,'Bán','ban'),
				array(3,'Thuê','thue'),
				array(4,'Cho thuê','cho-thue')
			);
			foreach($types as $name){
					$type = new Types();
					$type->id=$name['0'];
					$type->name=$name['1'];
					$type->title=$name['2'];
					$type->save();
			}
			//End create types
			//create types
			$areas = array(
				array(1,'0 - 100m2'),
				array(2,'100m2 - 500m2'),
				array(3,'500m2 - 1.000m2'),
				array(4,'Trên 1.000m2')
			);
			foreach($areas as $name){
					$area = new Area();
					$area->id=$name['0'];
					$area->name=$name['1'];
					$area->save();
			}
			//End create types
			//create types
			$productamounts = array(
				array(1,'0 - 300 triệu'),
				array(2,'300 triệu - 500 triệu'),
				array(3,'500 triệu - 1 tỷ'),
				array(4,'Trên 1 tỷ')
			);
			foreach($productamounts as $name){
					$productamount = new ProductsAmount();
					$productamount->id=$name['0'];
					$productamount->name=$name['1'];
					$productamount->save();
			}
			//End create types
			//create unit
			$units = array(
				array(1,'m2','area'),
				array(2,'triệu','amount'),
				array(3,'tỷ','amount')
			);
			foreach($units as $name){
					$unit = new Unit();
					$unit->id=$name['0'];
					$unit->name=$name['1'];
					$unit->type=$name['2'];
					$unit->save();
			}
			//End create unit
			return true;
			
		}//End public static function createFirst(){
			//load City
			public static function loadCity(){
				$info = City::Where('deleted','=','0')->get();
				return $info;
			}
			//End load city
		public static function getIdCity($city){
				$info = City::Where('deleted','=','0')
							->Where('title','=',$city)
							->first();
				return $info;
		}
		public static function getCityById($city){
				$info = City::Where('deleted','=','0')
							->Where('id','=',$city)
							->first();
				return $info;
		}
		public static function createData(){
			$usertype = array(
				array("97",'113',"Bùi Văn Sự",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("98",'113',"Bà Cả",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("99",'113',"Phạm Tấn Mười",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("100",'113',"Nguyễn Văn Thương",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("101",'113',"Hương Lộ 11",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("102",'113',"8B",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("103",'113',"Bờ Đất Mới",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("104",'113',"Bờ Nhà Thờ",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("105",'113',"Bùi Thanh Khiết",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("106",'113',"Cây Bàn",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("107",'113',"Chánh Hưng",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("96",'113',"Quốc Lộ 50",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("108",'113',"Đại Lộ Trần Văn Giàu",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("109",'113',"Đất",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("110",'113',"Đinh Đức Thịnh",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("111",'113',"Đoàn Nguyễn Tuân",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("113",'113',"Hoàng Văn Thái",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("114",'113',"Huỳnh Văn Tuấn",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("115",'113',"Hương Lộ 80",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("116",'113',"Kênh T12",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("117",'113',"Kinh A",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("118",'113',"Làng Le Bầu Có",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("119",'113',"Lê Đình Chi",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("120",'113',"Lô 2",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("121",'113',"Nguyễn Cửu Phú",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("122",'113',"Nguyễn HỮu Lợi",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("123",'113',"Nguyễn Hữu Trí",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("124",'113',"Nguyễn Thị Tú",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("125",'113',"Nguyễn Tri Phương",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("126",'113',"Nguyễn Văn Bứa",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("127",'113',"Nguyễn Văn Linh",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("128",'113',"Nữ Dân Công",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("129",'113',"Ông Niệm",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("130",'113',"Phạm Hùng",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("131",'113',"Phạm Văn Thuận",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("112",'113',"Giao Thông Hào",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("132",'113',"Quốc Lộ 1A",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("133",'113',"Rạch Ông Đồ",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("134",'113',"Tân Liêm",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("135",'113',"Thanh Niên",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("136",'113',"Tỉnh Lộ 10",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("137",'113',"Trần Đại Nghĩa",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("138",'113',"Vĩnh Lộc",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("138",'113',"Võ Hữu Lượng",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("139",'113',"Võ Văn Vân",'0','2015-06-28 10:16:31','2015-06-28 10:16:31'),
				array("140",'113',"Vườn Thơm",'0','2015-06-28 10:16:31','2015-06-28 10:16:31')
				
					
			);
			foreach($usertype as $name){
					$users = new Street();
					$users->id=$name['0'];
					$users->district_id=$name['1'];
					$users->name=$name['2'];
					$users->deleted=$name['3'];
					$users->created_at=$name['4'];
					$users->updated_at=$name['5'];
					$users->save();
			}
		}
		public static function createStreet(){
			$data = array(
				array(11,'11','Alexandre'),
				array(12,'11','Bà Lê Chân'),
				array(13,'11','Bùi Thị Xuân'),
				array(14,'11','Bùi Viện'),
				array(15,'11','Cách Mạng Tháng Tám'),
				array(16,'11','Calmette'),
				array(17,'11','Cao Bá Nhạ'),
				array(18,'11','Cao Bá Quát'),
				array(19,'11','Cô Bắc'),
				array(20,'11','Cô Giang'),
				array(21,'11','Cống Quỳnh'),
				array(22,'11','Chu Mạnh Trinh'),
				array(23,'11','Chương Dương'),
				array(24,'11','Đặng Dung'),
				array(25,'11','Đặng Tất'),
				array(26,'11','Đặng Thị Nhu'),
				array(27,'11','Đặng Trần Côn'),
				array(28,'11','Đề Thám'),
				array(29,'11','Đinh Công Tráng'),
				array(30,'11','Đông Du'),
				array(31,'11','Đồng Khởi'),
				array(32,'11','Hai Bà Trưng'),
				array(33,'11','Hải Triều'),
				array(34,'11','Hàm Nghi'),
				array(35,'11','Hàn Thuyên'),
				array(36,'11','Hòa Mỹ'),
				array(37,'11','Hồ Hảo Hớn'),
				array(38,'11','Hồ Huấn Nghiệp'),
				array(39,'11','Hồ Tùng Mậu'),
				array(40,'11','Hoàng Sa'),
				array(41,'11','Huyền Quang'),
				array(42,'11','Huyền Trân Công Chúa'),
				array(43,'11','Huỳnh Khương Ninh'),
				array(44,'11','Huỳnh Thúc Kháng'),
				array(45,'11','Ký Con'),
				array(46,'11','Lê Anh Xuân'),
				array(47,'11','Lê Công Kiều'),
				array(48,'11','Lê Duẩn'),
				array(49,'11','Lê Lai'),
				array(50,'11','Lê Lợi'),
				array(51,'11','Lê Thánh Tôn'),
				array(52,'11','Lê Thị Hồng Gấm'),
				array(53,'11','Lê Thị Riêng'),
				array(54,'11','Lê Văn Hưu'),
				array(55,'11','Lương Hữu Khánh'),
				array(56,'11','Lưu Văn Lang'),
				array(57,'11','Lý Tự Trọng'),
				array(58,'11','Lý Văn Phức'),
				array(59,'11','Mã Lộ'),
				array(60,'11','Mạc Đĩnh Chi'),
				array(61,'11','Mạc Thị Bưởi'),
				array(62,'11','Mai Thị Lựu'),
				array(63,'11','Nam Kỳ Khởi Nghĩa'),
				array(64,'11','Nam Quốc Cang'),
				array(65,'11','Ngô Đức Kế'),
				array(66,'11','Ngô Văn Năm'),
				array(67,'11','Nguyễn Bỉnh Khiêm'),
				array(68,'11','Nguyễn Cảnh Chân'),
				array(69,'11','Nguyễn Công Trứ'),
				array(70,'11','Nguyễn Cư Trinh'),
				array(71,'11','Nguyễn Du'),
				array(72,'11','Nguyễn Đình Chiểu'),
				array(73,'11','Nguyễn Huệ'),
				array(74,'11','Nguyễn Hữu Cảnh'),
				array(75,'11','Nguyễn Hữu Cầu'),
				array(76,'11','Nguyễn Huy Tự'),
				array(77,'11','Nguyễn Khắc Nhu'),
				array(78,'11','Nguyễn Phi Khanh'),
				array(79,'11','Nguyễn Thái Bình'),
				array(80,'13','Bà Huyện Thanh Quan'),
				array(81,'13','Bàn Cờ'),
				array(82,'13','Cách Mạng Tháng Tám'),
				array(83,'13','Cao Thắng'),
				array(84,'13','Điện Biên Phủ'),
				array(85,'13','Đoàn Công Bửu'),
				array(86,'13','Hai Bà Trưng'),
				array(87,'13','Hồ Xuân Hương'),
				array(88,'13','Huỳnh Tịnh Của'),
				array(89,'13','Kỳ Đồng'),
				array(90,'13','Lê Ngô Cát'),
				array(91,'13','Lê Quý Đôn'),
				array(92,'13','Nguyễn Văn Trỗi'),
				array(93,'13','Lê Văn Sỹ'),
				array(94,'13','Lý Chính Thắng'),
				array(95,'13','Lý Thái Tổ')
				);
			foreach($data as $name){
					$user = new Street();
					$user->id=$name['0'];
					$user->district_id=$name['1'];
					$user->name=$name['2'];
					$user->save();
			}
		}


		
		
	}