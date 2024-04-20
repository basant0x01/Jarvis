<?php include "header.php"; ?>

                    <?php

                        $program_id = $_GET['program_id'];

                        $query = "select * from my_projects where program_id=$program_id";
                        $result = mysqli_query($con,$query);

                        // Plateform | Program | <Subdomains> Search Trick
                           while($row = mysqli_fetch_assoc($result)){

                      ?>


        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-danger">
                    <div class="float-left">
                      <a
                        ><span
                          class="mr-2 custom-material-icon"
                          style="line-height: 4"
                        >
                          <img src="./img/Group 1380.png" /> </span
                        ><span>Update Project</span></a
                      >
                    </div>
                  </div>
                  <div class="card-body">


                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Program Name</label><br>
                            <input value="<?php echo $row['program_name']; ?>" name="program_name" type="text" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">

                            <label class="bmd-label-floating">Select Platform</label><hr>
                             <select value="<?php echo $row['program_platform']; ?>" style="width: 250px;text-align: center;" name="program_platform" id="program_platform">

                                <option style="background-color: green;color: white;" value="<?php echo $row['program_platform']; ?>"><?php echo $row['program_platform']; ?></option>
                              </select> 

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Select Visiblity</label><hr>
                              <select value="<?php echo $row['program_visiblity']; ?>" style="width: 250px;text-align: center;" name="program_visiblity" id="program_visiblity">
                                <option style="background-color: green;color: white;" value="<?php echo $row['program_visiblity']; ?>"><?php echo $row['program_visiblity']; ?></option>
                              </select> 

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating"
                              >Select Program Type</label><hr>
                              <select value="<?php echo $row['program_type']; ?>" style="width: 250px;text-align: center;" name="program_type" id="program_type">
                                <option style="background-color: green;color: white;" value="<?php echo $row['program_type']; ?>"><?php echo $row['program_type']; ?></option>
                              </select> 
                          </div>

                        </div>

                      </div>

                  
                    <p><label for="program_domains"></label></p>
                    <textarea id="program_domains" name="program_domains" rows="4" cols="50" placeholder=" Paste your domains"><?php echo $row['program_domains']; ?></textarea><br>
              
                
                    <p><label for="program_subdomains"></label></p>
                    <textarea id="program_subdomains" name="program_subdomains" rows="4" cols="50" placeholder=" Paste your subdomains"><?php echo $row['program_subdomains']; ?></textarea><br>

                    <p><label for="program_subdomains"></label></p>
                    <textarea id="program_manual_subdomains" name="program_manual_subdomains" rows="4" cols="50" placeholder=" Add your manual subdomains"><?php echo $row['program_manual_subdomains']; ?></textarea><br>
         

                      <div class="row mt-5">
                        <div class="col-md-6">
                          <div class="form-group profile-upload">
                            <div class="file-field">
                              <div class="mb-4">
                                <img
                                  src="./img/Group 1380.png"
                                  class="
                                    rounded-circle
                                    z-depth-1-half
                                    avatar-pic
                                  "
                                  alt="example placeholder avatar"
                                />
                              </div>
                              <div class="d-flex justify-content-left">
                                <div
                                  class="btn-mdb-color btn-rounded float-left"
                                >
                                  <span class="ml-3">Add photo</span>
                                  <input type="file" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 profile-save-btn">
                          <button name="create_project" type="create_project" class="btn btn-primary">
                            Update Project
                          </button>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </form>

                  </div>
                </div>
              </div>

               <?php

                  if (isset($_POST['create_project'])) {

                  $program_id = $_GET['program_id'];
                  $program_name = $_POST['program_name'];
                  $program_platform = $_POST['program_platform'];
                  $program_visiblity = $_POST['program_visiblity'];
                  $program_type = $_POST['program_type'];
                  $program_domains = $_POST['program_domains'];
                  $program_subdomains = $_POST['program_subdomains'];
                  $program_manual_subdomains = $_POST['program_manual_subdomains'];

                  $query = "UPDATE my_projects SET program_id='$program_id', program_name='$program_name', program_platform='$program_platform', program_visiblity='$program_visiblity', program_type='$program_type', program_domains='$program_domains', program_subdomains='$program_subdomains', program_manual_subdomains='$program_manual_subdomains' WHERE program_id=$program_id";

                  if (mysqli_query($con, $query)) {

                    ?>

                    <script type="text/javascript">alert("Project Successfully Updated")</script>
                    <script type="text/javascript">
                     window.location.href = "http://localhost/lazydb/admin/dashboard.php";
                     </script>

                    <?php

                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                  }

                  mysqli_close($con);

              }

            ?> 

              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="javascript:;">
                      <img class="img" src="./img/17.png" />
                    </a>
                  </div>
                  <div class="card-body">
                    <h6 class="card-category text-gray">
                      Basant Karki
                    </h6>
                    <h4 class="card-title"><?php echo $_SESSION['username']; ?></h4>
                    <span class="card-description pt-3">
                      <p><?php echo $_SESSION['user_email']; ?></p>
                      <p>Lorem Ipsum</p>
                    </span>
                  </div>
                </div>
              </div>
            </div>

                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fixed-plugin"></div>

<?php

}

