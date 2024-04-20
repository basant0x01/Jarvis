<?php include "header.php"; ?>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-icon-card card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <img src="./img/Group 1381.png" alt="building" />
                    </div>
                    <?php

                      $query = "SELECT COUNT(*) AS total_projects FROM my_projects";
                      $result = mysqli_query($con, $query);
                      if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $total_projects = $row['total_projects'];
                      } else {
                            $total_projects = 0;
                        }
                    ?>

                    <p class="card-category">Total Projects</p>
                    <h3 class="card-title"><?php echo $total_projects; ?></h3>
                    </div>

                    <?php

                    ?>

                  <div class="card-body">
                    <div class="stats">
                      <div class="progress" style="height: 4px">
                        <div
                          class="progress-bar bg-danger"
                          role="progressbar"
                          style="width: 65%"
                          aria-valuenow="65"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-icon-card card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <img src="./img/Group 1382.png" alt="building" />
                    </div>

                      <?php

                      $query = "SELECT program_subdomains, program_manual_subdomains FROM my_projects";
                      $result = mysqli_query($con, $query);

                      $subdomains = '';

                      if ($result) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              $subdomain_string = $row['program_subdomains'] . ',' . $row['program_manual_subdomains'];
                              $subdomain_array = explode(",", $subdomain_string); // Assuming subdomains are separated by commas
                              foreach ($subdomain_array as $subdomain) {
                                  // Trim to remove leading/trailing whitespaces
                                  $subdomains .= trim($subdomain) . "\n";
                              }
                          }
                      }

                      $total_subdomains = count(explode("\n", trim($subdomains)));

                      ?>


                      <p class="card-category">Total Subdomains</p>
                      <h3 class="card-title"><?php echo $total_subdomains; ?></h3>
                      <a href="view-total-subdomains.php">View Details</a>
                      
                  </div>
                  <div class="card-body">
                    <div class="stats">
                      <div class="progress" style="height: 4px">
                        <div
                          class="progress-bar bg-success"
                          role="progressbar"
                          style="width: 65%"
                          aria-valuenow="65"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-icon-card card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <img src="./img/Group 1324.png" alt="building" />
                    </div>
                    <p class="card-category">N/A</p>
                    <h3 class="card-title">N/A</h3>
                    <a href="">N/A</a>
                  </div>
                  <div class="card-body">
                    <div class="stats">
                      <div class="progress" style="height: 4px">
                        <div
                          class="progress-bar bg-danger"
                          role="progressbar"
                          style="width: 65%"
                          aria-valuenow="65"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-icon-card card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <img src="./img/Group 1383.png" alt="building" />
                    </div>
                    <p class="card-category">N/A</p>
                    <h3 class="card-title">N/A</h3>
                  </div>
                  <div class="card-body">
                    <div class="stats">
                      <div class="progress" style="height: 4px">
                        <div
                          class="progress-bar bg-info"
                          role="progressbar"
                          style="width: 65%"
                          aria-valuenow="65"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card custom-user-info-card">
                  <div class="card-header card-header-danger">
                    <div class="float-left">
                      <a
                        ><span class="material-icons custom-material-icon">
                          person </span
                        ><span>My Projects</span></a
                      >
                    </div>
                    <div class="float-right">
                      <div class="user-profile-nav">

                        <!-- Add a search form -->

                        <div style="margin-top: 11px;margin-right: 40px;">
                          <form method="POST">
                              <input type="text" name="search_query" placeholder=" Src: Program/Subdomain">
                              <button type="submit" name="search">Search</button><br>
                          </form>
                        </div>


                        <div class="btn-add-group">
                          <button type="submit" class="btn btn-white">
                            <span class="material-icons add-icon">
                              add_box
                            </span>
                            <a href="create-project.php">Add New Project</a>
                          </button>
                          <button type="submit" class="btn btn-white">
                            <span class="material-icons add-icon">
                              picture_as_pdf
                            </span>
                            PDF
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="card-body custom-user-table-data">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-danger">
                          <th style="width: 5%">Photo</th>
                          <th style="width: 20%">Program Name</th>
                          <th style="width: 22%">Platform</th>
                          <th style="width: 10%">Visibility</th>
                          <th style="width: 20%">Program Type</th>
                          <th style="width: 10%" class="text-center">Action</th>
                        </thead>

                        <?php
                            // Check if search form is submitted
                            if(isset($_POST['search'])) {
                                $search_query = $_POST['search_query'];
                                // Modify the SQL query to include search filter for both program name and subdomain
                                $query = "SELECT * FROM my_projects WHERE program_name LIKE '%$search_query%' OR program_subdomains LIKE '%$search_query%'";
                            } else {
                                // Default query to fetch all projects
                                $query = "SELECT * FROM my_projects";
                            }
                            
                            $result = mysqli_query($con, $query);
                        ?>

                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><img class="circle" src="./img/19.png" alt="user"></td>
                                        <td><a href="dev-view-project.php?program_id=<?php echo $row['program_id']; ?>"><?php echo $row['program_name']; ?></a></td>
                                        <td><?php echo $row['program_platform']; ?></td>
                                        <td><?php echo $row['program_visiblity']; ?></td>
                                        <td><?php echo $row['program_type']; ?></td>
                                        <td class="text-primary">
                                            <div class="action-btn-group float-right d-flex">
                                                <button type="button" class="custom-action-btn btn btn-primary mr-2 edit-btn">
                                                    <a style="color: white;" href="edit-project.php?program_id=<?php echo $row['program_id']; ?>">Edit</a>
                                                </button>
                                                <button type="button" class="custom-action-btn btn btn-danger delete-btn">
                                                    <a style="color: white;" href="delete-project.php?program_id=<?php echo $row['program_id']; ?>">Del</a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="./js/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="./js/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="./js/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
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
