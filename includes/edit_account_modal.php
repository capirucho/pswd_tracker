
<div class="modal fade bd-modal-lg" id="edit-account" tabindex="-1" role="dialog" aria-labelledby="modal-edit-account" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Account</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">

                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">

                        <form role="form" action="edit_account.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Title</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                                    </div>
                                    <input name="account_title" class="form-control" placeholder="Account Title" type="text" required>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Account Type</label>
                                    <select name="account_type_id" class="form-control" id="exampleFormControlSelect1" required>
                                        <option value="">Choose...</option>
                                        <option value="1">website</option>
                                        <option value="2">device app</option>
                                        <option value="3">desktop app</option>
                                        <option value="4">other</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="url">URL</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-world"></i></span>
                                        </div>
                                        <input name="url" class="form-control" placeholder="URL" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input name="username" class="form-control" placeholder="Username" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                        </div>
                                        <input name="password" class="form-control" placeholder="Password" type="text" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Notes</label>
                                    <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Tags</label>
                                    <textarea name="tags" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary my-4" name="add_account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>