?>

    <!--   Core JS Files   -->
    <script src="./js/vendor/jquery-3.2.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap-material-design.min.js"></script>
    <script src="./js/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="./js/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="./js/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="./js/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="./js/jquery.bootstrap-wizard.js"></script>
    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="./js/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="./js/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="./js/jquery.dataTables.min.js"></script>
    <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="./js/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="./js/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="./js/fullcalendar.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="./js/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="./js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./js/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="./js/material-dashboard.min.js?v=2.1.2"
      type="text/javascript"
    ></script>
    <script src="./js/main.js"></script>

    <script>
      $(document).ready(function () {
        $().ready(function () {
          $sidebar = $(".sidebar");

          $sidebar_img_container = $sidebar.find(".sidebar-background");

          $full_page = $(".full-page");

          $sidebar_responsive = $("body > .navbar-collapse");

          window_width = $(window).width();

          fixed_plugin_open = $(
            ".sidebar .sidebar-wrapper .nav li.active a p"
          ).html();

          if (window_width > 767 && fixed_plugin_open == "Dashboard") {
            if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
              $(".fixed-plugin .dropdown").addClass("open");
            }
          }

          $(".fixed-plugin a").click(function (event) {
            if ($(this).hasClass("switch-trigger")) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $(".fixed-plugin .active-color span").click(function () {
            $full_page_background = $(".full-page-background");

            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-color", new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr("filter-color", new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr("data-color", new_color);
            }
          });

          $(".fixed-plugin .background-color .badge").click(function () {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("background-color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-background-color", new_color);
            }
          });

          $(".fixed-plugin .img-holder").click(function () {
            $full_page_background = $(".full-page-background");

            $(this).parent("li").siblings().removeClass("active");
            $(this).parent("li").addClass("active");

            var new_image = $(this).find("img").attr("src");

            if (
              $sidebar_img_container.length != 0 &&
              $(".switch-sidebar-image input:checked").length != 0
            ) {
              $sidebar_img_container.fadeOut("fast", function () {
                $sidebar_img_container.css(
                  "background-image",
                  'url("' + new_image + '")'
                );
                $sidebar_img_container.fadeIn("fast");
              });
            }

            if (
              $full_page_background.length != 0 &&
              $(".switch-sidebar-image input:checked").length != 0
            ) {
              var new_image_full_page = $(".fixed-plugin li.active .img-holder")
                .find("img")
                .data("src");

              $full_page_background.fadeOut("fast", function () {
                $full_page_background.css(
                  "background-image",
                  'url("' + new_image_full_page + '")'
                );
                $full_page_background.fadeIn("fast");
              });
            }

            if ($(".switch-sidebar-image input:checked").length == 0) {
              var new_image = $(".fixed-plugin li.active .img-holder")
                .find("img")
                .attr("src");
              var new_image_full_page = $(".fixed-plugin li.active .img-holder")
                .find("img")
                .data("src");

              $sidebar_img_container.css(
                "background-image",
                'url("' + new_image + '")'
              );
              $full_page_background.css(
                "background-image",
                'url("' + new_image_full_page + '")'
              );
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css(
                "background-image",
                'url("' + new_image + '")'
              );
            }
          });

          $(".switch-sidebar-image input").change(function () {
            $full_page_background = $(".full-page-background");

            $input = $(this);

            if ($input.is(":checked")) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn("fast");
                $sidebar.attr("data-image", "#");
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn("fast");
                $full_page.attr("data-image", "#");
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr("data-image");
                $sidebar_img_container.fadeOut("fast");
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr("data-image", "#");
                $full_page_background.fadeOut("fast");
              }

              background_image = false;
            }
          });

          $(".switch-sidebar-mini input").change(function () {
            $body = $("body");

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $("body").removeClass("sidebar-mini");
              md.misc.sidebar_mini_active = false;

              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
            } else {
              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
                "destroy"
              );

              setTimeout(function () {
                $("body").addClass("sidebar-mini");

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

            var simulateWindowResize = setInterval(function () {
              window.dispatchEvent(new Event("resize"));
            }, 180);

            setTimeout(function () {
              clearInterval(simulateWindowResize);
            }, 1000);
          });
        });
      });
    </script>
  </body>
</html>
