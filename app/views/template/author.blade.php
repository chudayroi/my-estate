

@extends('template.basic')
@section('slider')
@include('template.slider')
@endsection
@section('content')
<div class="container">
   
   <div class="row">
      <div class="col-sm-9 main-content">
         <!--project-->
         <div><span class='span-bold-red-large'>Nguyễn Bình</span></div>
         <div><span class='span-bold'>Di Động:</span> 0919772359</div>
         <div><span class='span-bold'>Mail:</span>  mr.thanhbinhnguyen@gmail.com</div>
         <div><span class='span-bold'> Chuyên môn:</span></div>
         <div>
- Phân tích, thiết kế và xây dựng website.
         </div>
          <div>
- Tối ưu tốc độ xử lý cho website phải xử lý lượng dữ liệu lớn như rao vặt, bất động sản.
            </div>
             <div>
- Tư vấn chiến lược online marketing.
            </div>
             <div>

- Tối ưu hóa tìm kiếm (SEO) để website có thứ hạng cao trên Google, giúp tăng doanh thu bán hàng.
</div>
<div>
         <span class='span-bold-red-large'>
               Một số website đã thực hiện
         </span>
      </div>
      <div >
            <a href="http://tinbatdongsan.net.vn" target="_blank"><span class='span-bold-blue'> - http://tinbatdongsan.net.vn</span></a>
      </div>
      <div class='span-bold-red-large'>
          Một số tính năng trên website
      </div>
      <div>
          - Website được viết trên nền tảng PHP, Laravel và MYSQL, dung lượng nhẹ, tốc độ tải trang nhanh (có thể chịu tải hơn 50.000 lượt truy cập/ngày)
      </div>
           <div>
          - Website được thiết kế tối ưu SEO giống website fuland.vn giúp website nhanh lên google.com.vn
      </div>
           <div>

          - Tự động nén ảnh khi upload, giúp giảm dung lượng ảnh, tiết kiệm băng thông.
      </div>
           <div>

          - Tích hợp bộ soạn thảo mới nhất.
      </div>
           <div>

          - Tích hợp thanh toán bằng thẻ cào điện thoại.
      </div>
           <div>

          - Sử dụng công nghệ Ajax giúp website xử lý các sự kiện mà không phải load lại trang, giúp giảm tối đa thời gian quản lý.
      </div>
           <div>

          - Có sẵn dữ liệu 700 dự án, 63 tỉnh thành và hơn 750 quận/huyện.
      </div>
           <div>

          - Giao diện thân thiện, dễ sử dụng.
      </div>
           <div>

          - Cam kết bảo hành vĩnh viễn nếu xảy ra lỗi.
      </div>
           <div>

          - Sẽ được hướng dẫn cách SEO website bất động sản để website mau có vị trí cao trên google.
      </div>
           <div>

          - Tích hợp Google Webmaster tool + Google Analytics

      </div>
      </div>
      
      <!--End .main-content-->
      <div class="col-sm-3 side-bar">
         @include('template.tintucnoibat')
         @include('template.lienketnoibat')
         
      </div>
      <!--End .side-bar-->
   </div>
   <!--End .row-->
   @include('template.batdongsantinhtp')
</div>
<!--End .container-->
<!--End .news-->
@endsection

