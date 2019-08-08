
<?php Session::start(); ?>
<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>

<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Create Website</h3>
        

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
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="store" enctype="multipart/form-data" name="myForm">

                  <input class=" form-control" id="cname" name="id" minlength="2" type="hidden" required="" readonly="" value="<?php echo $data['id'] ?>">

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Name (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>" ng-model="name">
                    </div>

                    <span style="color: #B71C1C" ng-show="myForm.name.$error.required">Website name is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">category (required)</label>
                    <div class="col-lg-6">
                     <select class=" form-control" id="cat" name="cat" required="">
                     <?php foreach($data['name'] as $cat){ ?>
                          <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                     <?php } ?>
                     </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">image (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="image" minlength="2" type="file" required="" ng-model="image">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.image.$error.required">image is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">company (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="company" minlength="2" type="text" required="" ng-model="company">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.company.$error.required">company is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">owner (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="owner" minlength="2" type="text" required="" ng-model="owner">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.owner.$error.required">owner is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">delivery date (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="date"  type="date" required="" ng-model="date">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.date.$error.required">date is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">country (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="country" minlength="2" type="text" required="" ng-model="country">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.country.$error.required">country is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">technical (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="tech" minlength="2" type="text" required="" placeholder="technical 1 , technical 2" ng-model="tech">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.tech.$error.required">technical is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">url (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="cname" name="url" minlength="2" type="text" required="" ng-model="url">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.url.$error.required">url is required.</span>
                  </div>

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">duration (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="duration" name="duration" minlength="2" type="text" required="" ng-model="duration">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.duration.$error.required">duration is required.</span>
                  </div>
                                    
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">description (required)</label>
                    <div class="col-lg-6">
                      <textarea class=" form-control" id="cname" name="desc" minlength="2" required="" ng-model="desc"></textarea>
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.desc.$error.required">description is required.</span>
                  </div>

                   <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">images (required)</label>
                    <div class="col-lg-6">
                      <input class=" form-control" type="file" id="cname" name="images[]" minlength="2" required="" multiple ng-model="images">
                    </div>
                    <span style="color: #B71C1C" ng-show="myForm.images[].$error.required">images is required.</span>
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