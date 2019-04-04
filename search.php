<?php

include("templates/header.php");

if(!$session->isSignedIn()) {
    redirectUser("login.php");
}

$searchtxt = "";

if(isset($_POST['search-for-account'])) {
    $searchtxt = $_POST['searchkeyword'];
    $search_results = Account::db_search($searchtxt);
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
                <div class="row">
                    <div class="col-3">
                        <nav class="nav nav-pills flex-column flex-sm-row">
                            <a class="flex-sm-fill text-sm-center nav-link active" href="#" data-toggle="modal" data-target="#add-account">Add Account</a>
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

                        <?php foreach ($search_results as $search_result) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $search_result->url; ?>" target="_blank" class="dont-break-out account-name"><?php echo $search_result->account_title; ?></a><i class="fas fa-edit edit-account"></i><i class="fas fa-search-plus detailed-view" data-account-id="<?php echo $search_result->id; ?>" data-toggle="modal" data-target="#account-details"></i>
                                </td>
                                <td>
                                    <?php echo $search_result->username; ?>
                                </td>
                                <td>
                                    <input type="password" id="password" class="passwordtext" value="<?php echo $search_result->password; ?>" name="password" class="form-control" data-toggle="password"><i class="showpass fas fa-eye" id="showpass"></i><i class="copypass far fa-copy"></i>
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

<?php include("includes/account_details_modal.php"); ?>
