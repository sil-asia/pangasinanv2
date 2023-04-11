<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id= "KMUpload3">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Upload File</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                         <div class="modal-body">

                          <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action="<?php echo(base_url())?>Knowledge/upload_video/">
                          
                           <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Video Link<span class="required-field"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                              <textarea required type="text" class="form-control" name = "uservideo"></textarea>
                            </div>
                          </div>
                         <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Display Name<span class="required-field"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                              <input required type="text" class="form-control" name = "name">
                            </div>
                          </div>
                          <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Item <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "product_line" name = "product_line" class="form-control">
                                                  <option value = ""> Select an item </option>
                                                    <?php foreach ($dd_product_line as $option)
                                                    {
                                                        echo ("<option value = ");
                                                        echo ($option->product_lineID);
                                                        if ($product_line == $option->product_lineID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>

                             <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> Resource Type <span class="required-field"></span> </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select required tabindex="1" data-placeholder="Select here.." id = "resource_type" name = "resource_type" class="form-control">
                                                  <option value = ""> Select a resource type </option>
                                                    <?php foreach ($dd_resource_type as $option)
                                                    {
                                                        echo ("<option value = ");
                                                        echo ($option->dd_resourcetypeID);
                                                        if ($resource_type == $option->dd_resourcetypeID)
                                                        {
                                                            echo(" selected ");
                                                        }
                                                        echo (">" . $option->name . "</option>");
                                                    }?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                              

                      

                                         <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 ">Description:</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                 <textarea  rows="5" class="form-control" placeholder="details" name = "description"></textarea>
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


