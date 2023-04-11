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
            <h3>Login</h3>

            <form>
              <div class="row">
                  <div class="large-8 columns">
              
              

                <input type="text" class="form-control" name = "login_email" id = "login_email" placeholder="Username" required="" />
                <input type="password" class="form-control" name = "login_pw" id = "login_pw"  placeholder="Password" required="" />
                <button type="button" class = "button submit" onclick="myfunctionCheckUser(); " >Login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
                </div>
              </div>

              
            </form>

            
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

    <script type="text/javascript">


    function myfunctionCheckUser()
    {
                    
        var email = $('#login_email').val();
        var password = $('#login_pw').val();

        // alert(email);
        
            var post_data = {
                'email': email,
                'password':password,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };


            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>login/signin/",
                data: post_data,
                success: function (data) {
                    // return success
                    if(data=="yes1"){
                        alert('Successful Login')

                        window.location.href = "<?php echo $dashboard_link1; ?>";
                        
                    }
                    else if (data == "yes2"){
                        alert('Successful Login');
                        window.location.href = "<?php echo $dashboard_link2; ?>";
                        
                        
                    }
                    else if (data == "yes3"){
                        alert('Successful Login');
                        window.location.href = "<?php echo $dashboard_link3; ?>";

                        
                    }
                    else
                    {
                        alert('Failed Login');
                        $('#msg_error').show();
                        $('#msg_error').html(data);

                        

                    }
                },
                error:function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        
    }
</script>
	</body>
</html>
