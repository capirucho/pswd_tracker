
<div class="modal fade" id="add-account" tabindex="-1" role="dialog" aria-labelledby="modal-add-account" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Create New Account</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">

                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <!--                        <div class="text-center text-muted mb-4">
                                                    <h3>Create New Account</h3>
                                                </div>-->
                        <form role="form" action="add_account.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Account Type</label>
                                <select name="account_type_id" class="form-control" id="exampleFormControlSelect1" required>
                                    <option value="">Choose...</option>
                                    <option value="1">website</option>
                                    <option value="2">device app</option>
                                    <option value="3">desktop app</option>
                                    <option value="4">other</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                                    </div>
                                    <input name="account_title" class="form-control" placeholder="Account Title" type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-world"></i></span>
                                    </div>
                                    <input name="url" class="form-control" placeholder="URL" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input name="username" class="form-control" placeholder="Username" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                    </div>
                                    <input name="password" class="form-control" placeholder="Password" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Notes</label>
                                <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tags</label>
                                <textarea name="tags" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <!--                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                                            <label class="custom-control-label" for=" customCheckLogin">
                                                                <span class="text-muted">Remember me</span>
                                                            </label>
                                                        </div>-->
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