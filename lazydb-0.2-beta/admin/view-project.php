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

            <div class="row">
              <div class="col-md-12">
                <div class="card custom-user-info-card">
                  <div class="card-header card-header-danger">
                    <div class="float-left">
                      <a><span class="material-icons custom-material-icon"></span
                        ><span><?php echo $row['program_name']; ?></span></a>
                    </div>
                    <div class="float-right">
                      <div class="user-profile-nav">
                          <div >

                        </div>

                        <a style="color: purple;background-color: white;padding: 4px;border-radius: 5px;font-family: sans-serif;margin-left: 1em;" href="">
                          
                      <form id="scriptForm" method="post" action="">
                          <input type="hidden" name="run_script">
                          <button type="submit" name="insert_subdomains" onclick="changeStatus()">Start Engine</button>
                      </form>

                        </a>
                      </div>
                    </div>
                  </div>

                  <?php

                  $program_id = $_GET['program_id'];
                  $query = "SELECT program_subdomains, program_manual_subdomains FROM my_projects WHERE program_id = $program_id";
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


          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-icon-card card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                      <img src="./img/Group 1381.png" alt="building" />
                      </div>
                    <h4 class="card-title">Engine Info</h4><hr>
                    <div style="color: black;" id="status">Engine Status: Neutral</div>
                    <a href="bash/bash-results/engine-log.txt">View Engine Logs</a>
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
                  <div class="card-header card-header-success card-header-icon">
<!--                 <div class="card-icon">
                      <img src="./img/Group 1382.png" alt="building" />
                    </div> -->
                    <h4 class="card-title">Total Subdomains</h4><hr>
                    <a href="view-subdomains.php?program_id=<?php echo $_GET['program_id']; ?>">View Details</a>
                    <h3 class="card-title"><?php echo $total_subdomains; ?></h3>
                    <script>
                    function changeStatus() {
                        document.getElementById("status").innerHTML = "Engine Status: Running...";
                    }
                    </script>

                    <?php
                  // Function to execute the program
                  function executeProgram() {
                      // Bash script file path
                      $script_path = "bash/subdomain-enumerator.sh";

                      // Execute the bash script
                      exec("bash $script_path", $output, $return_status);

                      // Check if execution was successful
                      if ($return_status === 0) {
                          echo "<script>document.getElementById('status').innerHTML = 'Engine Status: Task Completed';</script>";
                          // Output of the script (if any)
                          foreach ($output as $line) {
                              // echo $line . "<br>";
                          }

                          // Meta refresh tag to reload the page instantly
                          echo '<meta http-equiv="refresh" content="0">';

                      } else {
                          echo "<script>document.getElementById('status').innerHTML = 'Error executing bash script!';</script>";
                      }
                  }

                  // Function to insert subdomains into the database
                  function insertSubdomains($con, $subdomains_file, $program_id) {
                      // Check if the file exists
                      if (file_exists($subdomains_file)) {
                          // Read the contents of the file
                          $subdomains = file_get_contents($subdomains_file);

                          // Trim to remove leading/trailing whitespaces
                          $subdomains = trim($subdomains);

                          // Check if subdomains are not empty
                          if (!empty($subdomains)) {
                              // SQL query to update program_subdomains column for given program_id
                              $update_query = "UPDATE my_projects SET program_subdomains = ? WHERE program_id = ?";

                              // Prepare statement
                              $stmt = $con->prepare($update_query);

                              if ($stmt) {
                                  // Bind parameters
                                  $stmt->bind_param("si", $subdomains, $program_id);

                                  // Execute the statement
                                  if ($stmt->execute()) {
                                      // echo "Subdomains inserted successfully into the database for program ID $program_id.";
                                  } else {
                                      echo "Error executing SQL statement: " . $stmt->error;
                                  }

                                  // Close statement
                                  $stmt->close();
                              } else {
                                  echo "Error preparing SQL statement: " . $con->error;
                              }
                          } else {
                              echo "Subdomains file is empty.";
                          }
                      } else {
                          echo "Subdomains file not found.";
                      }
                  }

                    // Function to fetch domains from database and save to scope.txt
                    function saveDomainsToScope($con, $program_id) {
                        // Path to the scope file
                        $scope_file = "bash/bash-results/scope.txt";

                        // Fetch the domain from the database based on program_id
                        $query = "SELECT program_domains FROM my_projects WHERE program_id = $program_id";
                        $result = mysqli_query($con, $query);

                        // Fetch the domain from the result
                        $row = mysqli_fetch_assoc($result);
                        $domain = $row['program_domains'];

                        // Clear the previous domain from the scope file
                        file_put_contents($scope_file, '');

                        // Append the domain to the scope file
                        if (!empty($domain)) {
                            file_put_contents($scope_file, $domain . PHP_EOL, FILE_APPEND);
                            echo "Domain added to scope file.";
                        } else {
                            echo "No domain found to add.";
                        }
                    }


                  // Check if the button is clicked to insert subdomains
                  if (isset($_POST['insert_subdomains'])) {
                      // MySQL connection parameters
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $database = "lazydb";

                      // Create connection
                      $con = new mysqli($servername, $username, $password, $database);

                      // Check connection
                      if ($con->connect_error) {
                          die("Connection failed: " . $con->connect_error);
                      }

                      // Get program_id from GET parameters
                      $program_id = isset($_GET['program_id']) ? intval($_GET['program_id']) : 0;

                      // Save domains to scope.txt
                      saveDomainsToScope($con, $program_id);

                      // Execute the subdomain-enumerator.sh
                      executeProgram();

                      // Path to the subdomains file
                      $subdomains_file = "bash/bash-results/subdomains.txt";

                      // Insert subdomains into the database
                      insertSubdomains($con, $subdomains_file, $program_id);

                      // Close MySQL connection
                      $con->close();
                  }

                  // Check if the button is clicked to execute the program
                  if (isset($_POST['run_script'])) {
                      // Execute the program
                      executeProgram();
                  }
                  ?>

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
                                <div class="custom-icon-card card card-stats" style="width: 750px;">
                                    <div class="card-header card-header-info card-header-icon">
                                        <h4 class="card-title"><center>Technology</center></h4><hr>
                                        <style>
                                            .flex-container {
                                                display: flex;
                                                flex-wrap: nowrap;
                                                background-color: hotpink;
                                                color: black;
                                                margin-bottom: 7px;
                                            }

                                            .flex-container > div {
                                                background-color: white;
                                                width: 200px;
                                                margin: 5px;
                                                text-align: center;
                                                line-height: 50px;
                                                font-size: 20px;
                                                margin-top: 20px;
                                            }
                                        </style>

                                        <div class="flex-container">
                                            <div>WordPress<br><span>12</span></div>
                                            <div>Nginx<br><span>38</span></div>
                                            <div>Java<br><span>122</span></div> 
                                            <div>PHP<br><span>32</span></div>
                                            <div>Durpal<br><span>72</span></div>
                                        </div>
                                        <center><a href="">Lookup More...</a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                        ?>
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
