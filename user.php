<?php 

class User {
   public function get_user($id) {

      $query = "select * from users where userid = '$id' limit 1";
      $DB = new Database();
      $result = $DB->read($query);

      if($result) {
         return $result[0];
      }else {
         return false;
      }
   }
}













?>