

<?php require_once 'app/libs/path.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Gallery Dasboard</title>

  <!-- Favicons -->
  <link href="http://localhost/gallery/asset/backend/img/favicon.png" rel="icon">
  <link href="http://localhost/gallery/asset/backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="http://localhost/gallery/asset/backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="http://localhost/gallery/asset/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/gallery/asset/backend/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/gallery/asset/backend/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="http://localhost/gallery/asset/backend/css/style.css" rel="stylesheet">
  <link href="http://localhost/gallery/asset/backend/css/style-responsive.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
  <script src="http://localhost/gallery/asset/backend/lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo $location; ?>" class="logo"><b>Pioneer<span>Gallery</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
    
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <!-- <li><a class="logout" href="login.html">Logout</a></li> -->
        </ul>
      </div>
    </header>
    <!--header end-->