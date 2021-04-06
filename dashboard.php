<?php

include('config/db_connect.php');

if (isset($_POST['logout'])) {
    $delete_page = mysqli_real_escape_string($conn, $_POST['delete_page']);

    $sql = "DELETE FROM persons WHERE email = $delete_page";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: signup.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

// write query
$sql = 'SELECT name, email, telephone, department FROM persons';

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

// print_r($persons);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Page</title>
    <style>
        img {
            border-radius: 50%;
            height: 100px;
            width: 100px;
        }

        table {
            max-width: 500px;
            margin: 20px auto;
        }
    </style>
</head>

<!-- include header -->
<?php include('templates/header.php'); ?>

<section class="center">
    <h6>Your profile</h6><br>
    <img src="img/facePhoto.jpg" alt="profile photo">

    <!-- you can better this -->
    <!-- <div class="center">
        <?php foreach ($persons as $person) : ?>
            <p><b>Name</b></p>
            <p><?php echo htmlspecialchars($person['name']); ?></p>

            <p><b>Email</b></p>
            <p><?php echo htmlspecialchars($person['email']); ?></p>

            <p><b>Telephone</b></p>
            <p><?php echo htmlspecialchars($person['telephone']); ?></p>

            <p><b>Department</b></p>
            <p><?php echo htmlspecialchars($person['department']); ?></p>
        <?php endforeach; ?>
    </div> -->

    <table>
        <tr>
            <td>Name</td>
            <td><?php echo htmlspecialchars($person['name']); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($person['email']); ?></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><?php echo htmlspecialchars($person['telephone']); ?></td>
        </tr>
        <tr>
            <td>Department</td>
            <td><?php echo htmlspecialchars($person['department']); ?></td>
        </tr>
    </table>
    <br>

    <form action="signup.php" method="POST">
        <div class="center">
            <input type="hidden" name="delete_page" value="<?php echo $person['email']; ?>">
            <input type="submit" name="logout" value="Logout" class="btn">
        </div>
    </form><br>

</section>


<!-- include footer -->
<?php include('templates/footer.php'); ?>

</html>