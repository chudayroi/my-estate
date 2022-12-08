<?php
if(function_exists('mail')){
    //php có hỗ trợ hàm mail()
     
    //thực hiện gửi mail trong php qua hàm mail()
    //email người nhận
    $receiver= 'fulands@gmail.com';
     
    //email người gửi
    $sender= 'mr.thanhbinhnguyen@gmail.com';
     
    //tiêu đề thư
    $subject= 'Welcome to laptrinhviet.com';
     
    //nội dung thư: có thể là HTML
    $message= '
        <h1>Chào mừng bạn đến với Lập Trình Việt</h1>
        <p>Trung tâm đào tạo lập trình viên chuyên nghiệp từ căn bản tới nâng cao</p>
        <p>Vui lòng truy cập <a href="http://laptrinhviet.com">laptrinhviet.com</a> để biết thêm thông tin</p>
        <p style="color: red; font-weight: bold;">Cảm ơn bạn đã ủng hộ Lập Trình Việt!</p>
    ';
     
    // cấu hình gửi mail HTML định dạnh UTF-8
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
 
     
    $headers .= 'From: '.$sender.'' . "\r\n"; //cấu hình người gửi
    $headers .= 'Reply-To: '.$sender.'' . "\r\n"; //cấu hình người nhận mail trả lời
    $headers .= 'X-Mailer: PHP/' . phpversion();
     
    //thực hiện request gửi thư qua hàm mail()
    if(mail($receiver, $subject, $message, $headers)){
        die('Gửi mail thành công!');
    }else{
        die('Có lỗi trong quá trình gửi mail');
    }
 
}else{
    //php không hỗ trợ hàm mail()
}
?> 