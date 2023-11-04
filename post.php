<?php 


class Post {
    private $error = "";

    public function create_post($id, $data) {

        if(!empty($data['post'])) {

            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "insert into posts (id,postid,post) 
            values ('$id','$postid','$post')";

            $DB = new Database();
            $DB->save($query);

        }else 
        {
            $this->error .="Please type something to post!<br>";
        }

        return $this->error;
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