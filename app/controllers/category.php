<?php 
     class Category extends Controller
     {
         public function index($name='')
         {
             
             $cat = $this->model('Categ');
             $cat->read();
             
             $num = $cat->read()->rowCount();
             
             $my_arr = array();
             if($num > 0)
             {
                foreach($cat->read()->fetchAll() as $v) { 
                     $my_arr[count($my_arr)] = $v;
                }
             }
             $cat->close();
             $this->view('dashboard/category/index' , ['name'=>$my_arr]);
            
         }


         public function create($name='')
         {
             
             $this->view('dashboard/category/create');
            
         }

         
         public function store($name='')
         {
            Session::start();
            if($_POST['name'])
            {
                if(empty($_POST['name']))
                {
                   Session::set("err" , "please fill all input fields");
                   header('Location: '.$this->location.'category/create');
                   exit;
                }

                if (strlen($_POST['name']) < 6) 
                {
                   Session::set("err" , "the name must be 6 letter or more");
                   header('Location: '.$this->location.'category/create');
                   exit;
                }

                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $cat = $this->model('Categ');
                $cat->name =  $name;
                $cat->create();
                $cat->close();
            }

            Session::set("suc" , "category created");
            header('Location: '.$this->location.'category/index');
            
         }


         
         public function edit($id='')
         {

            $id = (int) $id;
            if($id <= 0 )
            {
             header('Location: '.$this->location.'category/index');
             exit;
            }

            $cat = $this->model('Categ');
            $cat->single($id);
            
            $num = $cat->single($id)->rowCount();
            $my_arr = array();
            if($num > 0)
            {
               foreach($cat->single($id)->fetchAll() as $v) { 
                    $my_arr[count($my_arr)] = $v;
               }
            }
            $cat->close();
            $my_arr = $my_arr[0];
             $this->view('dashboard/category/edit',['name'=>$my_arr]);
            
         }

         public function update($id='')
         {
            Session::start();
            $id = (int) $id;
            if($id <= 0 )
            {
             header('Location: '.$this->location.'category/index');
             exit;
            }


            if(empty($_POST['name']))
            {
              Session::set("err" , "please fill input fields");
              header('Location: '.$this->location.'category/edit/'.$id);
              return;
            }

            
            if($_POST['name'])
            {

                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $cat = $this->model('Categ');
                $cat->name =  $name;
                $cat->update($id);
                $cat->close();
            }
            
            Session::set("suc" , "category updated");
            header('Location: '.$this->location.'category/index');
            
         }


         public function delete($id='')
         {
                Session::start();
                $id = (int) $id;
                if($id <= 0 )
                {
                 header('Location: '.$this->location.'category/index');
                 exit;
                }

                $cat = $this->model('Categ');

                if($cat->delete($id))
                {
                  $err= 'category updates';  
                }else
                {
                   $err = 'category not updated';  
                }
            
                $cat->close();
            Session::set("suc" , "category deleted");
            header('Location: '.$this->location.'category/index');
            
         }
     }