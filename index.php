<?php 

// connect to database

$conn = mysqli_connect('localhost' , 'pizza' , '123' , 'project_pizza');

// check connection

if (!$conn) {
    echo "connection error" . mysqli_connect_error();
}

?>

<!doctype html>
<html lang="en">

<?php include('tuts/header.php'); ?>

<?php include('tuts/footer.php'); ?>

</html>
