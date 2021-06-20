

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal"><?php echo  lang('upload_image'); ?></button>

<!-- Modal -->
<div id="myModal" class="modal fade shadow" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
          <h4 class="modal-title"> <?php echo lang('upload_image'); ?> </h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
        <?php echo form_open_multipart('upload/do_upload'); ?>
        
          <label for="file-upload" class="btn btn-light form-control">
              <input id="file-upload" type="file" name="userfile" size="20" class="form-control btn-primary" style="display:none">
           <?php echo lang('choose_image'); ?>
          </label>
        <br/>
        <input type="submit" value="upload" class="btn btn-secondary form-control ">
        <?php echo form_close(); ?>
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning form-control" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>