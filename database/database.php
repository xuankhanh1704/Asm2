<?php 
function connectionDb(){
    try {
    $dbh = new PDO('mysql:host=localhost;dbname=student_mangement','root', ''); 
    return $dbh;
    } catch (PDOException $e) { 
        echo"Can not connect to database";
        echo "<br/>";
        echo "<pre>";
        print_r($e);
        die();
    }
}
function disconnectionDb($connection) {
    $connection = null;
}

// dung thu vien PDO cua PHP de lam viec voi database (MySql)
// ngat ket noi database 
// viet ham ket noi csdl 

// . Tham số đầu tiên là chuỗi kết nối (DSN) chứa thông tin về máy chủ (host) và tên cơ sở dữ liệu. Tham số thứ hai là tên người dùng của cơ sở dữ liệu và tham số thứ ba là mật khẩu. Trong trường hợp này, tên người dùng là 'root' và mật khẩu là '' (rỗng), tức là không có mật khẩu.
// bắt đầu  khối catch để xử lí ngoại lệ PDOException 
    // attempt to retry the connection after some timeout for example