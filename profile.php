<?php
/**
Open source CAD system for RolePlaying Communities.
Copyright (C) 2017 Shane Gill

This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 theasf
    {
        $profileUpdate = $_SESSION['profileUpdate'];
        unset($_SESSION['profileUpdate']);
    }asdf
            </div>
            <!-- /menu profile quick info -->
asdfdden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Go to Dashboard" href="dashboard.php">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="./actions/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>asf
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>CAD User Profile</h3>
              </div>
              <!-- ./ title_left -->
            </div>
            <!-- ./ page-title -->

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- ./ x_title -->
                  <div class="x_content">
                  <?php echo $profileUpdate;?>
                  <form action="./actions/profileActions.php" method="post" class="form-horizontal">
                  <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" maxlength="255" value="<?php echo $name;?>" required>
                        </div>
                        <!-- ./ col-sm-10 -->
                    </div>
                    <!-- ./ form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" maxlength="255" value="<?php echo $_SESSION['email'];?>" required>
                            <span class="muted">Note: Your email is how you login, so make sure it's valid!</span>
                        </div>
                        <!-- ./ col-sm-10 -->
                    </div>
                    <!-- ./ form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10">
                            <input class="btn btn-primary" type="submit" name="reset_pw_btn" value="Reset" disabled/>
                        </div>
                        <!-- ./ col-sm-10 -->
                    </div>
                    <!-- ./ form-group -->
                    <!-- ./ form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Identifier:</label>
                        <div class="col-sm-10">
                            <input name="identifier" class="form-control" type="text" maxlength="255" value="<?php echo $_SESSION['identifier'];?>" required>
                        </div>
                        <!-- ./ col-sm-10 -->
                    </div>
                    <!-- ./ form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">My Rank:</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="my_rank" id="my_rank">
                              <?php getRanks();?>
                            </select>
                        </div>
                        <!-- ./ col-sm-10 -->
                    </div>
                    <!-- ./ form-group -->

                  <input name="update_profile_btn" type="submit" class="btn btn-primary btn-lg btn-block" value="Update" />
                  </fieldset>
                  </form>
                  </div>
                  <!-- ./ x_content -->
                </div>
                <!-- ./ x_panel -->
              </div>
              <!-- ./ col-md-12 col-sm-12 col-xs-12 -->
            </div>
            <!-- ./ row -->


          </div>
          <!-- "" -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php echo COMMUNITY_NAME;?> CAD System
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php include "../oc-includes/jquery-colsolidated.inc.php"; ?>
    <script>
    $(document).ready(function() {
      getMyRank("<?php echo $_SESSION['id'];?>");
    });
	</script>

    <script>

    </script>

    <!-- Custom Theme Scripts -->
    <script src="./js/custom.js"></script>
    <!-- openCad Script -->
    <script src="./js/openCad.js"></script>
  </body>
</html>
