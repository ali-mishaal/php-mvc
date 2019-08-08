  <!--================Footer Area =================-->
  <footer class="footer_area p_120">
         <div class="over_lay"></div>
         <div class="container">
            <div class="row footer_inner">
               <div class="col-lg-5 col-sm-6">
                  <aside class="f_widget ab_widget">
                     <div class="f_title">
                        <h3>About Me</h3>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore </p>
                     <p>
                        Copyright &copy; All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Pioneers-solution</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </p>
                  </aside>
               </div>
               <div class="col-lg-5 col-sm-6">
                  <aside class="f_widget news_widget">
                     <div class="f_title">
                        <h3>Newsletter</h3>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore </p>
                     <p>Stay updated with our latest trends</p>
                     <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                           <div class="input-group d-flex flex-row">
                              <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                              <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>        
                           </div>
                           <div class="mt-10 info"></div>
                        </form>
                     </div>
                  </aside>
               </div>
               <div class="col-lg-2">
                  <aside class="f_widget social_widget">
                     <div class="f_title">
                        <h3>Follow Me</h3>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elite Let us be social</p>
                     <ul class="list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </footer>
      <!--================End Footer Area =================-->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo $location; ?>asset/js/jquery-3.2.1.min.js"></script>
      <script src="<?php echo $location; ?>asset/js/popper.js"></script>
      <script src="<?php echo $location; ?>asset/js/bootstrap.min.js"></script>
      <script src="<?php echo $location; ?>asset/js/stellar.js"></script>
      <script src="<?php echo $location; ?>asset/vendors/lightbox/simpleLightbox.min.js"></script>
      <script src="<?php echo $location; ?>asset/vendors/nice-select/js/jquery.nice-select.min.js"></script>
      <script src="<?php echo $location; ?>asset/vendors/isotope/imagesloaded.pkgd.min.js"></script>
      <script src="<?php echo $location; ?>asset/vendors/isotope/isotope-min.js"></script>
      <script src="<?php echo $location; ?>asset/vendors/owl-carousel/owl.carousel.min.js"></script>
      <script src="<?php echo $location; ?>asset/js/jquery.ajaxchimp.min.js"></script>
      <script src="<?php echo $location; ?>asset/js/mail-script.js"></script>
      <script src="<?php echo $location; ?>asset/js/theme.js"></script>

      <script>
           $(function(){
              var length=0;
              $("#load").click(function(){
              
                   
                   $.ajax({

                      type:'get',
                      url:'/gallery/home/readmore',
                      data:{length:length},
                      success:function(resp){
                          var obj = $.parseJSON(resp);
                          console.log(obj[0]);
                         // var item=' <br><div   class="gallery_f_inner row imageGallery1">';
                         // var parent = document.getElementById('loaded');
                         var item="";
                        
                          for (var i = 0; i < obj.length; i++) 
                          {
                            
                           item+=' <div class="lll col-lg-3 col-md-4 col-sm-6" >';
                           item+='<div class="h_gallery_item">';
                           item+='<img src="<?php echo $location; ?>asset/uploads/'+obj[i]['image']+'" alt="">';
                           item+='<div class="hover">';
                           item+='<a href="<?php echo $location; ?>details/index/'+obj[i]['id']+'">';
                           item+='<h4>'+obj[i]['name']+' </h4></a>';
                           item+='<a class="light" href="<?php echo $location; ?>asset/uploads/'+obj[i]['image']+'"><i class="fa fa-expand"></i></a>';
                           item+='</div> </div></div>';
                           
                          }
                          item+='</div>';
                         $('#loaded').append(item);
                         
                         $('#big').removeClass('container');
                         $('#big').removeClass('box_1620');
                         $('#big').addClass('container');
                         $('#big').addClass('box_1620');


                         
                         

                        
                            
                          length=length+5;
                      },error:function(){
                         alert('error');
                      }

                 });
            
              });
             
           });
      </script>
      
         
   </body>
</html>