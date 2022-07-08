<?php 
function is_logged(){
        if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
            return true;
        }else{
            return false;
        } 
}
function get_login(){
    if(is_logged()){
        return $_SESSION['login'];
    }
}