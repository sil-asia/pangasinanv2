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

             <div class="module">
               
              <br />
                                
                <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Health Facility Registry</h2>
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
                                                    Facility Name
                                                </th>
                                                <th>
                                                    Barangay
                                                </th>
                                                <th>
                                                    Level
                                                </th>
                                                <th>
                                                  Ownership
                                                </th>
                                                <th>
                                                  Status
                                                </th>
                                                <th>
                                                  Approved Date
                                                </th>
                                                 <th>
                                                  Actions
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($facilities as $facility)
                                            {?>
                                                <tr>
                                                    <td> <a href = "<?php echo(base_url()."Facility_registry/view/". $facility->id)?>"><?php echo($facility->name) ?></a> </td>
                                                    <td>  <?php echo $facility->barangay; ?> </td>
                                                    <td>  <?php echo $facility->level; ?> </td>
                                                    <td>  <?php echo $facility->ownership; ?> </td>
                                                    

                                                    <td>  <?php 
                                                    if($facility->status== 1) {
                                                      echo ("<b><text style='color:green;'> Approved </text></b>");
                                                    }
                                                    else
                                                    {
                                                      echo ("<b><text style='color:orange;'> Pending </text></b>");

                                                    } 
                                                  
                                                      ?> 
                                                    </td>
                                                      <td> <?php echo($facility->approval_date)?></td>
                                                    
                                                <td>  <a><i class = 'fa fa-trash' id='delB2' onClick = "myfunction('<?php echo ($facility->id);?>')" > </i></a></td> 
                                                </tr>
                                                
                                                <?php } ?>
                                          
                                        </tbody>
                                        <tfoot>
                                                
                                            <tr>
                                                <th>
                                                    Facility Name
                                                </th>
                                                <th>
                                                    Barangay
                                                </th>
                                                <th>
                                                    Level
                                                </th>
                                                <th>
                                                  Ownership
                                                </th>
                                                <th>
                                                  Status
                                                </th>
                                                <th>
                                                  Approved Date
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
