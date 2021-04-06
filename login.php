<?php

if (isset($_POST['submit'])) {
    // enter the dashboard page
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
</head>

<!-- include header -->
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Welcome!</h4>
    <form class="white" action="login.php" method="POST">
        <label>Email</label>
        <input type="text" name="email">

        <label>Password</label>
        <input type="password" name="password" maxlength=8 minlength=8>
        <br><br><br><br>

        <div class="center">
            <input type="submit" name="submit" value="Login" class="btn">
        </div>
    </form>

    <div class="center">
        <p>To create an account, click <a href="signup.php">here</a>.</p>
    </div>
</section>

<!-- include footer -->
<?php include('templates/footer.php'); ?>

</html>