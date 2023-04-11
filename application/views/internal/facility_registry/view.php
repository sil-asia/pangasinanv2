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

            <div class="col-md-13 ">


                    <div class="x_panel">
                                <div class="x_title">
                                    <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo(base_url().'Facility_Registry/list_all')?>" >Facilities</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo($facility->name)?></li>
                              </ol>
                            </nav>
                                    <h2>View Facility Details <small> Facility details can be edited.</small></h2>
                                    <br/>
                                    <br/>
                                    <?php echo ($msg);?>
                                    
                                    <div class="clearfix"></div>
                                </div>
                    <div class="x_content">

                    <ul class="nav nav-tabs bar_tabs" id="productTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="productTab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true">Facility Details</a>
                      </li>
                     
                     

                     
                    </ul>
                     
                    <div class="tab-content" id="myTabContent">
                        <?php $this->load->view('internal/facility_registry/view-tabs/info_tab');?>
                      
                     
                    </div>
                  </div>
                                
                </div>
            </div>

            
        
          
          <!-- /top tiles -->
        <!-- footer content -->
        <script type="text/javascript">
        $(document).ready(function(){

        var reg ="<?php echo $loc->reg; ?>";
        var regID ='<?php echo $loc->regID; ?>';
       $('#i_region').append('<option value="'+regID+'" selected="selected" >'+reg+'</option>');
        
        var prov="<?php echo $loc->prov; ?>";
        var provID='<?php echo $loc->provID; ?>';
       $('#i_province').append('<option value="'+provID+'" selected="selected" >'+prov+'</option>');
        
        $('#i_region').change(function(){
        var region = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_province_dd",
                method: 'post',
                data: {region: region},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_province').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_province').append('<option value="'+data['provinceID']+'">'+data['province']+'</option>');
                    });
                }
            });
        });
        var muni="<?php echo $loc->mun; ?>";
        var muncityID='<?php echo $loc->munID; ?>';

        $('#i_muncity').append('<option value="'+muncityID+'" selected="selected" >'+muni+'</option>');

        $('#i_province').change(function(){
        var province = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_muncity_dd",
                method: 'post',
                data: {province: province},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_muncity').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_muncity').append('<option value="'+data['municipality_cityID']+'">'+data['muncity']+'</option>');
                    });
                }
            });
        });

        var bgy=  "<?php echo $loc->bgy; ?>";
        var bgyID='<?php echo $loc->bgyID; ?>';

        $('#i_bgy').append('<option value="'+bgyID+'" selected="selected" >'+bgy+'</option>');

        $('#i_muncity').change(function(){
        var municipality = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_barangay_dd",
                method: 'post',
                data: {muncity: municipality},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_bgy').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_bgy').append('<option value="'+data['barangayID']+'">'+data['barangay']+'</option>');
                    });
                }
            });
        });

    });


</script>
  <script type="text/javascript">
            
              var url="<?php echo base_url();?>";
            function myfunction2(filename, id){
            var r =confirm("Do you want to delete the file? "+ filename);
            if (r==true)
            window.location = url+"User/file_delete/" + id;
                else
            return false;
            }
            



         </script>
       


         
        <?php $this->load->view('internal/common/botton_foot.php')?>
        
        <!-- /footer content -->
      </div>
    </div>
</div>

   <?php $this->load->view('internal/common/footer.php')?>
    
    
  </body>
</html>
