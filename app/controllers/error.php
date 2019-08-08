<?php 
     class Error extends Controller
     {
         public function index($name='')
         {
             
            $this->view('error/404');
         }
     }