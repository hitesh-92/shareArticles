<?php
class Posts extends Controller{
    protected function Index(){
        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->Index(), true);
    }

    protected function add(){
        //allow accesss to /posts/add only if logged in
        $userNotLoggedIn = !isset($_SESSION['is_logged_in']);
        if( $userNotLoggedIn ) header('Location: ' . ROOT_URL . '/posts');

        $viewmodel = new PostModel();
        $this->ReturnView($viewmodel->add(), true);
    }
}
?>