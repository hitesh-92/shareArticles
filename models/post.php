<?php

class PostModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM posts ORDER BY create_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add(){
        //Sanitise input data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']) {

            //Insert to DB
            $this->query('INSERT INTO posts (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');

            //bind data
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            // $this->bind(':user_id', $post['user_id']);
            //TEST
            $this->bind(':user_id', 1);

            $this->execute();

            //verifiy submission and redirect
            if( $this->lastInsertId() ) header('Location:' . ROOT_URL . '/posts');

            return;
        }

    }
}

?>