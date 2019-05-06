<?php


require_once("./includes/init.php");

// this is called because we will be using redirection in the project. ?????
// ob_start() is a predefined function in php and it deals with output buffering.
ob_start();


if($session->isSignedIn()) {
    redirectUser("index.php");
}

if(isset($_POST['submit'])) {

    //find better way to clean data?????
    //example: mysqli_escape_string  ???
    // trim() only removes blank spaces

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //Method to check the db user
    $user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirectUser("index.php");
    } else {
        $the_message = "Your password or username are incorrect";
    }

    } else {
        // why do we need to declare empty string?????
        // instructor we need to neutralize variable so that we don't get
        // undeclared message error
        $the_message = "";
        $username = "";
        $password = "";
    }


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign In - Password Manager</title>


    <!-- Custom styles for this template -->
    <link href="./css/styles.css" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body class="login text-center">


<div class="container">
    <form class="form-signin" method="post">
        <?php
            if ($the_message != "") {
               echo "<div class='alert alert-warning' role='alert'>".$the_message."</div>";
            }
        ?>

        <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only">Email address</label>
        <input value="<?php echo htmlentities($username); ?>" name="username" type="text" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input value="<?php echo htmlentities($password); ?>" name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>


</body>
</html>
