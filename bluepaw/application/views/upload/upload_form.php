

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Kép feltöltése</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Kép feltöltése</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
        <?php echo form_open_multipart('upload/do_upload'); ?>
        
          <label for="file-upload" class="btn btn-primary">
              <input id="file-upload" type="file" name="userfile" size="20" class="form-control btn-primary" style="display:none">
          Fájl kiválasztása
          </label>
        <br/>
        <input type="submit" value="upload" class="btn btn-warning">
        <?php echo form_close(); ?>
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>