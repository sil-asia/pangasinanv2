<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <i class = "fa fa-user"></i> <?php echo ($u_name);?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                   
                    <a class="dropdown-item"  href="<?php if($role == "Admin" || $role == "BPS"){echo (base_url().'Landing/');} else {echo(base_url().'Landing/');}?>"> Public Page</a>
                     
                    <a class="dropdown-item"  onclick = "return confirm('Are you sure you want to logout?')" href="<?php echo (base_url()."Login/logout")?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
               
                </li>
              </ul>
            </nav>
          </div>
        </div>

