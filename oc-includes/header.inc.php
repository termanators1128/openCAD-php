<?php
if(basename($_SERVER['PHP_SELF']) == 'admin.php') {
  $pageName = "OpenCAD Admin Dashboard";
} else  if(basename($_SERVER['PHP_SELF']) == 'callhistory.php') {
  $pageName = "Call History";
} else  if(basename($_SERVER['PHP_SELF']) == 'ncicAdmin.php') {
  $pageName = "Civillian Profile Manager (CPM)";
} else  if(basename($_SERVER['PHP_SELF']) == 'permissionManagmeent.php') {
  $pageName = "Permissions Management";
} else  if(basename($_SERVER['PHP_SELF']) == 'userManagement.php') {
  $pageName = "User Management";
} else  if(basename($_SERVER['PHP_SELF']) == 'cad.php') {
  $pageName = "Computer Aided Dispatch (CAD)";
} else  if(basename($_SERVER['PHP_SELF']) == 'mdt.php') {
  $pageName = "Mobile Data Terminal (MDT)";
} else  if(basename($_SERVER['PHP_SELF']) == 'civilian.php') {
  $pageName = "Civillian Central";
} else  if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
  $pageName = "OpenCAD Dashboard";
} else {
  $pageName = "OpenCAD";
}

?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<base href="<?php echo BASE_URL; ?>" target="_blank">-->
  <title><?php echo $pageName." | ".COMMUNITY_NAME;?></title>
  <link rel="icon" href="<?php echo BASE_URL; ?>/images/favicon.ico" />

  <!-- Bootstrap -->
  <link href="<?php echo BASE_URL; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo BASE_URL; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo BASE_URL; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"

  <!-- Custom Theme Style -->
  <link href="<?php echo BASE_URL; ?>/css/custom.css" rel="stylesheet">

  <style>
  #cadWelcome {
  height:20px;
  width:50px;
  margin: 50%px 50%px;
  position:relative;
  top:90%;
  left:45%;
  text-align:center;
  }
  </style>
</head>
