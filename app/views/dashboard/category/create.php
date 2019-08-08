<?php Session::start(); ?>
<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>

<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Create Category</h3>

        <?php if (Session::get('err') != null ) { ?>
        
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong>Warning!</strong> <?php echo Session::get('err'); Session::set('err' , '');?>
        </div>
        
        <?php } ?>
        
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12" ng-app="">
            
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="store" name="myForm">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-6">
                      <input ng-model="name" class=" form-control" id="cname" name="name" minlength="10" type="text" required="" >
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.name.$touched && myForm.name.$invalid">The name is required.</span>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" ng-disabled="myForm.name.$dirty && myForm.name.$invalid">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
</section>



<?php require_once 'app/views/dashboard/footer.php'; ?>