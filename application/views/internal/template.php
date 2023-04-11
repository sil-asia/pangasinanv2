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
        <a> Go back to dashboard</a>
        <div class="row" style="display: inline-block;" >
         
        </div>
          <!-- /top tiles -->
        <!-- footer content -->
   <?php $this->load->view('internal/common/botton_foot.php')?>
        
        <!-- /footer content -->
      </div>
    </div>

   <?php $this->load->view('internal/common/footer.php')?>
    
    
  </body>
</html>
