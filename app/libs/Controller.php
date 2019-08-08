<?php 
    
     class Controller
     {   
          public $location = "http://localhost/gallery/";
          
          public function model($model)
          {
            require_once 'app/models/' . $model .'.php';
            require_once 'app/libs/db.php';
            $db = Database::config();
            return new $model($db);
          }

          public function view($view , $data=[])
          {
            require_once 'app/views/' . $view .'.php';
          }
     }