<?php
//routing : duong dan truy cap 
// http://locohost/students/index.phpc=login&m=index
// c : ten cua controller nam trong thu muc controller
$c =trim($_GET['c'] ?? 'login');
$c =ucfirst($c);//viet hoa chu cai dau tien 
//vd : LoginController 
switch($c){
    case 'Login':
        require APP_PATH_CONTROLLER . 'LoginController.php';
        break;
    case 'Dashboard':
        require APP_PATH_CONTROLLER . 'DashboardController.php';
        break;
    case 'Department':
        require APP_PATH_CONTROLLER . 'DepartmentController.php';
        break;
    case 'Course':
        require APP_PATH_CONTROLLER . 'CoursesController.php';
    default :
        echo 'Not found request';
        break;
}
