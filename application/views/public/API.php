<!doctype html>
<html class="no-js" lang="en">
  <?php $this->load->view('public/common/header');?>
  <body>
    <?php $this->load->view('public/common/accessibility');?>
    <?php $this->load->view('public/common/menu');?>
   
    
    <div id="main-content">


      <div class="row">
          <div class="large-12 columns">
          <h3> API Documentation </h3>
        </div>

        <div class="large-12 columns">
          <div class="callout success">
            

            <p>
                To use these APIs, you need an <strong>API key</strong>. Please contact us at <a href="mailto:philip.zuniga@gmail.com">philip.zuniga@gmail.com</a> to get your own API key.
            </p>

            
          </div>
        </div>
         <div class="large-12 columns">
          <div class="callout secondary">
            

            <h2 id="get-patients">get patient</h2>
            <p>
                To get patients you need to make a GET call to the following url :<br>
                <code class="higlighted">http://api.smilhis.com/patient/id
                </code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>


            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>secret_key</td>
                    <td>String</td>
                    <td>Your API key.</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>String</td>
                    <td>(required) Patient ID.</td>
                </tr>
               
               
                </tbody>
            </table>

            <h4>SAMPLE QUERY</h4>

         <p><code class="higlighted">http://api.smilhis.com/Patient/1
                </code></p>




        <h4>RESPONSE</h4>
        <div>
<p><code>{"id":"1","philhealth_no":"1002101","last_name":"Cruz","first_name":"","middle_name":"","suffix":"","gender":"0","date_of_birth":"0000-00-00","region":"0","province":"0","mun_city":"0","barangay":"0","street_address":"","source":"0"}</code></p>

            
          </div>
        </div>
        
        </div>

        <div class="large-12 columns">
          <div class="callout secondary">
            

            <h2 id="get-patients">get health workers</h2>
            <p>
                To get health workers you need to make a GET call to the following url :<br>
                <code class="higlighted">http://api.smilhis.com/health_worker/id
                </code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>


            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>secret_key</td>
                    <td>String</td>
                    <td>Your API key.</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>String</td>
                    <td>(required) Health Worker ID.</td>
                </tr>
               
               
                </tbody>
            </table>

            <h4>SAMPLE QUERY</h4>

         <p><code class="higlighted">http://api.smilhis.com/health_worker/1
                </code></p>




      <h4>RESPONSE</h4>
        <div>
<p><code>{"id":"1","philhealth_no":"1002101","last_name":"Cruz","first_name":"","middle_name":"","suffix":"","gender":"0","date_of_birth":"0000-00-00","facility":"","type":""}</code></p>
</div>       </div>
        
        </div>

        <div class="large-12 columns">
          <div class="callout secondary">
            

            <h2 id="get-patients">get facility</h2>
            <p>
                To get health facilities you need to make a GET call to the following url :<br>
                <code class="higlighted">http://api.smilhis.com/facility/id
                </code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>


            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>secret_key</td>
                    <td>String</td>
                    <td>Your API key.</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>String</td>
                    <td>(required) Facility ID.</td>
                </tr>
               
               
                </tbody>
            </table>

            <h4>SAMPLE QUERY</h4>

         <p><code class="higlighted">http://api.smilhis.com/facility/1
                </code></p>




        <h4>RESPONSE</h4>
       <div>
<p><code>{"id":"1","name":"Test Hospital","region":"0","province":"0","mun_city":"0","barangay":"0","street_address":"","level":"", "ownership":"","capacity":"", "current_load":"", "latitude":"", "longtitude":""}</code></p>
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
