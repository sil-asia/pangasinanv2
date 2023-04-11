<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('internal/common/header')?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php $this->load->view('internal/common/sidebar.php')?>

       <?php $this->load->view('internal/common/page_head.php')?>


        <div class="right_col" role="main">
            <h3> <?php echo $module;?></h3>

            <div class="col-md-13 ">


                    <div class="x_panel">
                                <div class="x_title">
                                      <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo(base_url().'user/list_all')?>" >Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Admin Account</li>
                              </ol>
                            </nav>
                                    <h2>Admin account <small> Admin accounts can be viewed/edited.</small></h2>
                                    <br/>
                                    <br/>
                                    <?php echo ($msg);?>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo ($action); ?>">

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">First Name<span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="first_name" name = "first_name"  >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Middle Initial </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="middle_initial" name = "middle_initial"  >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label required class="control-label col-md-3 col-sm-3 ">Last Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input required type="text" class="form-control" id="last_name" name = "last_name" value =  >
                                            </div>
                                        </div>                                      
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Email <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input required type="text" class="form-control" id="email" name = "email" >
                                                 
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Admin User Type</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "type" name = "type" class="form-control">
                                                    <?php
                                                            foreach ($roles as $role){?>
                                                            <option value = <?php echo $role->roleID?> ><?php echo ($role->name)?></option>
                                                 <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                       
                                       
                                       
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Submit User Account Info</button>
                                            </div>
                                        </div>

                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

            
        
          
          <!-- /top tiles -->
        <!-- footer content -->
        <?php $this->load->view('internal/common/botton_foot.php')?>
        
        <!-- /footer content -->
      </div>
    </div>
</div>

   <?php $this->load->view('internal/common/footer.php')?>
    
    
  </body>
</html>
