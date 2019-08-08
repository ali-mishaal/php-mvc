
<?php 

    require_once 'app/views/headers.php'; 

?>

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
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!--================Home Gallery Area =================-->
      <section class="home_gallery_area p_120">
         <div class="container">
            <div class="isotope_fillter">
               <ul class="gallery_filter list">
                  <li class="active" data-filter="*"><a href="#">All</a></li>

                  <?php 
                       foreach ($data['name'] as $cat) {
                          
                   ?>
                     <li data-filter=".<?php echo $cat['id'] ?>"><a href="#"><?php echo $cat['name']; ?></a></li>
                  <?php  }?>
               </ul>
            </div>
         </div>

         <div id="big"  class="container box_1620">
            <div   class="gallery_f_inner row imageGallery1" id="loaded">
               <?php foreach ($data['web'] as $web) { ?>
               
                <div class="lll col-lg-3 col-md-4 col-sm-6 <?php echo $web['cat_id']; ?> " >
                  <div class="h_gallery_item">
                     <img src="<?php echo $location; ?>asset/uploads/<?php echo $web['image']; ?>" alt="">
                     <div class="hover">
                        <a href="<?php echo $location; ?>details/index/<?php echo $web['id']; ?>">
                           <h4><?php echo $web['name']; ?> </h4>
                        </a>
                        <a class="light" href="<?php echo $location; ?>asset/uploads/<?php echo $web['image']; ?>"><i class="fa fa-expand"></i></a>
                     </div>
                  </div>
               </div>

            <?php } ?>
              
            </div>


  
            
      </div>
      </section>
      <!--================Footer Area =================-->

      
      <button id="load" type="button">Click Me!</button>

<?php require_once 'app/views/footer.php'; ?>

