<?php

include('config/db_connect.php');

$name = $email = $password = $telephone = $department = "";
$errors = array(
    'name' => '',
    'email' => '',
    'password' => '',
    'telephone' => '',
    'department' => ''
);

if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['name']) . '<br>';
    // echo htmlspecialchars($_POST['email']) . '<br>';
    // echo htmlspecialchars($_POST['password']) . '<br>';
    // echo htmlspecialchars($_POST['telephone']) . '<br>';
    // echo htmlspecialchars($_POST['department']) . '<br>';

    // check name
    if (empty($_POST['name'])) $errors['name'] = 'Enter a name';
    else $name = $_POST['name'];

    // check email
    if (empty($_POST['email'])) $errors['email'] = 'Enter an email address';
    else $email = $_POST['email'];

    // check password
    if (empty($_POST['password'])) $errors['password'] = 'Enter a password';
    else $password = $_POST['password'];

    // check telephone
    if (empty($_POST['telephone'])) $errors['telephone'] = 'Enter a telephone number';
    else $telephone = $_POST['telephone'];

    // check department
    if (empty($_POST['department'])) $errors['department'] = 'Enter a department';
    else $department = $_POST['department'];

    if (array_filter($errors)) {
        // echo 'form is not populated';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);

        // create sql
        $sql = "INSERT INTO 
        persons(name, email, password, telephone, department) 
        VALUES('$name', '$email', '$password', '$telephone', '$department')";

        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: dashboard.php');
        } else {
            // error
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up Page</title>
</head>

<!-- include header -->
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Create an account</h4>
    <form class="white" action="signup.php" method="POST">
        <label>First name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>

        <label>Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label>Password</label>
        <input type="password" name="password" maxlength=8 minlength=8 value="<?php echo htmlspecialchars($password); ?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <label>Telephone</label>
        <input type="text" name="telephone" value="<?php echo htmlspecialchars($telephone); ?>">
        <div class="red-text"><?php echo $errors['telephone']; ?></div>

        <label>Department</label>
        <input type="text" name="department" value="<?php echo htmlspecialchars($department); ?>">
        <div class="red-text"><?php echo $errors['department']; ?></div>
        <br><br>

        <div class="center">
            <input type="submit" name="submit" value="Sign Up!" class="btn brand z-depth-0">
        </div>
    </form>

    <div class="center">
        <p>Already have an account? Click <a href="login.php">here</a>.</p>
    </div>
</section>

<!-- include footer -->
<?php include('templates/footer.php'); ?>

</html>