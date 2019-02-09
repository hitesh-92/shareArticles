<?php

class PostModel extends Model{
    public function Index(){
        $this->query('SELECT egg FROM pumpkin');
        $rows = $this->resultSet();
        print_r($rows);
        
    }
}

?>