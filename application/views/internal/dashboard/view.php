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

           
          <div class="row" style="display: inline-block;" >

     
          </div>
          

           

                <div class="clearfix"></div>
                <iframe width="1200" height="1800" src="https://datastudio.google.com/embed/reporting/0e8f339f-920c-4de0-a701-2ac79b423111/page/P2lxC" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

              </div>
            </div>

          </div>
         
        </div>
          <!-- /top tiles -->
        <!-- footer content -->
   <?php $this->load->view('internal/common/botton_foot.php')?>
        
        <!-- /footer content -->
      </div>
    </div>

   <?php $this->load->view('internal/common/footer.php')?>
   <script>

    
    $(document).ready(function(){
      init_view_plot();
      init_chart_pie();
      $('[data-toggle="tooltip"]').tooltip();  

    });
    function init_view_plot()
    {

   var system_views_settings = {
        grid: {
            show: true,
            aboveData: true,
            color: "#3f3f3f",
            labelMargin: 10,
            axisMargin: 0,
            borderWidth: 0,
            borderColor: null,
            minBorderMargin: 5,
            clickable: true,
            hoverable: true,
            autoHighlight: true,
            mouseActiveRadius: 100
        },
        series: {
            lines: {
                show: true,
                fill: true,
                lineWidth: 2,
                steps: false
            },
            points: {
                show: true,
                radius: 4.5,
                symbol: "circle",
                lineWidth: 3.0
            }
        },
        legend: {
            position: "ne",
            margin: [0, -25],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (label, series) {
                return label + '&nbsp;&nbsp;';
            },
            width: 40,
            height: 1
        },
        colors: ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'],
        shadowSize: 0,
        tooltip: true,
        tooltipOpts: {
            content: "%s: %y.0",
            xDateFormat: "%d/%m",
            shifts: {
                x: -30,
                y: -50
            },
            defaultTheme: false
        },
        yaxis: {
            min: 0
        },
        xaxis: {
            mode: "time",
            minTickSize: [1, "day"],
            timeformat: "%d/%m/%y"
           
        }
    };
         var arr_data1 = [ <?php foreach($view_array as $data){

          echo('[gd('.date('Y', strtotime($data->date)).','.date('m', strtotime($data->date)).','.date('d', strtotime($data->date)).'),'.$data->count.'],');


         }?>
        
    ];
 
      if ($("#system_views").length) {
        console.log('Plot1');

        $.plot($("#system_views"), [{
            label: "Claims",
            data: arr_data1,
            lines: {
                fillColor: "rgba(150, 202, 89, 0.12)"
            },
            points: {
                fillColor: "#fff"
            }
        }], system_views_settings);
    }
 

    }


   </script>
   <script>
    function init_chart_pie() {

    if (typeof (Chart) === 'undefined') { return; }

    console.log('init_chart_doughnut');

    if ($('.product_pie').length) {

        var chart_doughnut_settings = {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
                labels: [
                  <?php foreach($product_count as $pc)
                          {
                             echo('"'. $pc->name.'",');
                           }?>

                  
                ],
                datasets: [{
                    data: [ <?php foreach($product_count as $pc)
                          {
                             echo($pc->rate.",");
                           }?>],
                    backgroundColor: [
                       <?php foreach($product_count as $pc)
                          {
                             echo('"'.$pc->color.'",');
                           }?>
                    ],
                    hoverBackgroundColor: [
                        "#CFD4D8",
                        "#B370CF",
                        "#E95E4F",
                        "#36CAAB",
                        "#49A9EA"
                    ]
                }]
            },
            options: {
                legend: false,
                responsive: false
            }
        }

        $('.product_pie').each(function () {

            var chart_element = $(this);
            var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

        });

    }

}
   </script>
   <script>

    $(function() {
      var url="<?php echo base_url();?>";

      $("#reportrange").on("apply.daterangepicker", function(e, a) {
                window.location = url+"Dashboard/view/" + a.startDate.toISOString()+"/"+a.endDate.toISOString();
          
});
});


</script>

    
    
  </body>
</html>
