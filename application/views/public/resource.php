<!doctype html>
<html class="no-js" lang="en">
    <?php $this->load->view('public/common/datatable_style');?>

  <?php $this->load->view('public/common/header');?>
  <body>
    <?php $this->load->view('public/common/accessibility');?>
    <?php $this->load->view('public/common/menu');?>

    





    <div id="main-content">

      <div class="row">
        <div class="large-12 columns">
          <div class="callout secondary">
            <h3>Resource Center</h3>

            <p>To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>
            <p>Once you've exhausted the fun in this document, you should check out:</p>
            <div class="row">
            
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title </th>
                          <th>Description</th>
                          <th>Type of File</th>
                          <th>Date Uploaded</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach($resources as $resource){?>
                          <tr>
                          <td><?php echo($resource->name)?></td>
                          <td><?php echo($resource->description)?></td>
                          <td><?php if ($resource->info_type == 1) 
                          {
                            echo('File');
                          }
                          else if ($resource->info_type == 2){
                            echo('Link');
                          }
                          else
                            {
                              echo('Video');
                            }?></td>
                          <td><?php echo($resource->date_uploaded)?></td>
                          <td>

                            <?php if ($resource->info_type == 1) 
                          {?>
                             <button class="btn"><i class="fa fa-download"></i> Download</button>
                            
                          <?php }
                          else if ($resource->info_type == 2){?>
                            <button class="btn"><i class="fa fa-link"></i> Link</button>
                          <?php }
                          else
                            {?>
                              <button class="btn"><i class="fa fa-eye"></i> View</button>
                            <?php }?></td>


                        
                          
                        </tr>

                        <?php }?>
                       
                      </tbody>
                    </table>       
            </div>
          </div>
        </div>
      </div>  
      <?php $this->load->view('public/common/transparency');?>
    </div>

<!-- main end -->


<!--Standard Footer-->
<div id="gwt-standard-footer"></div>

<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->
    <?php $this->load->view('public/common/footer');?>
    <?php $this->load->view('public/common/datatable_script');?>

	</body>
</html>
