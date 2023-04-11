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
                <div style="display: flex; justify-content: flex-end">
                    <button type='button' class="btn btn-primary" href="#KMUpload1" data-toggle="modal" data-backdrop="static" data-keyboard="false" > Upload a File</button>
                    <button type='button' class="btn btn-primary" href="#KMUpload2" data-toggle="modal" data-backdrop="static" data-keyboard="false" > Share a Link</button>
                    <button type='button' class="btn btn-primary" href="#KMUpload3" data-toggle="modal" data-backdrop="static" data-keyboard="false" > Post a Video</button>     
                </div>
                                <br />
                                
                <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Knowlege Materials</h2>
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
                      The following are the knowlege Materials 
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                                            <tr>
                                                <th>
                                                    File Name
                                                </th>
                                                
                                                <th>
                                                    Type of Knowledge Material
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Product Line
                                                </th>
                                                <th>
                                                    Date Uploaded
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($files as $file)
                                            { ?>
                                                <tr> <td><a href = "<?php echo(base_url().'knowledge/view/'. $file->id); ?>" > <?php echo ($file->name); ?> </a></td>
                                                     
                                                     <td><?php echo ($file->resourceType);?></td>
                                                     <td><?php echo ($file->description); ?></td>
                                                     <td><?php echo ($file->product_line); ?></td>
                                                     <td><?php echo ($file->date_uploaded); ?></td>
                                                     <td>
                                                        <?php if($file->info_type != '3'){?>
                                                        <a><i class = 'fa fa-trash' id='delB' onClick = "myfunction('<?php echo ($file->file_name);?>','<?php echo ($file->id);?>')" > </i></a><?php }
                                                        else {?>
                                                          <a><i class = 'fa fa-trash' id='delB' onClick = "myfunctionvideo('<?php echo ($file->id);?>')" > </i></a>

                                                        <?php }?>
                                                        </td>
                                                    </tr>


                                           <?php } ?>
                                          
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                                <th>
                                                    File Name
                                                </th>
                                                
                                                <th>
                                                    Type of Knowledge Material
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Product Line
                                                </th>
                                                <th>
                                                    Date Uploaded
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
         
        <?php $this->load->view('internal/knowledge/file_upload_modal.php');?>
        <?php $this->load->view('internal/knowledge/link_upload_modal.php');?>
        <?php $this->load->view('internal/knowledge/video_upload_modal.php');?>
         <script type="text/javascript">
            var url="<?php echo base_url();?>";
            function myfunction(filename, id){
            var r =confirm("Do you want to delete the file? "+ filename);
            if (r==true)
            window.location = url+"Knowledge/file_delete/" + id;
                else
            return false;
    }
         </script>
         <script type="text/javascript">
            var url="<?php echo base_url();?>";
            function myfunctionvideo(id){
            var r =confirm("Do you want to delete the video? ");
            if (r==true)
            window.location = url+"Knowledge/file_delete/" + id;
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
