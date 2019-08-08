<?php 
     class Wimg extends Controller
     {
         public function index($name='')
         {
             
            $img = $this->model('Wimgs');
            $img->read();
             
            $num = $img->read()->rowCount();
             
            $my_arr = array();
            if($num > 0)
            {
               foreach($img->read()->fetchAll() as $v) 
               { 
                     $my_arr[count($my_arr)] = $v;
                }
            }


            $web = $this->model('Web');

            for ($i=0; $i <count($my_arr) ; $i++) 
            { 
             $web->single($my_arr[$i]['web_id']);
                $num = $web->single($my_arr[$i]['web_id'])->rowCount();

                if($num > 0)
                {
                   foreach($web->single($my_arr[$i]['web_id'])->fetchAll() as $v) { 

                        $my_arr[$i]['web'] = $v['name'];
                        
                   }
                }
            }

            $web->close();
            $this->view('dashboard/images/index' , ['name'=>$my_arr]);
            
         }


         public function create($name='')
         {

             
            $categ = $this->model('Web');
            $categ->read();
            
            $num =$categ->read()->rowCount();
            
            $my_cat = array();
            if($num > 0)
            {
               foreach($categ->read()->fetchAll() as $v) { 
                    $my_cat[count($my_cat)] = $v;
               }
            }
            $categ->close(); 
            $this->view('dashboard/images/create' , ['name'=>$my_cat]);
            
         }

         
         public function store($name='')
         {
            Session::start();  
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {

                if(empty($_POST['web']) || empty($_FILES["image"]["tmp_name"]))
                {
                   Session::set("err" , "please fill all input fields");
                   header('Location: '.$this->location.'wimg/create');
                   exit;
                }

                $web = (int) $_POST['web'];

                $target_dir = "asset/uploads/";
                $extension=array("jpeg","jpg","png","gif");
                $target_file =  $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                $uploadOk = 1;
                } else {
                    Session::set("err" , "some files not image");
                    $uploadOk = 0;
                    header('Location: '.$this->location.'wimg/create'); 
                    return;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    // echo basename($_FILES["image"]["name"]);die;
                    Session::set("err" , "some files not image");
                     header('Location: '.$this->location.'wimg/create'); 
                     return;
                // if everything is ok, try to upload file
                } else 
                { 
                   $name_of_image =  microtime().'.'.$imageFileType;
                    move_uploaded_file($_FILES["image"]["tmp_name"],  $target_dir.$name_of_image);    
                }

                $image = $this->model('Wimgs');
                $image->image =  $name_of_image;
                $image->web_id =  $web;
                $image->create();
                $image->close();
            }

            Session::set("suc" , "image created");
            header('Location: '.$this->location.'wimg/index');
            
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


         public function delete($id='')
         {
                Session::start();
                $id = (int) $id;
                if($id <= 0 )
                {
                 header('Location: '.$this->location.'wimg/index');
                 exit;
                }

                $target_dir = "asset/uploads/";
                // unlink($target_dir.$arr_images[$i]);

                $cat = $this->model('Wimgs');
                $cat->single($id);
            
	            $num = $cat->single($id)->rowCount();
	            $my_arr = array();
	            if($num > 0)
	            {
	               foreach($cat->single($id)->fetchAll() as $v) { 
	                    $my_arr[count($my_arr)] = $v;
	               }
	            }
	            
	            unlink($target_dir.$my_arr[0]['image']);
                $cat->delete($id);
                $cat->close();
                Session::set("suc" , "image deleted");
                header('Location: '.$this->location.'wimg/index');
            
         }
     }