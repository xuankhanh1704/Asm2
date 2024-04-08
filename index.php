<?php
// khoi dong session
if (session_status()== PHP_SESSION_NONE) {
    session_start();
}
require 'config/constant.php'; 
require 'helper/CommonHelper.php';
require 'helper/LoginUserHelper.php';
require 'helper/UploadFileHelper.php';
require 'helper/PaginationHelper.php';
if (file_exists('route/web.php')) {
    require 'route/web.php';
}
else {
    die('Sorry, website can not access');
}
//require đảm bảo rằng tệp tin được chỉ định phải tồn tại và được bao gồm vào mã nguồn của ứng dụng . Nếu không thể tìm thấy tệp tin được yêu cầu, hoặc xảy ra lỗi trong quá trình bao gồm, một thông báo lỗi sẽ được hiển thị và quá trình thực thi của ứng dụng sẽ dừng.
//file_exits dùng để kiểm tra xem tệp có tồn tại không 