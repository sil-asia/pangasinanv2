<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id= "fileUpload">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Upload File</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                         <div class="modal-body">

                          <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action= <?php echo($file_action);?> ?>
                          
                          <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">File</label>
                            <div class="col-md-9 col-sm-9 ">
                              <input required type="file" class="form-control" name = "userfile">
                            </div>
                          </div>
                        
                             <div class="form-group row">
                                            <label class="control-label col-md-3 col-sm-3 "> File Tag </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select tabindex="1" data-placeholder="Select here.." id = "file_tag" name = "file_tag" class="form-control">
                                                    <?php foreach ($dd_file_tag as $option)
                                                    {
                                                        echo ("<option value = ");
                                                        echo ($option->dd_organization_fileID);
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


