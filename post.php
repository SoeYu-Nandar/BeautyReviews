<?php 

// User Posting 
include("connect.php");

class Post
{
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
    public function get_one_posts($postid) {

        if(!is_numeric($postid)){
            return false;
        }
        $query = "SELECT * FROM posts WHERE postid ='$postid' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        }else{
            return false;
        }
    }

    public function delete_post($postid) {

        if(!is_numeric($postid)){
            return false;
        }
         $query = "DELETE FROM posts WHERE postid ='$postid' limit 1";

         $DB = new Database();
         $result = $DB->delete($query);
         

       
    }
    
    public function like_post($id, $type, $userid) {

        if($type == "post") {
            $DB = new Database();
            // save likes details
            $sql = "select likes from likes where type ='post' && contentid ='$id' limit 1" ;
            $result = $DB->read($sql);
            if(is_array($result)) {

                $likes = json_decode($result[0]['likes'],true);

                $user_ids = array_column($likes, "userid");

                if(!in_array($userid,$user_ids)) {

                    
                    $arr["userid"] = $userid;
                    $arr["date"] = date("Y-m-d H:i:s");
                    
                    $likes[] = $arr;
                    $likes_string = json_encode($likes);
                    $sql = "update likes set likes = '$likes_string' where type ='post' && contentid ='$id' limit 1" ;
                    $DB->save($sql);

                     // increment the post table
                    
                     $sql = "update posts set likes = likes +1 where postid = '$id' limit 1";
                     $DB->save($sql);

                }else{
                    $key = array_search($userid,$user_ids);
                    unset($likes[$key]);
                    $likes_string = json_encode($likes);
                    $sql = "update likes set likes = '$likes_string' where type ='post' && contentid ='$id' limit 1" ;
                    $DB->save($sql);

                    $sql = "update posts set likes = likes -1 where postid = '$id' limit 1";
                    $DB->save($sql); 
                   
                }

            }else {

                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");

                $arr2[] = $arr;
                $likes = json_encode($arr2);
                $sql = "insert into likes (type,contentid,likes) values ('$type','$id','$likes')";
                $DB->save($sql);

                // increment the post table
                
                $sql = "update posts set likes = likes +1 where postid = '$id' limit 1";
                $DB->save($sql);    
            }

            
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


            public function edit_post($userid,$data, $files) 
            {


                if(!empty($data['post']) || !empty($files['file']['name'])) 
                {

                    $myimage = "";
                    $has_image = 0;

                    if(!empty($files['file']['name'])) 
                    {

                        //$userid = $data['userid'];
                        //$postid =addslashes($data['postid']); 
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
                    $postid =addslashes($data['postid']); 
                    
                    $reviews_for =$data['reviews'];
                    if($has_image){
                    $query = "update posts set post = '$post',reviews_for='$reviews_for' where postid = '$postid' limit 1";
                    }else{
                    $query = "update posts set post = '$post',post_image='$myimage',reviews_for='$reviews_for' where postid = '$postid' limit 1";
                    }
                    $DB = new Database();
                    $DB->save($query);

                }else 
                {
                    $this->error .="Please type something to post!<br>";
                }

                return $this->error;
                
                }

            }

        

    










?>