<?php
if(!function_exists('isLoginUser')){
    function isLoginUser() {
        $sessionUserName = getSessionUsername();
        $sessionIdUser = getSessionIdUser();
        if(empty($sessionUserName) || is_null($sessionIdUser)){
            return false;
        }
        return true;
    }
}