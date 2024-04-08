<?php 
$m = trim($_GET['m'] ?? 'index'); // neu ton tai no se tra ve chinh no con khong no se tra ve index va trim dung de xoa khoang trang 
$m = strtolower($m);

switch($m) {
    case 'index':
        index();
        break;
    default:
        index();
        break;
}
function index(){
    if(!isLoginUser()){
        header("Location:index.php");
        exit();
    }
    // load view
    require APP_PATH_VIEW . 'dashboard/index_view.php';
}