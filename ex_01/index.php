<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<?php
// HILALISA
// https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript/50570037
// https://www.delftstack.com/fr/howto/php/how-to-generate-json-file-in-php/
// https://www.w3schools.com/php/php_superglobals_post.asp
// https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_complete

include_once "add_user.php";


$DEBUG = true;
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$nameCheck =false;
$emailCheck = false;
$passwordCheck =false;
$passwordConfirmationCheck=false;
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
} else {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
    }
    $name = test_input($_POST["name"]);
    // check length of name
    if (strlen($name) < 3 || strlen($name) > 10) {
$nameErr = "Invalid name";
$nameCheck = false;
} else {
$nameCheck = true;
}
}
echo $DEBUG ? $nameErr . "<br/>" : null;


if (empty($_POST["email"])) {
$emailErr = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
$emailCheck = false;
} else {
$emailCheck = true;
}
}

echo $DEBUG ? $emailErr . "<br/>" : null;


if (empty($_POST["password"])) {
$passwordErr = "Password is required";
} else {
if (strlen($_POST['password']) > 10 || strlen($_POST['password']) < 3) {
echo "Invalid password" . "<br/>";
$passwordCheck = false;
} else {
$passwordCheck = true;
}
}
echo $DEBUG ? $passwordErr . "<br/>" : null;


if (empty($_POST["password_confirmation"])) {
$passwordConfirmationErr = "Password confirmation is required";
} else {
if (md5($_POST["password"]) != md5($_POST["password_confirmation"])) {
echo "Invalid password confirmation" . "<br/>";
$passwordConfirmationCheck = false;
} else {
$passwordConfirmationCheck = true;
}
}

echo $DEBUG ? $passwordConfirmationErr . "<br/>" : null;


if ($nameCheck && $emailCheck && $passwordCheck && $passwordConfirmationCheck == true) {

$arr1 = array();
$arr2 = array();

foreach ($_POST as $key => $value) {
if ($key == "password" || $key == "password_confirmation") {
$arr2[$key] = hash("md5", $value, false);
} else {
$arr2[$key] = $value;
}
}

array_push($arr1, $arr2);

echo $DEBUG ? var_dump($arr1) . "<br/>" : null;

// encode array to json
$json = json_encode($arr1);
echo $DEBUG ? var_dump($json) . "<br/>" : null;

$file = 'people.json';

// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= $json;
// Write the contents back to the file
file_put_contents($file, $current);

echo $DEBUG ? exec('whoami') . "<br/>" : null;

echo $DEBUG ? "The number of bytes written are $file." . "<br/>" : null;
// add_user.php login password password_conf role
add_user($arr1);
echo "User created.";
}


?>

<form action="" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter your name" minlength="3" maxlength="10" required>
        <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Enter an email">
        <small id="emailHelpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password here ...">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmation password:</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Please confirm your password">
    </div>
    <div class="form-group">
        <input type="hidden" name="created_at" value="<?= time() ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

//$name = test_input($_POST["name"]);
//$email = test_input($_POST["email"]);
//$password = test_input($_POST["password"]);
//$password_confirmation = test_input($_POST["password_confirmation"]);

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>


</body>
</html>