<?php 
     class Websites extends Controller
     {
         public function index($name='')
         {
             
             $web = $this->model('Web');
             $web->read();

             
             
             $num = $web->read()->rowCount();
             
             $my_arr = array();
             if($num > 0)
             {
                foreach($web->read()->fetchAll() as $v) { 
                     $my_arr[count($my_arr)] = $v;
                }
             }

             $wimgs = $this->model('Wimgs');
             $wimgs->read();

             $numimg = $web->read()->rowCount();
             
             $my_arr_img = array();
             if($numimg > 0)
             {
                foreach($wimgs->read()->fetchAll() as $v) { 
                     $my_arr_img[count($my_arr_img)] = $v;
                }
             }

            
            
            $cat = $this->model('Categ');

            for ($i=0; $i <count($my_arr) ; $i++) 
            { 
                
                $cat->single($my_arr[$i]['cat_id']);
                $num = $cat->single($my_arr[$i]['cat_id'])->rowCount();

                if($num > 0)
                {
                   foreach($cat->single($my_arr[$i]['cat_id'])->fetchAll() as $v) { 

                        $my_arr[$i]['category'] = $v['name'];
                        
                   }
                }
            }


             $web->close();
             $this->view('dashboard/websites/index' , ['name'=>$my_arr , 'image'=>$my_arr_img]);
            
         }


         public function create($name='')
         {

            $categ = $this->model('Categ');
            $categ->read();
            
            $web = $this->model('Web');
            $num =$web->read()->rowCount();
            $id = $num + 1;
            $numc = $categ->read()->rowCount();
            
            $my_cat = array();
            if($numc > 0)
            {
               foreach($categ->read()->fetchAll() as $v) { 
                    $my_cat[count($my_cat)] = $v;
               }
            }
            $categ->close();
             
             $this->view('dashboard/websites/create' ,['name'=>$my_cat , 'id'=>$id]);
            
         }

         
         public function store($name='')
         {
            Session::start();  
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                
                if(empty($_POST['name']) || empty($_POST['cat']) || empty($_POST['company']) || empty($_POST['owner']) || empty($_FILES["image"]["tmp_name"]) || empty($_POST['country']) || empty($_POST['tech']) || empty($_POST['url']) || empty($_POST['duration']) || empty($_POST['desc']) || empty($_FILES["images"]["tmp_name"]))
                {
                    Session::set("err" , "please fill all input fields");
                    header('Location: '.$this->location.'websites/create');
                    return;
                } 

                if($this->validateDate($_POST['date']))
                {
                    $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                }else
                {    
                     Session::set("err" , "date not valid");
                     header('Location: '.$this->location.'websites/create'); 
                     return;
                }

                $target_dir = "asset/uploads/";
                $extension=array("jpeg","jpg","png","gif");
                $target_file =  $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $arr_images = array();
                foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) 
                {
                    $file_name=$_FILES["images"]["name"][$key];
                    $file_tmp=$_FILES["images"]["tmp_name"][$key];
                    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                    if(in_array($ext,$extension) && in_array($imageFileType, $extension)) 
                    {

                        $newFileName =  microtime().'.'.$ext;
                        $arr_images[count($arr_images)] = $newFileName; 
                        move_uploaded_file($_FILES["images"]["tmp_name"][$key],  $target_dir.$newFileName); 
                        
                    }
                    else 
                    {  
                        
                        for($i=0 ; $i<count($arr_images) ; $i++)
                        {
                            unlink($target_dir.$arr_images[$i]);
                        } 

                       Session::set("err" , "some files not image");
                       header('Location: '.$this->location.'websites/create'); 
                       return;
                    }
                }

               
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $owner = filter_var($_POST['owner'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
               
                //image valid
                
               
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                $uploadOk = 1;
                } else {
                    Session::set("err" , "some files not image");
                    $uploadOk = 0;
                    header('Location: '.$this->location.'websites/create'); 
                    return;
                }
                
                // Check file size
                // if ($_FILES["image"]["size"] > 500000) {
                //     echo "Sorry, your file is too large.";
                //     $uploadOk = 0;
                // }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo basename($_FILES["image"]["name"]);die;
                    Session::set("err" , "some files not image");
                     header('Location: '.$this->location.'websites/create'); 
                     return;
                // if everything is ok, try to upload file
                } else 
                { 
                   $name_of_image =  microtime().'.'.$imageFileType;
                    move_uploaded_file($_FILES["image"]["tmp_name"],  $target_dir.$name_of_image);    
                }

                


                $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $tech = filter_var($_POST['tech'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $image = $name_of_image;
                $id_web = (int)$_POST['id'];
               
                
                $web = $this->model('Web');
                $web->id = $id_web;
                $web->name =  $name;
                $web->cat_id = $cat;
                $web->image = $image;
                $web->desc = $desc;
                $web->company = $company;
                $web->owner = $owner;
                $web->op_date = $date;
                $web->country = $country;
                $web->tech = $tech;
                $web->url = $url;
                $web->duration = $duration;
                $web->create();

                $wimgs = $this->model('Wimgs');
                for($i=0 ; $i < count($arr_images) ; $i++)
                {
                  $wimgs->image = $arr_images[$i];
                  $wimgs->web_id = $id_web;
                  $wimgs->create();
                }
                
                $web->close();
            }

             Session::set("suc" , "website created");
             header('Location: '.$this->location.'websites/index'); 
            
         }


         
         public function edit($id='')
         {
            $categ = $this->model('Categ');
            $categ->read();

            $numc = $categ->read()->rowCount();
            
            $my_cat = array();
            if($numc > 0)
            {
               foreach($categ->read()->fetchAll() as $v) { 
                    $my_cat[count($my_cat)] = $v;
               }
            }

            $id = (int) $id;
            if($id <= 0 )
            {
             header('Location: '.$this->location.'websites/index');
             exit;
            }

            $web = $this->model('Web');
            $web->single($id);
            
            $num = $web->single($id)->rowCount();
            $my_arr = array();
            if($num > 0)
            {
               foreach($web->single($id)->fetchAll() as $v) { 
                    $my_arr[count($my_arr)] = $v;
               }
            }
            $web->close();
            $my_arr = $my_arr[0];
             $this->view('dashboard/websites/edit',['name'=>$my_arr , "cat"=>$my_cat]);
            
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

             
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(empty($_POST['name']) || empty($_POST['cat']) || empty($_POST['company']) || empty($_POST['owner']) || empty($_POST['country']) || empty($_POST['tech']) || empty($_POST['url']) || empty($_POST['duration']) || empty($_POST['desc']))
                {
                    Session::set("err" , "please fill inputs fields");
                    header('Location: '.$this->location.'websites/edit/'.$id);
                    return;
                } 

                if($this->validateDate($_POST['date']))
                {
                    $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                }else
                {
                    Session::set("err" , "date not valid");
                    header('Location: '.$this->location.'websites/edit/'.$id); 
                    return;
                }
                
                $web = $this->model('Web');
                $web->single($id);

                $wimgs = $this->model('Wimgs');
                
                $num = $web->single($id)->rowCount();
                $my_arr = array();
                if($num > 0)
                {
                   foreach($web->single($id)->fetchAll() as $v) { 
                        $my_arr[count($my_arr)] = $v;
                   }
                }

                
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $owner = filter_var($_POST['owner'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

                $target_dir = "asset/uploads/";
                $extension=array("jpeg","jpg","png","gif");
                $target_file =  $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $arr_images = array();
                $arr_image_err = array();
               
              
                if (!empty($_FILES["images"]["tmp_name"][0])) 
                {   
                    
                    foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) 
                    {
                        $file_name=$_FILES["images"]["name"][$key];
                        $file_tmp=$_FILES["images"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                        if(in_array($ext,$extension) && !empty($_FILES["image"]["tmp_name"]) && in_array($imageFileType, $extension)) 
                        {
                            
                            $newFileName =  microtime().'.'.$ext;
                            $arr_images[count($arr_images)] = $newFileName; 
                            move_uploaded_file($_FILES["images"]["tmp_name"][$key],  $target_dir.$newFileName); 
                            
                        }elseif (in_array($ext,$extension) && empty($_FILES["image"]["tmp_name"])) 
                        {   
                           
                            $newFileName =  microtime().'.'.$ext;
                            $arr_images[count($arr_images)] = $newFileName; 
                            move_uploaded_file($_FILES["images"]["tmp_name"][$key],  $target_dir.$newFileName); 
                        }
                        else 
                        {  
                            
                            for($i=0 ; $i<count($arr_images) ; $i++)
                            {
                                unlink($target_dir.$arr_images[$i]);
                            } 
                           Session::set("err" , "some files not images");
                           header('Location: '.$this->location.'websites/edit/'.$id); 
                           return;
                        }
                    }



                        $websites_image = $wimgs->singlebyweb($id);
                        $num = $websites_image->rowCount();

             
                         $my_arr_im = array();
                         if($num > 0)
                         {
                            foreach($websites_image->fetchAll() as $v) 
                            { 
                                unlink($target_dir.$v['image']);
                            }
                         }
                      
                        $wimgs->deleteweb($id);

                        
                        for($i=0 ; $i < count($arr_images) ; $i++)
                        {
                          $wimgs->image = $arr_images[$i];
                          $wimgs->web_id = $id;
                          $wimgs->create();
                        }
                }

                if(!empty($_FILES["image"]["tmp_name"]))
                {
                //image valid
                $target_dir = "asset/uploads/";
                $target_file =  $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                
                // Check file size
                // if ($_FILES["image"]["size"] > 500000) {
                //     echo "Sorry, your file is too large.";
                //     $uploadOk = 0;
                // }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo basename($_FILES["image"]["name"]);die;
                   Session::set("err" , "some files not images");
                   header('Location: '.$this->location.'websites/edit/'.$id);
                   return; 
                // if everything is ok, try to upload file
                } else 
                { 
                   unlink($target_dir.$my_arr[0]['image']); 
                   $name_of_image =  microtime().'.'.$imageFileType;
                   move_uploaded_file($_FILES["image"]["tmp_name"],  $target_dir.$name_of_image);    
                }
                $image = $name_of_image;
               }else
               {
                
                 $image = $my_arr[0]['image'];
               }



                $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $tech = filter_var($_POST['tech'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                $desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                
                
                $web = $this->model('Web');
                $web->name =  $name;
                $web->cat_id = $cat;
                $web->image = $image;
                $web->desc = $desc;
                $web->company = $company;
                $web->owner = $owner;
                $web->op_date = $date;
                $web->country = $country;
                $web->tech = $tech;
                $web->url = $url;
                $web->duration = $duration;
                $web->update($id);

                $web->close();
            }
            Session::set("suc" , "website updated");
            header('Location: '.$this->location.'websites/index');
            
         }


         public function delete($id='')
         {
                Session::start();
                $id = (int) $id;
                if($id <= 0 )
                {
                 header('Location: '.$this->location.'websites/index');
                 return;
                }

                $wimgs = $this->model('Wimgs');
                $wimgs->singlebyweb($id);
                $numimg = $wimgs->singlebyweb($id)->rowCount();
                $target_dir = "asset/uploads/";
             
                 $my_arr_im = array();
                 if($numimg > 0)
                 {
                    foreach($wimgs->singlebyweb($id)->fetchAll() as $v) 
                    { 
                       
                        unlink($target_dir.$v['image']);
                    }
                 }
              
                $wimgs->deleteweb($id);


                $web = $this->model('Web');
                $web->single($id);
                
                $num = $web->single($id)->rowCount();
                $my_arr = array();
                if($num > 0)
                {
                   foreach($web->single($id)->fetchAll() as $v) { 
                        $my_arr[count($my_arr)] = $v;
                   }
                
                }
                
                unlink($target_dir.$my_arr[0]['image']);
                if($web->delete($id))
                {
                  $err= 'category updates';  
                }else
                {
                   $err = 'category not updated';  
                }


            
                $web->close();
                Session::set("suc" , "website deleted");
                header('Location: '.$this->location.'websites/index');
            
         }

         public function validateDate($date)
         {
            $d = DateTime::createFromFormat('Y-m-d', $date);
            return $d && $d->format('Y-m-d') == $date;
         }
     }