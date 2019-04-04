<?php


    include("templates/header.php");

    if(!$session->isSignedIn()) {
        redirectUser("login.php");
    }

    $accounts = Account::find_all();

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
                <div class="row">
                    <div class="col-3">
                        <nav class="nav nav-pills flex-column flex-sm-row">
                            <a class="flex-sm-fill text-sm-center btn btn-default" href="#" data-toggle="modal" data-target="#add-account">Add Account</a>
        <!--                    <a class="flex-sm-fill text-sm-center nav-link" href="#">Edit Account</a>
                            <a class="flex-sm-fill text-sm-center nav-link" href="#">Delete Account</a>
                            <a class="flex-sm-fill text-sm-center nav-link disabled" href="#">Disabled</a>-->
                        </nav>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

        <?php if($message != "") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Success!</strong> <?php echo $message ?></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12" style="position:relative;">
                <div class="table-responsive">
            <table class="table align-items-center table-dark">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Account</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td>
                        <a href="<?php echo $account->url; ?>" target="_blank" class="dont-break-out account-name"><?php echo $account->account_title; ?></a>
                        <a href="edit_account.php?id=<?php echo $account->id; ?>"><i class="fas fa-edit edit-account text-white" data-toggle="tooltip" data-placement="top" title="Edit Account"></i></a>
                        <i class="fas fa-search-plus detailed-view" data-account-id="<?php echo $account->id; ?>" data-toggle="modal" data-target="#account-details" title="View Details"></i>
                        <a href="delete_account.php?account_id=<?php echo $account->id; ?>"><i class="fas fa-times text-red delete-account" title="Delete Account" style="margin-left: 10px"></i></a>
                    </td>
                    <td>
                        <?php echo $account->username; ?>
                    </td>
                    <td>
                        <input type="password" class="passwordtext" value="<?php echo $account->password; ?>" name="password" class="form-control" data-toggle="password"><i class="showpass fas fa-eye" id="showpass"></i><i class="copypass far fa-copy"></i>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
            </div>
        </div>


        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
    </div>
</div>


<!-- modals -->
<?php include("includes/add_account_modal.php"); ?>
<?php include("includes/account_details_modal.php"); ?>
<?php include("includes/edit_account_modal.php"); ?>
<?php include("includes/confirm_delete_account_modal.php"); ?>


