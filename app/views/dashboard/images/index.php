<?php Session::start(); ?> 

<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>


<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Images</h3>
        <?php if (Session::get('suc') != null ) { ?>
            
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>success!</strong> <?php echo Session::get('suc'); Session::set('suc' , '');?>
            </div>
            
       <?php } ?>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <section id="unseen">
                  
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>id</th>
                       <th>web</th>
                      <th>image</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data['name'] as $cat){ ?>
                    <tr>
                      <td><?php echo $cat['id'];  ?></td>
                      <td><?php echo $cat['web']; ?></td>
                      <td><img src="<?php echo $location ?>/asset/uploads/<?php echo $cat['image']; ?>" style="width:150px"></td>
                      <td>
                         <a href="<?php  echo $location; ?>wimg/delete/<?php echo $cat['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
      </section>
      <!-- /wrapper -->
    </section>


<?php require_once 'app/views/dashboard/footer.php'; ?>