 
 <?php require_once 'headers.php' ?>
 <!--================Home Banner Area =================-->
 <section class="banner_area">
         <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="transform: translateY(0.448609px);"></div>
            <div class="container">
               <div class="banner_content text-center">
                  <a class="navbar-brand logo_h" href=""><img src="<?php echo $location ?>asset/img/logoo.png" alt="" height="170"></a>
                  <h2>All Websites</h2>
                  <div class="page_link">
                     <a href="<?php echo $location; ?>">Home</a>
                     <a href="#"><?php echo $data['web']['name']; ?></a>
                  </div>
                  <div class="page_link">
                     <a href="<?php echo $location; ?>">Back to Home Page </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
 <!--================Home Gallery Area =================-->
      <section class="project_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-7">
                  <div class="container pt-2">
                     <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- <ol class="carousel-indicators">
                           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                           <li data-target="#myCarousel" data-slide-to="1"></li>
                           <li data-target="#myCarousel" data-slide-to="2"></li>
                           </ol> -->
                        <!-- Carousel Inner -->
                        <div class="carousel-inner">
                           <?php 
                             $count = 0;
                             foreach($data['wimg'] as $img){
                            ?>

                           <div class="carousel-item <?php if($count == 0) {?>active <?php } ?>">
                              <img src="<?php echo $location ?>/asset/uploads/<?php echo $img['image']; ?>" class="d-block w-100" alt="First slide"/>
                           </div>
                           
                           <?php $count++; } ?>
                        </div>
                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> <img src="http://portfolio.pioneers-solutions.com/assets/img/angle-left-w.png" alt=""></span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true">
                        <img src="http://portfolio.pioneers-solutions.com/assets/img/angle-rignt-w.png" alt=""></span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-sm-5  col-xs-12 ">
                  <div class="project_details">
                     <div class="project_name_desc">
                        <h3 class="project_header_title">
                           <i class="fa fa-circle-o"></i>
                           التعريف بالموقع
                           <hr>
                        </h3>
                        <p><?php echo $data['web']['description']; ?></p>
                     </div>
                     <div class="project_info">
                        <h3 class="project_header_title">
                           <i class="fa fa-circle-o"></i>
                           معلومات عن الموقع
                           <hr>
                        </h3>
                        <ul class="project_info_ul uk-nav">
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span>
                              أسم الشركه المالكه للموقع
                              :
                              </span>
                              <?php echo $data['web']['company']; ?>
                           </li>
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span>
                              أسم صاحب المشروع :
                              </span>
                              ا<?php echo $data['web']['owner']; ?>
                           </li>
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span>تاريخ تسليم المشروع
                              :
                              </span>
                              <?php echo $data['web']['op_date']; ?>
                           </li>
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span>مده تنفيذ المشروع
                              :
                              </span>
                              <?php echo $data['web']['duration']; ?>
                           </li>
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span> الدوله
                              :
                              </span>
                              <?php echo $data['web']['country']; ?>
                           </li>
                           <li>
                              <i class="fa fa-angle-double-left"></i>
                              <span>
                              التقنيات المستخدمه لتنفيذ المشروع
                              :</span>
                              <?php 

                               $tech = explode(',', $data['web']['technical']) ; 
                               for($i=0 ; $i < count($tech) ; $i++)
                               {
                                  echo $tech[$i];
                                  if($i != count($tech)-1 )
                                  {
                                    echo " - ";
                                  }
                               }

                               ?>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="see_all_projects">
                     <a href="<?php echo $location ?>">الرجوع للمشاريع </a>
                     <a href="<?php echo $data['web']['url']; ?>">الذهاب للمشروع </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      


<?php require_once 'footer.php' ?>