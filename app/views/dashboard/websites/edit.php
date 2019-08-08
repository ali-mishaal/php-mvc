<?php Session::start(); ?>
<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>

<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Website</h3>

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
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?php echo $location; ?>websites/update/<?php echo $data['name']['id']?>" enctype="multipart/form-data">
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="" value="<?php echo $data['name']['name']?>">
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">category (required)</label>
                    <div class="col-lg-6">
                     <select class=" form-control" id="cat" name="cat" required="">
                     <?php foreach($data['cat'] as $cat){ ?>
                          <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                     <?php } ?>
                     </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">image (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="image" minlength="2" type="file"  value="">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">company (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="company" minlength="2" type="text" required="" value="<?php echo $data['name']['company']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">owner (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="owner" minlength="2" type="text" required="" value="<?php echo $data['name']['owner']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">delivery date (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="date"  type="date" required="" value="<?php echo $data['name']['op_date']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">country (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="country" minlength="2" type="text" required="" value="<?php echo $data['name']['country']?>"> 
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">technical (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="tech" minlength="2" type="text" required="" placeholder="technical 1 , technical 2" value="<?php echo $data['name']['technical']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">url (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="url" minlength="2" type="text" required="" value="<?php echo $data['name']['url']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">duration (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="duration" name="duration" minlength="2" type="text" required="" value="<?php echo $data['name']['duration']?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">description (required)</label>
                    <div class="col-lg-6">
                      <textarea class=" form-control" id="cname" name="desc" minlength="2" required="">
                          <?php echo $data['name']['description']?>
                      </textarea>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">images (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" type="file" id="cname" name="images[]" minlength="2" multiple>
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