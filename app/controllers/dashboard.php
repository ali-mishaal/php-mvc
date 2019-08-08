<?php 
     class Dashboard extends Controller
     {
         public function index($name='')
         {
             $this->view('dashboard/index');
         }
     }