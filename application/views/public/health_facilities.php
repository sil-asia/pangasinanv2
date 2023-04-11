<!doctype html>
<html class="no-js" lang="en">
  <?php $this->load->view('public/common/header');?>
  <body>
    <?php $this->load->view('public/common/accessibility');?>
    <?php $this->load->view('public/common/menu');?>
   
    
    <div id="main-content">

      <div class="row">
        <div class="large-12 columns">
          <div class="callout secondary">
            <h3> Health Facilities </h3>

            <iframe width="1200" height="750" src="https://datastudio.google.com/embed/reporting/61b62a80-cb19-4ff6-827c-793b7cc492f5/page/p_s6er6ykhnc" frameborder="0" style="border:0" allowfullscreen></iframe>
            
          
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
