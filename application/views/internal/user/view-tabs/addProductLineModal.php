<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id= "addPL">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Update Caption</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                         <div class="modal-body">

                          <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action = <?php echo $product_line_update; ?> >
                          
                      
                        
                           <div class="form-group row">
                              <label class="control-label col-md-3 col-sm-3 ">Product Line:</label>
                                      <div class="col-md-9 col-sm-9 ">
                                    <select name="product_line" id="product_line" class="form-control">
                                    <option value="">--select Product Line--</option>
                                    <?php
                                    foreach($product_dd as $key=>$value)
                                    { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                    <?php }
                                    ?>
                                </select>
                                          </div>
                                      </div>
                                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  </form>

            
                    
      </div>
     
                      </div>
                    </div>
                  </div>


