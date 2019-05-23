<?php include("templates/header.php"); ?>
<!-- Sidenav -->

<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php include("templates/top_nav.php"); ?>
    <?php include("templates/title_and_search_bar.php"); ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

        <div class="container-fluid">
            <div class="header-body">
                <!-- Some Content here -->


            </div>
        </div>

    </div>
    <!-- Page content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12" style="position:relative;">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <?php
                            if (isset($_GET['account_id']))
                            {
                                $account_id = $_GET['account_id'];
                            }

                        ?>
                        Do you really want to delete account with ID <?php echo $account_id ?>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $account_id; ?>" name="account_id">
                            <button type="submit" class="delete-accounts" name="delete_confirmed">delete</button>
                            <button>cancel</button>
                        </form>


                        <?php
                            if (!isset($_POST['delete_confirmed'])) {
                            //echo "We did not get an account ID to delete.";
                            } else {
                                $account = Account::find_by_id($_POST['account_id']);

                                if ($account) {

                                    $session->message("The account with id: {$account->id} has been deleted.");
                                    $account->delete_account();
                                    redirectUser('manage_accounts.php');
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
    </div> <!-- end Main Content ->