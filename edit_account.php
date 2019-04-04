<?php


include("templates/header.php");

if(!$session->isSignedIn()) {
    redirectUser("login.php");
}

$account_details = '';
if(empty($_GET['id'])) {
    echo "Something may have gone wrong. Did you provide all the correct information?";
} else {
    $requested_account_details = Account::find_by_id($_GET['id']);
    $account_types = Account_Type::find_all();
}

if(isset($_POST['update_account'])) {
    if($requested_account_details) {
        $requested_account_details->account_type_id = $_POST['account_type_id'];
        $requested_account_details->account_title = $_POST['account_title'];
        $requested_account_details->url = $_POST['url'];
        $requested_account_details->username = $_POST['username'];
        $requested_account_details->password = $_POST['password'];
        $requested_account_details->notes = $_POST['notes'];
        $requested_account_details->tags = $_POST['tags'];

        $requested_account_details->save();
        $session->message("The account has been updated.");
        redirectUser('manage_accounts.php');
    }
} elseif (isset($_POST['cancel'])) {
    redirectUser('manage_accounts.php');
}
?>

<!-- Sidenav -->
<?php include("templates/side_nav.php"); ?>

<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php include("templates/top_nav.php"); ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

        <div class="container-fluid">
            <div class="header-body">
                <!-- Some Content here -->


            </div>
        </div>

    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12" style="position:relative;">
                <div class="card text-white bg-dark mb-3" style="max-width: 60rem;">

                    <div class="card-body">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Update Account</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                                    </div>
                                    <input name="account_title" class="form-control" placeholder="Account Title" type="text" value="<?php echo $requested_account_details->account_title ?>" required>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Account Type</label>
                                    <select name="account_type_id" class="form-control" id="exampleFormControlSelect1" required>
                                        <?php
                                            foreach ($account_types as $account_type) {
                                                if ($requested_account_details->account_type_id == $account_type->id) {
                                                   echo '<option value="'.$requested_account_details->account_type_id.'" selected>'.$account_type->type.'</option>';
                                                } elseif ($requested_account_details->account_type_id != $account_type->id) {
                                                    echo '<option value="'.$account_type->id.'">'.$account_type->type.'</option>';
                                                }
                                             }
                                            ?>

<!--                                        <option value="1">website</option>
                                        <option value="2">device app</option>
                                        <option value="3">desktop app</option>
                                        <option value="4">other</option>-->
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="url">URL</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-world"></i></span>
                                        </div>
                                        <input name="url" class="form-control" placeholder="URL" type="text" value="<?php echo $requested_account_details->url; ?>" required>
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
                                        <input name="username" class="form-control" placeholder="Username" type="text" value="<?php echo $requested_account_details->username; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                        </div>
                                        <input name="password" class="form-control" placeholder="Password" type="text" value="<?php echo $requested_account_details->password; ?>" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Notes</label>
                                    <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $requested_account_details->notes; ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Tags</label>
                                    <textarea name="tags" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $requested_account_details->tags; ?></textarea>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" value="update" class="btn btn-warning my-4" name="update_account">
                                <input type="submit" value="cancel" class="btn btn-info my-4" name="cancel">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>


        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
    </div>
</div>