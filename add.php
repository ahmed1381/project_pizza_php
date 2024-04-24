<?php

//if (isset($_POST['submit'])) {
//    echo htmlentities($_POST['email']);
//    echo htmlentities($_POST['title']);
//    echo htmlentities($_POST['ingredients']);
//}

//if (empty($_POST["email"])) {
//    echo "Please enter your email address <br>";
//} else {
//    $email = $_POST["email"];
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        echo "Please enter a valid email address <br>";
//    }
//}
//
//if (empty($_POST["title"])) {
//    echo "Title is required <br>";
//} else {
//    $title = $_POST["title"];
//    if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
//        echo "Only letters and white space allowed<br>";
//    }
//}
//
//if (empty($_POST["ingredients"])) {
//    echo "Please enter your ingredients <br>";
//} else {
//    $ingredients = $_POST["ingredients"];
//    if (!preg_match("/^[a-zA-Z ]*$/", $ingredients)) {
//        echo "ingredients must be a comma separated list<br>";
//    }
//}

$title = $email = $ingredients = '';
$errors = array('email' => "", 'title' => "", '$ingredients' => "");

if (isset($_POST['submit'])) {

    // Check Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Please enter your email address <br>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please enter a valid email address <br>";
        }
    }

    // Check Title
    if (empty($_POST["title"])) {
        $errors['title'] = "Title is required <br>";
    } else {
        $title = $_POST["title"];
        if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
            $errors['title'] = "Only letters and white space allowed<br>";
        }
    }

    // Check Ingredients
    if (empty($_POST["ingredients"])) {
        $errors['ingredients'] = "Please enter your ingredients <br>";
    } else {
        $ingredients = $_POST["ingredients"];
        if (!preg_match("/^[a-zA-Z, ]*$/", $ingredients)) {
            $errors['ingredients'] = "ingredients must be a comma separated list<br>";
        }
    }

    if (array_filter($errors)) {
//        echo "error in the form";
    } else {
//        echo "form is valid";
        header('location: index.php');
    }

}

?>

<!doctype html>
<html lang="en">

<?php include('tuts/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form class="white" action="add.php" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"> <?php echo $errors['email']; ?></div>
        <label>Pizza title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"> <?php echo $errors['title']; ?></div>
        <label>ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"> <?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('tuts/footer.php'); ?>

</html>
