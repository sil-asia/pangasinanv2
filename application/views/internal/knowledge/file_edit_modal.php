<div class="modal fade" id="myModalUploadEdit" tabindex="-1" role="dialog" aria-labelledby="myModalUploadEdit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="editform">Edit File Details</h4>
      </div>
      <div class="modal-body">
                 <?php echo form_open_multipart('Knowledge/file_edit/', 'id=edit_file'); ?>         
                 <div class="control-group">
                <label>File </label>
                <input class="span5" type="text" class="form-control" value = "" id = "filename" name="filename"/>
                </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.9.1.min.js">
    $(function () {
        $('#myModalUploadEdit').on('show.bs.modal', function (event) {
          windows.alert("test");
            var button = $(event.relatedTarget); // Button that triggered the modal
            var filename = button.data('filename'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#filename').val("science");
            
        });
    });
    </script>
