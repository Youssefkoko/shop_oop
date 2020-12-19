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

   public static function destroy($key){
     session_destroy();
     header('location:login.php ' )
   }
 }