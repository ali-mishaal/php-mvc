<?php Session::start(); ?> 

<?php require_once 'app/views/dashboard/headers.php'; ?>
<?php require_once 'app/views/dashboard/sidebar.php'; ?>


<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Websites</h3>
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
                      <th>name</th>
                      <th>category</th>
                      <th>image</th>
                      <th>description</th>
                      <th>company</th>
                      <th>owner</th>
                      <th>delivery date</th>
                      <th>country</th>
                      <th>technical</th>
                      <th>url</th>
                      <th>duration</th>
                      <th>images</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data['name'] as $cat){ ?>
                    <tr>
                      <td><?php echo $cat['id'];  ?></td>
                      <td><?php echo $cat['name']; ?></td>
                      <td><?php echo $cat['category'];  ?></td>
                      <td><img src="<?php echo $location ?>/asset/uploads/<?php echo $cat['image']; ?>" style="width:150px"></td>
                      <td><?php echo $cat['description'];  ?></td>
                      <td><?php echo $cat['company']; ?></td>
                      <td><?php echo $cat['owner'];  ?></td>
                      <td><?php echo $cat['op_date']; ?></td>
                      <td><?php echo $cat['country']; ?></td>
                      <td>
                        <?php 

                             $tech = explode(',', $cat['technical']) ; 
                             for($i=0 ; $i < count($tech) ; $i++)
                             {
                                echo $tech[$i];
                                if($i != count($tech)-1 )
                                {
                                  echo " - ";
                                }
                             }

                         ?>
                           
                      </td>
                      <td><?php echo $cat['url']; ?></td>
                      <td><?php echo $cat['duration']; ?></td>
                      <td>
              
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $cat['id'];  ?>" style="background-color: #4ECDC4">
                              show images
                            </button>
                            <!-- Modal -->
                          <div class="modal fade" id="exampleModal<?php echo $cat['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">images</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                   <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                          <th>id</th>
                                          <th>image</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($data['image'] as $img){ 
                                            if($cat['id'] == $img['web_id']){?>
                                            <tr>
                                              <td><?php echo $img['id'];  ?></td>
                                              <td><img src="<?php echo $location ?>/asset/uploads/<?php echo $img['image']; ?>" style="width:50px"></td>
                                            </tr>
                                    <?php }} ?>
                                    </tbody>
                                   </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          
                      </td>
                      <td>
                         <a href="<?php  echo $location; ?>websites/edit/<?php echo $cat['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                         <a href="<?php  echo $location; ?>websites/delete/<?php echo $cat['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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