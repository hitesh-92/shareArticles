<?php

class UserModel extends Model{

    public function register(){
    
        //Sanitise input data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Encrypt password
        $password = md5($post['password']);

        if($post['submit']) {

            //Insert to DB
            $this->query('INSERT INTO users (email, password) VALUES(:email, :password)');

            //bind data
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $this->execute();

            //verifiy submission and redirect
            if($this->lastInsertId()) header('Location:'.ROOT_URL . '/users/login');

            return;
        }
        
    }

    public function login(){

        //Sanitise input data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Encrypt password
        $password = md5($post['password']);

        if($post['submit']) {

            //Insert to DB
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');

            //bind data
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            // $this->execute();

            $row = $this->singleUser();

            if($row) echo "Loggd In";
            else echo "NO LOGIN";
            
            //verifiy submission and redirect
            // if($this->lastInsertId()) header('Location:'.ROOT_URL . '/users/login');

            return;
        }
    }

}

?>