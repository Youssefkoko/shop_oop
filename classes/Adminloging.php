<?php 
/**
 * Admin Login Class</>
 */
require_once '../lib/Session.php'; 
Session::checkLogin();
require_once '../lib/Database.php'; 
require_once '../helpers/Format.php'; 


class Adminloging {
  private $db;
  private $format;

  public function __construct() {
    $this->db = new Database();
    $this->format = new Format();
  }
  public function adminLogin($adminUser, $adminPass){
    $adminUser = $this->format->validation($adminUser);
    $adminPass = $this->format->validation($adminPass);
    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

    if(empty($adminUser) || empty($adminPass)){
      $loginMsg = 'Please enter your password and username';
      return $loginMsg;
    }else{
      $query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
      $result = $this->db->select($query);
      if ($result) {
        $value = $result->fetch_assoc();
        Session::set('adminLogin', true);
        Session::set('adminId', $value['adminId']);
        Session::set('adminUser', $value['adminUser']);
        Session::set('adminName', $value['adminName']);
        
        header('location:index.php');
      }else {
        $loginMsg = 'Password or Username does not match.';
        return $loginMsg;
      }
    }
  }
}