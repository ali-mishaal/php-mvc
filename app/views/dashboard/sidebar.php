<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
          <h5 class="centered"></h5>
          <li class="mt">
            <a class="active" href="<?php echo $location; ?>dashboard">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Category</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo $location; ?>category/create">Add Category</a></li>
              <li><a href="<?php echo $location; ?>category/index">View Categories</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Websites</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo $location; ?>websites/create">Add Website</a></li>
              <li><a href="<?php echo $location; ?>websites/index">View Websites</a></li>
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Images</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo $location; ?>wimg/create">Add Image</a></li>
              <li><a href="<?php echo $location; ?>wimg/index">View Images</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->