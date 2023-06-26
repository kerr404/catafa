
<div class="modal fade" id="approve-member-modal<?php echo $id; ?>" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h5 class="modal-title" id="approveModalLabel">Confirm Approval</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to approve this member?
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-primary my-0" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/approve_member.php?id=<?php echo $id;  ?>">Approve</a>
      </div>
    </div>
  </div>
</div>
