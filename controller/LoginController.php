<?php
require "model/LoginModel.php";// import model

// http://locohost/students/index.phpc=login&m=index
// m : ten ham nam trong controller
// vd : index 
$m = trim($_GET['m'] ?? 'index'); // neu ton tai no se tra ve chinh no con khong no se tra ve index va trim dung de xoa khoang trang 
$m = strtolower($m);// chuyen ve chu thuong 
switch ($m) {
    case 'index':
        index();
    break;
    case 'handle':
        handleLogin();
    case 'logout':
        handleLogout();
    break;
    default:
        echo 'Not found request';
    break;
}
function handleLogout(){
    if(isset($_POST['btnLogout'])) {
        //nguoi dung thuc su muon thoat ra ngoai
        //xoa het cac session da tao ra o loggin 
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['idAccount']);
        unset($_SESSION['idUser']);
        unset($_SESSION['idRole']);
        header("Location:index.php");
    }
}
function handleLogin(){
    //kiem tra nguoi bam submit login chua ?
    if (isset($_POST['btnLogin'])){
        //Lay thong tin username
        $username = trim($_POST['username'] ?? null);
        $username = strip_tags($username);
        //lay thong tin password 
        $password = trim($_POST['password'] ?? null);
        $password = strip_tags($password);

        if (empty ($username) || empty($password) ) {
            // nguoi dung ko nhap du thong tin
            header("Location:index.php?state=error");
        }
        else {
            // nguoi dung co nhap du thong tin 
            $userInfo = checkLoginUser($username, $password);
            // print_r($userInfo);
            // die;
            if(empty($userInfo)) {
                //tai khoan khong ton tai trong db
                header("Location:index.php?state=fail");
            }
            else {
                //tai khoan co ton tai trong db 
                //luu thong tin nguoi dung vao mang session
                $_SESSION['username'] = $userInfo['username'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['phone'] = $userInfo['phone'];
                $_SESSION['idAccount'] = $userInfo['id'];
                $_SESSION['idUser'] = $userInfo['user_id'];
                $_SESSION['idRole'] = $userInfo['role_id'];
                //cho vao trang quan tri
                header("Location:index.php?c=dashboard");
            }
        }
    }
}
function index() {
    // load view
    if(isLoginUser()) {
        header("Location:index.php?c=dashboard");
        exit();
    }
    require APP_PATH_VIEW . 'login/index_view.php';
}