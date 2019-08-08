<?php Session::start(); ?>
<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>

<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Category</h3>

        <?php if (Session::get('err') != null ) { ?>
        
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong>Warning!</strong> <?php echo Session::get('err'); Session::set('err' , '');?>
        </div>
        
      <?php } ?>
        
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?php echo $location; ?>category/update/<?php echo $data['name']['id']?>">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="" value="<?php echo $data['name']['name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
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