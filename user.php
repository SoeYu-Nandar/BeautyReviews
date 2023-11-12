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
   public function get_all_user($id) {

       $query = "select users.*, posts.* from users
      left join posts on users.userid = posts.userid
      where users.userid = '$id'
      ordered by posts.id desc
      limit 10";
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