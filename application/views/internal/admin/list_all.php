<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('internal/common/header')?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php $this->load->view('internal/common/sidebar.php')?>

       <?php $this->load->view('internal/common/page_head.php')?>

        <!-- top navigation -->
        
        <!-- /top navigation -->

        <div class="right_col" role="main">

             <h3> <?php echo $module;?></h3>

             <div class="module">
               
                                <br />
                                
                <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Users</h2>
                    <br/>
                    <br/>
                    <?php echo ($msg);?>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      This is the page for admin users
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                   Email Address
                                                </th>
                                                 <th>
                                                  Actions
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($admins as $admin)
                                            {?>
                                                <tr>
                                                    <td> <a href = "<?php echo(base_url()."admin/view/". $admin->id)?>"><?php echo($admin->name) ?></a> </td>
                                                    <td>  <?php echo($admin->user->email) ?> </td>
                                                   
                                                    
                                                <td>  <a><i class = 'fa fa-trash' id='delB2' onClick = "myfunction('<?php echo ($admin->id);?>')" > </i></a></td> 
                                                </tr>
                                                <?php } ?>
                                          
                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                   Email Address
                                                </th>
                                                 <th>
                                                  Actions
                                                </th>
                                                
                                            </tr>
                                        </tfoot>
                    </table>
                  </div>
                  </div>
              </div>
            </div>

                            </div>
        
          <div class="row" style="display: inline-block;" >
         
        </div>
          <!-- /top tiles -->
        <!-- footer content -->
         <script type="text/javascript">
            var url="<?php echo base_url();?>";
            function myfunction(id){
            var r =confirm("Do you want to delete this user? ");
            if (r==true)
            window.location = url+"User/delete/" + id;
                else
            return false;
    }
         </script>

           <?php $this->load->view('internal/common/botton_foot.php')?>

        <!-- /footer content -->
      </div>
    </div>

   <?php $this->load->view('internal/common/footer.php')?>
    
    
  </body>
</html>
