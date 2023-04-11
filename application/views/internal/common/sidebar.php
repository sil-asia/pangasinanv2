 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>SMILHIS CDO</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <?php if ($role == "1"){ 
                    $this->load->view('internal/common/menu/dashboard_menu');
                     $this->load->view('internal/common/menu/resource_menu');
                     $this->load->view('internal/common/menu/patient_menu');
                      $this->load->view('internal/common/menu/facility_menu');
                       $this->load->view('internal/common/menu/worker_menu');
                       $this->load->view('internal/common/menu/report_menu');
                        $this->load->view('internal/common/menu/user_menu');
                  }?>

                  
                  
                   
                  
                
                  
                     
                   
                
                  

                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Terms of Use">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Privacy">
                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" onclick = "return confirm('Are you sure you want to logout?')" href="<?php echo (base_url()."Login/logout")?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>