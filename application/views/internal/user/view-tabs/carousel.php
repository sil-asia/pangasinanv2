 <div class="modal fade" id="carousel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">

                            <?php 
                            $i=0;
                            if($images){
                                foreach ($images as $file){
                            ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" <?php if($i==0){ echo 'class="active"'; }?> ></li>
                            <?php 
                            $i++;
                                }
                            }
                            ?>
 
                          </ol>
                          <div class="carousel-inner">

                             <?php 
                            $i=0;
                            if($images){
                                foreach ($images as $file){
                            ?>
                                <div <?php if($i==0){ echo 'class="carousel-item active"'; }else{ echo 'class="carousel-item"';}?> >
                                  <img class="d-block w-100" src="<?php echo $it_loc . $file->name; ?>" alt="Slide <?php echo $i ?>"/>
                                    
                                </div>
                            <?php 
                            $i++;
                                }
                            }
                            ?> 
                           
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>