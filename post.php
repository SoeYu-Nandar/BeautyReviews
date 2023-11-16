<?php 

// User Posting 
include("connect.php");
class Post {
    private $error = "";
   

    public function create_post($userid, $data, $files) {


        if(!empty($data['post']) || !empty($files['file']['name'])) 
        {

            $myimage = "";
            $has_image = 0;

            if(!empty($files['file']['name'])) {

              
                $folder = "uploads/" . $userid . "/" ;

                // create folder
                if(!file_exists($folder)) {
                    mkdir($folder,0777,true);
                }

                $myimage = $folder . basename($_FILES['file']['name']);

                move_uploaded_file($_FILES['file']['tmp_name'],$myimage);

                $has_image = 1;
            }
            $post = addslashes($data['post']);
            $postid = $this->create_postid();
            $reviews_for =$data['reviews'];

            $query = "insert into posts (userid,postid,post,reviews_for,post_image,has_image) 
            values ('$userid','$postid','$post','$reviews_for','$myimage','$has_image')";

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

    
   
    
} 




?>