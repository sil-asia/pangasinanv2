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
                    <h2>Organization Users</h2>
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
                          <div class = "row">
                              <div class = "col-lg-10">
                          <p class="text-muted font-13 m-b-30">
                            Organization Users
                          </p>
                        </div>
                        <div class = "col-lg-2">
                          <b><a  onclick = "download_table_as_csv('datatable',',')"style = "text-align:right"><i class="fa fa-file"></i> Download CSV</a></b>
                        </div>
                        </div>
                          
                    <br/>
                    <table id="datatable" data-display-length='-1' class="table table-striped table-bordered" style="width:100%">

                      <thead>
                                            <tr>
                                                <th>
                                                    Organization Name
                                                </th>
                                                <th>
                                                   Associated Email Address
                                                </th>
                                                <th>
                                                  User Status
                                                </th>
                                                <th>
                                                  Signup Date
                                                </th>
                                                 <th>
                                                  Actions
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($organizations as $org)
                                            {?>
                                                <tr>
                                                    <td> <a href = "<?php echo(base_url()."user/view/". $org->id)?>"><?php echo($org->name) ?></a> </td>
                                                    <td>  <?php echo($org->email) ?> </td>
                                                    <td>  <?php 
                                                    if($org->status == 0) {
                                                      echo ("<b><text style='color:green;'> Approved </text></b>");
                                                    }
                                                    elseif($org->status == 1)
                                                    {
                                                      echo("<b><text style='color:orange;'> Pending </text></b>");

                                                    } 
                                                    else
                                                      {
                                                        echo("<b><text style='color:red;'> Disapproved </text></b>");
                                                      }?> </td>
                                                      <td> <?php echo($org->date)?></td>
                                                    
                                                <td>  <a><i class = 'fa fa-trash' id='delB2' onClick = "myfunction('<?php echo ($org->id);?>')" > </i></a></td> 
                                                </tr>
                                                <?php } ?>
                                          
                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>
                                                    Organization Name
                                                </th>
                                                <th>
                                                   Associated Email Address
                                                </th>
                                                <th>
                                                  User Status
                                                </th>
                                                 <th>
                                                  Signup Date
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
