<!doctype html>
<html lang="en">
  <?php $this->load->view('public/common/header');?>
  <body>
    <?php $this->load->view('public/common/accessibility');?>
    <?php $this->load->view('public/common/menu');?>

    
    <div id="main-content">

      <div class="row">
        <div class="large-12 columns">
          <div class="callout secondary">
            <h3> PROVINCE OF PANGASINAN</h3>
            <p>

            Guided by the shared mission of Pangasinan: “To be Number one,” the leaders and the people of the province bonded together to transform Pangasinan as the best place to invest, work, live and raise a family.</p>
            <p>

            With the collective effort of Pangasinenses, the province has become a primemover in local governance, health care management, agricultural program, sports and cultural development, employment and livelihood services, anti-drug campaign, disaster prepareness, environmental protection and human resources management. </p>
           

            </p>
            
            
          </div>
        </div>

      </div> 

        <div class="row">

         
        <div class="large-12 columns">
          <h5>Do your part to help!</h5>
           <?php 
           if($success == 1)
          {?>
           <div class="callout success">
            <h5>Successfull Submission</h5>
                      
          </div>

         <?php }?>

          

          <!-- Grid Example -->
          <div class="row">
          
          <div class="large-4 columns">
          <div class="callout primary">
            <h5>Citizen Profiling</h5>
            <p>Enlistment of citizens to primary health care units.</p>
            <a class="success button" data-open="patient-modal"> Register Here</a>          
          </div>

        </div>
         <div class="large-4 columns">
          <div class="callout primary">
            <h5>Health Worker Registration</h5>
            <p> Enlistment of health workers.</p>
            <a class="success button" data-open="hwr-modal">Register Here</a>            
          </div>
        </div>
         <div class="large-4 columns">
          <div class="callout primary">
            <h5>Facility Registration</h5>
            <p>Enlistment of health facilities.</p>
            <a class="success button" data-open="facility-modal">Register Here</a>            
          </div>
        </div>
          </div>
        </div>     

       
      </div> 

        <?php $this->load->view('public/common/transparency');?>

      <?php $this->load->view('public/modal/patient-modal');?>
      <?php $this->load->view('public/modal/facility-modal');?>
      <?php $this->load->view('public/modal/hwr-modal');?>

    

    </div>
    

<!-- main end -->


<!--Standard Footer-->
<div id="gwt-standard-footer"></div>

<div><a href="#main-nav" id="back-to-top" title="Back to Top"><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i>

      </div><!-- off-canvas-content -->
    </div><!-- off-canvas-wrapper-inner -->
  </div><!-- off-canvas-wrapper -->
    <?php $this->load->view('public/common/footer');?>
	</body>
</html>
