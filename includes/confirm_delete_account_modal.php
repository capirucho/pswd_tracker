<div class="modal fade" id="confirm_delete_account" tabindex="-1" role="dialog" aria-labelledby="modal-delete_account" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Delete this Account?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">

                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        You are requesting to delete account with ID: <?php echo $account->id; ?><br>
                        <button class="delete-accounts">delete <?php echo $account->id; ?></button>
                        <button>cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>