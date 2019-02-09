<?php 

class Bootstrap{

    private $controller;
    private $action;
    private $request;

    public function __construct($request){
        $this->request = $request;

        if ($this->request['controller'] == "") $this->controller = 'home';
        else $this->controller = $this->request['controller'];

        if ($this->request['action'] == "") $this->action = 'index';
        else $this->action = $this->request['action'];
        
        echo $this->action;
    }

    public function createController(){

        // Check class
        if ( class_exists($this->controller) ){

            $parents = class_parents($this->controller);

            //Check if extended
            $isController = in_array('Controller', $parents);
            
            if ($isController){
                $hasAction = method_exists($this->controller, $this->action);

                if($hasAction) return new $this->controller($this->action, $this->request);
                else echo "<p><i>Method Does Not Exist!</i></p>"; //Inform user method does not exists
            }
            else {
                echo "<p>Base Controller Not Found.</p>";
                return;
            }

        }
        else {
            echo "<p>Controller Class Does Not Exist.</p>";
            return;
        }
        
    }

}

?>