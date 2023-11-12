<?php 

// User Posting 
include("connect.php");
class Post {
    private $error = "";

    public function create_post($userid, $data) {

        if(!empty($data['post'])) {

            $post = addslashes($data['post']);
            $postid = $this->create_postid();
            $reviews_for =$data['reviews'];

            $query = "insert into posts (userid,postid,post,reviews_for) 
            values ('$userid','$postid','$post','$reviews_for')";

            $DB = new Database();
            $DB->save($query);

        }else 
        {
            $this->error .="Please type something to post!<br>";
        }

        return $this->error;
    }
    public function get_posts($id) {

        $query = "select * from posts where userid = '$id' order by id desc limit 10";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result;
        }else{
            return false;
        }
    }
    private function create_postid() {
        
        $length = rand(4,9);
        $number = "";
        for($i=0; $i < $length; $i++) {
            $new_rand = rand(0, 9);

            $number = $number . $new_rand;
        }
        return $number;
    }
    // public function get_all_posts() {

    //     $query = "select * from posts ordered by id desc limit 10";

    //     $DB = new Database();
    //     $result = $DB->read($query);

    //     if($result) {
    //         return $result;
    //     }else{
    //         return false;
    //     }
    // }

    

}


?>