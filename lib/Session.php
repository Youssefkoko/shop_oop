<?php 

/**
 * Session Class
 * 
 */
class Session{
  public static function init(){
     session_start();
  }
  public static function set($key, $value){
    $_SESSION[$key] = $value;
  }

  public static function get($key){
    if (isset($_SESSION[$key])) {
      # code...
      return $_SESSION[$key];
    }else {
      # code...
      return false;
    }
  }

  public static function checkSession(){
    self::init();
    if (self::get('adminLogin') == false) {
      # code...
      self::destroy();
      header('Location:login.php');
    }
  }

  
  public static function checkLogin(){
    self::init();
    if(self::get('adminLogin') == true ){
      header('location:index.php');
    }
  }
  
  public static function destroy(){
    session_destroy();
    header('location:login.php ' );
  }
 }