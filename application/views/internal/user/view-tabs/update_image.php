<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id= "imageUpdate">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Update Caption</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                         <div class="modal-body">

                          <form class="form-horizontal form-label-left" enctype="multipart/form-data" method = "post" action = <?php echo $image_action_update; ?> >
                          
                          <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Name</label>
                            <div class="col-md-9 col-sm-9 ">
                              <input readonly value = "" type="text" class = "form-control" name = "name" id = "name">
                              <input hidden value = "" type="text" class = "form-control" name = "id" id = "id">
                            </div>
                          </div>
                        
                           <div class="form-group row">
                              <label class="control-label col-md-3 col-sm-3 ">Description:</label>
                                      <div class="col-md-9 col-sm-9 ">
                                        <textarea  rows="5" placeholder="details" id = "description" class = "form-control" name = "description"></textarea>
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


