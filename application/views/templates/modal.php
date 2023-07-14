<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <?= form_open('delete');?>
            <h2>Are you sure you want to delete?</h2>
                <input type="hidden" value="<?= $this->uri->segment(2);?>" name="boxtype">
                <input type="hidden" value="<?= $id;?>" name="id">




      </div>
      <div class="modal-footer">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>