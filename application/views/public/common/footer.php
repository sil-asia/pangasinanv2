     <script src="<?php echo(base_url())?>foundation/js/jquery.js"></script>
   
<script type="text/javascript" id="gwt-pst">
              (function(d, eId) {
                var js, gjs = d.getElementById(eId);
                js = d.createElement("script"); js.id = "gwt-pst-jsdk";
                js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
                gjs.parentNode.insertBefore(js, gjs);
              }(document, "gwt-pst"));

              var gwtpstReady = function(){
                var otherFormat = "dddd, mmmm dd, yyyy h:mm:ss TT";
                var firstPst = new gwtpstTime("pst-date", {format: otherFormat});
              }
              </script>

<script type="text/javascript">
    $(document).ready(function(){
        var trigger = <?php echo $signup_trigger;  ?>;
        if(trigger==1){
            $("#userModalNotice").modal('toggle');
            $("#userModalNotice").modal('show');
        }
        else if(trigger==2){
            $("#userModalErrorNotice").modal('toggle');
            $("#userModalErrorNotice").modal('show');
        }
        

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



        $('#i_region2').change(function(){
        var region = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_province_dd",
                method: 'post',
                data: {region: region},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_province2').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_province2').append('<option value="'+data['provinceID']+'">'+data['province']+'</option>');
                    });
                }
            });
        });
        $('#i_province2').change(function(){
        var province = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_muncity_dd",
                method: 'post',
                data: {province: province},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_muncity2').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_muncity2').append('<option value="'+data['municipality_cityID']+'">'+data['muncity']+'</option>');
                    });
                }
            });
        });
        $('#i_muncity2').change(function(){
        var municipality = $(this).val();
            // AJAX request
            $.ajax({
                url:"<?php echo base_url();?>Location/get_barangay_dd",
                method: 'post',
                data: {muncity: municipality},
                dataType: 'json',
                success: function(response){
                    // Remove options
                    $('#i_bgy2').find('option').not(':first').remove();
                    // Add options
                    $.each(response,function(index,data){
                        $('#i_bgy2').append('<option value="'+data['barangayID']+'">'+data['barangay']+'</option>');
                    });
                }
            });
        });
       
        // $('#userModalNotice').on('show', function() {
        // var link = $(this).data('link'),
        //     confirmBtn = $(this).find('.confirm');
        // });

        // $('.confirm').click(function() {
        //     // handle form processing here
            
        //     $('#RegistrationForm').submit();
          
        // });
    });

</script>


<!--Standard Footer End-->

 <script type="text/javascript">
      (function(d, s, id) {
      var js, gjs = d.getElementById('gwt-standard-footer');

      js = d.createElement(s); js.id = id;
      js.src = "//gwhs.i.gov.ph/gwt-footer/footer.js";
      gjs.parentNode.insertBefore(js, gjs);
      }(document, 'script', 'gwt-footer-jsdk'));
</script>

   
    <script src="<?php echo(base_url())?>foundation/js/foundation.min.js"></script>
    <script src="<?php echo(base_url())?>foundation/js/plugins/foundation.reveal.js"></script>
    <script src="<?php echo(base_url())?>foundation/js/theme.js"></script>

    <script>
      $(document).foundation();
    </script>