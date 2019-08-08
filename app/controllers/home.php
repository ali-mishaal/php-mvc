<?php 
     class Home extends Controller
     {
         public function index($id='')
         {
            if(empty($id))
            {
               $id = 1;
            }
            $id = (int) $id;

            if($id < 0)
            {
               header('Location: '.$this->location.'error/index');
               exit;
            }

            $cat = $this->model('Categ');
            $cat->read();
             
            $num = $cat->read()->rowCount();
             
            $my_arr = array();
            if($num > 0)
            {
               foreach($cat->read()->fetchAll() as $v) 
               { 
                     $my_arr[count($my_arr)] = $v;
               }
            }

           
            $count = 4 * ($id);
            $web = $this->model('Web');
            $web->read();
            $numweb = $web->read()->rowCount();
            
            $record_num = 4;
            $paginate = $numweb/$record_num;
            $page_count = (int)ceil($paginate);

            $start = ($id-1) * $record_num;
            $end = $record_num;
          

            if ($count > $numweb+4) 
            {
               header('Location: '.$this->location);
               exit;
            }

            $web->readlimit($start,$end);
            $num = $web->readlimit($start,$end)->rowCount();

            
             
            $my_arr_web = array();
            if($num > 0)
            {
               foreach($web->readlimit($start,$end)->fetchAll() as $v) 
               { 
                     $my_arr_web[count($my_arr_web)] = $v;
               }
            }

            $cat->close();
             
            $this->view('index' , ['name'=>$my_arr , 'web'=>$my_arr_web , 'count'=>$page_count]);
         }


          public function readmore()
          {
           
           
             $web = $this->model('Web');
         
    
            $my_arr_web = array();
         
                foreach($web->readlimit_New($_GET['length'])->fetchAll() as $v) 
               { 
                     $my_arr_web[count($my_arr_web)] = $v;
                }
           

             $web->close();
             print_r(json_encode($my_arr_web));
            
         }
     }