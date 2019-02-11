<?php

class PostModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM posts');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add(){
        echo "MODEL POSTS.php";
        //Sanitise input data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']) echo "POOOOOOOOOOOSTTTTTT";

    }
}

?>