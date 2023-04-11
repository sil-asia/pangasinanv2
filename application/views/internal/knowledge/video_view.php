<div class="modal fade" id="videoView" tabindex="-1" role="dialog" aria-labelledby="videoView" aria-hidden="true">
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

