<?php

/**
Open source CAD system for RolePlaying Communities.
Copyright (C) 2017 Shane Gill
asdfasdfasdf
This program comes with ABSOLUTELY NO WARRANTY; Use at your own risk.
**/

    require("./oc-functions.php");
    session_start();
    // TODO: Verify user has permission to be on this page

    if (empty($_SESSION['logged_in']))
    {
        //header('Location: /index.php');
        die("Not logged in");
    }
    else
    {
      $name = $_SESSION['name'];
    }

    include("./actions/api.php");
    setUnitActive("2");

?>

<!DOCTYPE html>
<html lang="en">
  <?php include "./oc-includes/header.inc.php"; ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="javascript:void(0)" class="site_title"><i class="fa fa-tachometer"></i> <span>Responder</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo get_avatar() ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name;?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li class="active"><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: block;">
                      <li class="current-page"><a href="javascript:void(0)">Dashboard</a></li>
                    </ul>
                  </li>
                  <!--
                  <li><a><i class="fa fa-external-link"></i> Links <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="https://goo.gl/forms/rEJOoJvIlCM5svSo1" target="_blank">Police PAL</a></li>
                      <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdDd1zZGTqUUuGQYuHzmz3TAIWb49y3BDFr8GwRbisLnwiRGg/viewform" target="_blank">Highway PAL</a></li>
                      <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSd26EN4XdgKhbZBEJ16B8cx5LqTNxguh4O3wNggRqqzKOmXzg/viewform" target="_blank">Sheriff PAL</a></li>
                      <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScXgKDn0deB7zgnmBvDRJ7KllHLiQdmahvgQbphxZuNhU6h2g/viewform" target="_blank">Fire PAL</a></li>
                      <li><a href="https://puu.sh/tRzTt/330b12ab3c.jpg" target="_blank">GTA 5 DOJRP Map</a></li>
                    </ul>
                  </li>
                  -->
                  <li><a><i class="fa fa-hashtag"></i> Callsign <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a id="changeCallsign" class="btn-link" name="changeCallsign" data-toggle="modal" data-target="#callsign">Change Callsign</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- ./ menu_section -->
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            <!--  —— Left in for user settings. To be introduced later. Probably after RC1. ——
            <a data-toggle="tooltip" data-placement="top">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>-->
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Go to Dashboard" href="dashboard.php">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="./actions/logout.php?responder=<?php echo $_SESSION['identifier'];?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo get_avatar() ?>" alt=""><?php echo $_SESSION['name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="./profile.php">My Profile</a></li>
                    <li><a href="./actions/logout.php?responder=<?php echo $_SESSION['identifier'];?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MDT Console</h3>
              </div>
              <!-- ./ title_left -->
            </div>
            <!-- ./ page-title -->

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Active Calls</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- ./ x_title -->
                  <div class="x_content">
                      <div id="live_calls">

                      </div>
                  </div>
                  <!-- ./ x_content -->
                </div>
                <!-- ./ x_panel -->
              </div>
              <!-- ./ col-md-12 col-sm-12 col-xs-12 -->
            </div>
            <!-- ./ row -->

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Status</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- ./ x_title -->
                  <div class="x_content">
                     <form id="myStatusForm">
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-2 control-label">My Identifier</label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" name="identifier" class="form-control" value="<?php echo $_SESSION['identifier'];?>" readonly />
                            </div>
                            <!-- ./ col-sm-9 -->
                        </div>
                        <!-- ./ form-group -->
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-2 control-label">My Callsign</label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" name="callsign" class="form-control" id="callsign1" value="<?php echo $_SESSION['identifier'];?>" readonly />
                            </div>
                            <!-- ./ col-sm-9 -->
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-2 control-label">My Status</label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input type="text" name="status" id="status" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-2 control-label">Change Status</label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <select name="statusSelect" class="form-control selectpicker <?php echo $_SESSION['identifier'];?>" id="statusSelect" onchange="responderChangeStatus(this);" title="Select a Status">
                                  <option value="10-8">10-8/Available</option>
                                  <option value="10-6">10-6/Busy</option>
                                  <option value="10-5">10-5/Meal Break</option>
                                  <option value="sig11">Signal 11</option>
                                </select>
                            </div>
                            <!-- ./ col-sm-9 -->
                        </div>
                        <!-- ./ form-group -->
                     </form>
                  </div>
                  <!-- ./ x_content -->
                </div>
                <!-- ./ x_panel -->
              </div>
              <!-- ./ col-md-6 col-sm-6 col-xs-6 -->

              <?php
              if (isset($_GET['fire']))
              {

                if ($_GET['fire'] == "true")
                {
                  //End the above row
                  echo '
                  </div>
                  <!-- ./ row -->

                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Fire PAL</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <!-- ./ x_title -->
                        <div class="x_content">
                          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScXgKDn0deB7zgnmBvDRJ7KllHLiQdmahvgQbphxZuNhU6h2g/viewform" height="400px" width="100%"></iframe>
                        </div>
                        <!-- ./ x_content -->
                      </div>
                      <!-- ./ x_panel -->
                    </div>
                    <!-- ./ col-md-4 col-sm-4 col-xs-4 -->
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Incident Report</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <!-- ./ x_title -->
                        <div class="x_content">
                          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeusONacJqMrKBoBxzhdn4Q53f7QjPwlDehjCmKPGLQgGVsKg/viewform?c=0&w=1" height="400px" width="100%"></iframe>
                        </div>
                        <!-- ./ x_content -->
                      </div>
                      <!-- ./ x_panel -->
                    </div>
                    <!-- ./ col-md-4 col-sm-4 col-xs-4 -->
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>ePCR</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <!-- ./ x_title -->
                        <div class="x_content">
                          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeD7GBmb70LYfM7PLOOPddnyNrfYoO-m5NQwpTX1bSSn-9olQ/viewform?c=0&w=1" height="400px" width="100%"></iframe>
                        </div>
                        <!-- ./ x_content -->
                      </div>
                      <!-- ./ x_panel -->
                    </div>
                    <!-- ./ col-md-4 col-sm-4 col-xs-4 -->
                  </div>
                  <!-- ./ row -->
                  ';
                }
              }
              else
              {

               /*

                    SG - Commenting out for now since citation creation isn't going to be a thing for LEOs

               echo '
               <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Citation Creator</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- ./ x_title -->
                  <div class="x_content">
                    <div class="alert alert-info" style="text-align:center;"><span>Citations need to be approved by staff!</span></div>

                    <form id="newCitationForm">
                      <div class="row">
                        <div class="form-group">
                            <select class="form-control selectpicker civilian" data-live-search="true" name="civilian" id="civilian" title="Select Civilian" disabled>
                              <?php getCivilianNamesOption();?>
                            </select>
                        </div>
                        <!-- ./ form-group -->
                      </div>
                      <!-- ./ row -->
                      <div class="row">
                        <div class="form-group">
                          <select class="form-control selectpicker citation" data-live-search="true" name="citation[]" id="citation[]" multiple data-max-options="2" title="Select Citations (Limit 2)" disabled>
                            <?php getCitations();?>
                          </select>
                        </div>
                        <!-- ./ form-group -->
                      </div>
                      <!-- ./ row -->
                  </div>
                  <!-- ./ x_content -->
                  <br/>
                  <div class="x_footer">
                    <button type="submit" class="btn btn-primary pull-right" id="newCitationSubmit" disabled>Submit Citation</button>
                  </div>
                  <!-- ./ x_footer -->
                  </form>
                </div>
                <!-- ./ x_panel -->
              </div>
              <!-- ./ col-md-6 col-sm-6 col-xs-6 -->


               '; */

              getMyCall();


              }
              ?>



            </div>
            <!-- ./ row -->
          </div>
          <!-- "" -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php echo COMMUNITY_NAME?> CAD System
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- modals -->
    <!-- Callsign Modal -->
    <div class="modal fade" id="callsign" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="closeCallsign" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Enter Your Callsign for This Patrol</h4>
          </div>
          <!-- ./ modal-header -->
          <div class="modal-body">
            <form class="callsignForm" id="callsignForm">
            <div class="form-group">
              <label class="col-md-2 control-label">Callsign</label>
              <div class="col-md-10">
                <input type="text" id="callsign" name="callsign" class="form-control" />
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <!-- ./ form-group -->
          </div>
          <!-- ./ modal-body -->
          <div class="modal-footer">
            <input type="submit" name="setCallsign" class="btn btn-primary" value="Set Callsign"/>
          </div>
          <!-- ./ modal-footer -->
          </form>
        </div>
        <!-- ./ modal-content -->
      </div>
      <!-- ./ modal-dialog modal-md -->
    </div>
    <!-- ./ modal fade -->

    <!-- Call Details Modal -->
    <div class="modal fade" id="callDetails" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" id="closecallDetails"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Call Details</h4>
          </div>
          <!-- ./ modal-header -->
          <div class="modal-body">
          <form class="callDetailsForm" id="callDetailsForm">
            <div class="form-group">
              <label class="col-lg-2 control-label">Incident ID</label>
              <div class="col-lg-10">
                <input type="text" id="call_id_det" name="call_id_det" class="form-control" disabled>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Incident Type</label>
              <div class="col-lg-10">
                <input type="text" id="call_type_det" name="call_type_det" class="form-control" disabled>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Street 1</label>
              <div class="col-lg-10">
                <input type="text" id="call_street1_det" name="call_street1_det" class="form-control" disabled>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Street 2</label>
              <div class="col-lg-10">
                <input type="text" id="call_street2_det" name="call_street2_det" class="form-control" disabled>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Street 3</label>
              <div class="col-lg-10">
                <input type="text" id="call_street3_det" name="call_street3_det" class="form-control" disabled>
              </div>
              <!-- ./ col-sm-9 -->
            </div>

            <div class="clearfix">
            <br/><br/><br/><br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Narrative</label>
              <div class="col-lg-10">
                <div name="call_narrative" id="call_narrative" contenteditable="false" style="background-color: #eee; opacity: 1; border: 1px solid #ccc; padding: 6px 12px; font-size: 14px;"></div>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
            <div class="form-group">
              <label class="col-lg-2 control-label">Add Narrative</label>
              <div class="col-lg-10">
                <textarea name="narrative_add" id="narrative_add" class="form-control" style="text-transform:uppercase" rows="2" required></textarea>
              </div>
              <!-- ./ col-sm-9 -->
            </div>
            <br/>
            <!-- ./ form-group -->
          </div>
          <!-- ./ modal-body -->
          <br/>
          <div class="modal-footer">
            <input type="submit" id="addCallNarrative" class="btn btn-primary pull-left" value="Add Narrative" />
            <button id="closeDetailsModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          <!-- ./ modal-footer -->
          </form>
        </div>
        <!-- ./ modal-content -->
      </div>
      <!-- ./ modal-dialog modal-lg -->
    </div>
    <!-- ./ modal fade bs-example-modal-lg -->

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="./vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="./vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- Bootstrap Select -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- PNotify -->
    <script src="./vendors/pnotify/dist/pnotify.js"></script>
    <script src="./vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="./vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- AUDIO TONES -->
    <audio id="recurringToneAudio" src="./sounds/priority.mp3" preload="auto"></audio>
    <audio id="priorityToneAudio" src="./sounds/Priority_Traffic_Alert.mp3" preload="auto"></audio>
    <script>
      var vid = document.getElementById("recurringToneAudio");
      vid.volume = 0.3;
    </script>
    <?php
    if (isset($_GET['fire']))
    {

      if ($_GET['fire'] == "true")
      {
        echo '<audio id="newCallAudio" src="./sounds/Fire_Tones_Aligned.wav" preload="auto"></audio>';
      }
    }
    else
    {
      echo '<audio id="newCallAudio" src="./sounds/New_Dispatch.mp3" preload="auto"></audio>';
    }
    ?>


    <script>
    $(document).ready(function() {
        $(function() {
            $('#menu_toggle').click();
        });

        $('#callsign').modal('show');

        getCalls();
        getStatus();
        checkTones();

        $('#enroute_btn').click(function(evt) {
          console.log(evt);
          var callId = $('#call_id_det').val();

          $.ajax({
              type: "POST",
              url: "./actions/api.php",
              data: {
                  quickStatus: 'yes',
                  event: 'enroute',
                  callId: callId
              },
              success: function(response)
              {
                console.log(response);

                new PNotify({
                  title: 'Success',
                  text: 'Successfully updated narrative',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              },
              error : function(XMLHttpRequest, textStatus, errorThrown)
              {
                console.log("Error");
              }

            });
        });

    });
	</script>

  <script>
  // PNotify Stuff
  priorityNotification = new PNotify({
      title: 'Priority Traffic',
      text: 'Priority Traffic Only',
      type: 'error',
      hide: false,
      auto_display: false,
      styling: 'bootstrap3',
      buttons: {
          closer: false,
          sticker: false
      }
    });
    </script>

    <script>
    function getCalls() {
        $.ajax({
              type: "GET",
              url: "./actions/api.php",
              data: {
                  getCalls: 'yes',
                  responder: 'yes'
              },
              success: function(response)
              {
                $('#live_calls').html(response);
                setTimeout(getCalls, 5000);

              },
              error : function(XMLHttpRequest, textStatus, errorThrown)
              {
                console.log("Error");
              }

            });
      }
    </script>

    <script>
    $('#callsign').on('shown.bs.modal', function(e) {
        $('#callsign').find('input[name="callsign"]').val('<?php echo $_SESSION['identifier'];?>');
    });
    </script>

    <script>
    $(function() {
        $('.callsignForm').submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            $.ajax({
              type: "POST",
              url: "./actions/responderActions.php",
              data: {
                  updateCallsign: 'yes',
                  details: $("#"+this.id).serialize()
              },
              success: function(response)
              {
                console.log(response);

                if (response.match("^Duplicate"))
                {
                    var call2 = $('#callsign').find('input[name="callsign"]').val();
                    if (call2 == "<?php echo $_SESSION['identifier'];?>")
                    {
                        $('#closeCallsign').trigger('click');

                        new PNotify({
                            title: 'Success',
                            text: 'Successfully set your callsign',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                        return false;

                    }
                    else
                    {
                        $('#closeCallsign').trigger('click');

                        new PNotify({
                        title: 'Error',
                        text: 'That callsign is already in use',
                        type: 'error',
                        styling: 'bootstrap3'
                        });
                    }

                }

                if (response == "SUCCESS")
                {

                  $('#closeCallsign').trigger('click');

                  new PNotify({
                    title: 'Success',
                    text: 'Successfully set your callsign',
                    type: 'success',
                    styling: 'bootstrap3'
                  });

                  var call1 = $('#callsign').find('input[name="callsign"]').val();

                  $('#callsign1').val(call1);
                }

              },
              error : function(XMLHttpRequest, textStatus, errorThrown)
              {
                console.log("Error");
              }

            });

        });
      });
    </script>

    <script>
    function getStatus() {
    $.ajax({
        type: "GET",
        url: "./actions/responderActions.php",
        data: {
            getStatus: 'yes'
        },
        success: function(response)
        {
            console.log(response);
            if (response.match("^10-6/On"))
            {
                var currentStatus = $('#status').val();
                if (currentStatus == "10-6/On a Call")
                {
                    //Do nothing
                }
                else
                {
                    document.getElementById('newCallAudio').play();
                    new PNotify({
                        title: 'New Call!',
                        text: 'You\'ve been assigned a new call!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });

                    getMyCallDetails();
                }
            }
            else if (response.match("^<br>"))
            {
                console.log("LOGGED OUT");
                window.location.href = './actions/logout.php';

            }
            else
            {

            }

            $('#status').val(response);
            setTimeout(getStatus, 5000);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown)
        {
        console.log("Error");
        }

    });
    }

    function getMyCallDetails()
    {
      console.log("Got here");
    }
    </script>



    <!-- openCad Script -->
    <script src="./js/openCad.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="./js/custom.js"></script>

  </body>
</html>
