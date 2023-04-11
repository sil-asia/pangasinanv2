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
                                <li class="breadcrumb-item"><a href="<?php echo(base_url().'admin/list_all')?>" >Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo($admin->last_name)?></li>
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

                                            <label class="control-label col-md-3 col-sm-3 ">First Name <span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="first_name" name = "first_name" value = "<?php echo $admin->first_name;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Middle Initial</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="middle_initial" name = "middle_initial" value = "<?php echo $admin->middle_initial;?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Last Name<span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="text" class="form-control" id="last_name" name = "last_name" value = "<?php echo $admin->last_name;?>" >
                                            </div>
                                        </div>                                      
                                        <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Email<span class="required-field"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input readonly type="text" class="form-control" id="email" name = "email" value = "<?php echo $user->email;?>" >
                                                 
                                            </div>
                                        </div>
                                     
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Role </label>
                                            <div class="col-md-9 col-sm-9 ">

                                                 <select  tabindex="1" data-placeholder="Select here.." id = "type" name = "type" class="form-control">
                                                  <?php foreach($roles as $key){?>
                                                    <option value = <?php echo $key->roleID; if ($key->roleID == $admin->role){
                                                            echo( ' '.'selected');
                                                            }?>> <?php echo ($key->name);?></option>

                                                  <?php }?>  
                                                </select>
                    
                                               
                                        </div>
                                         </div>

                                       
                                       
                                       
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Update User Account Info</button>
                                            </div>
                                        </div>

                                    </form>
                                     <div class="ln_solid"></div>

                    
                                        <form class="form-horizontal form-label-left" method = "post" action="<?php echo ($password_action); ?>">

                                        <h4> Change Password</h4>

                                        <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Password: </label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="password" class="form-control" id="password" value = "<?php echo($user->password)?>" name = "password">
                                            </div>
                                        </div>
                                         <div class="form-group row ">

                                            <label class="control-label col-md-3 col-sm-3 ">Confirm Password</label>
                                            <div class="col-md-9 col-sm-9 ">
                    
                                                <input type="password" class="form-control" id="c_password" name = "c_passwords" value = "<?php echo($user->password)?>"  >
                                
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="col-md-9 col-sm-9  offset-md-3">
                                                <button type="submit" class="btn btn-success">Change Password</button>
                                            </div>
                                        </div>
 
                                    <div class="ln_solid"></div>
                                      
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
