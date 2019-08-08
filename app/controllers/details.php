<?php 
     class Details extends Controller
     {
         public function index($id='')
         {
            if ($id <= 0) 
            {
              header('Location: '.$this->location.'error/index');
              exit;
            }

            $web = $this->model('Web');
            $web->single($id);
            $numweb = $web->single($id)->rowCount();
             
            $my_arr_web = array();
            if($numweb > 0)
            {
               foreach($web->single($id)->fetchAll() as $v) 
               { 
                     $my_arr_web[count($my_arr_web)] = $v;
               }
            }
            
            $wimgs = $this->model('Wimgs');
            $wimgs->singlebyweb($id);
            $num = $wimgs->singlebyweb($id)->rowCount();

             
            $my_arr = array();
            if($num > 0)
            {
               foreach($wimgs->singlebyweb($id)->fetchAll() as $v) 
               { 
                     $my_arr[count($my_arr)] = $v;
               }
            }

            $wimgs->close();
             
            $this->view('details' , ['web'=>$my_arr_web[0] , 'wimg'=>$my_arr]);
         }
     }