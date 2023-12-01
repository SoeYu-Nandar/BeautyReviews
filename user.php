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
   public function get_all_user($id,$postid) {

       $query = "SELECT comments.*, users.username, users.image
                  FROM comments
                  INNER JOIN users ON comments.userid = users.userid
                  WHERE comments.postid = '$postid'";
                 
      $DB = new Database();
      $result = $DB->read($query);
         return $result;
   }


}















?>