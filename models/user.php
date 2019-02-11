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

            $row = $this->singleUser();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"    =>$row['id'],
                    "email" =>$row['email']
                );
                header('Location: '.ROOT_URL.'/posts');
            }
            else echo "NO LOGIN";

            return;
        }
    }

    public function logout(){
        //Remove session
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        header('Location: '. ROOT_URL);
    }

}

?>