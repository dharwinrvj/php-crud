<?php
session_start(); # to initialize a session
# init a db obj with hostname, db username, db password, db name   
$mysqli = new mysqli('localhost', 'root', 'Localhost123@', 'phpcrud') or die(mysqli_error($mysqli));
$name = '';
$location = '';
$update_rec = false;
$id = null;
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("insert into users (name,location) values ('$name','$location')") or die($mysqli->error);
    $_SESSION['message'] = "Record saved successfully";
    $_SESSION['msg_type'] = "success";
    header("location:index.php");
}
if (isset($_GET['delete'])) {
    $id = $_REQUEST['delete'];
    $mysqli->query("delete from users where id='$id'") or die($mysqli->error);
    $_SESSION['message'] = "Record deleted successfully";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
}
if (isset($_GET['edit'])) {
    $id = $_REQUEST['edit'];
    $result = $mysqli->query("select * from users where id='$id'") or die($mysqli->error);
    if (count($result) == 1) {
        $row = $result->fetch_assoc();  # local variable 
        $name = $row['name'];
        $location = $row['location'];
        $id = $row['id'];
        $update_rec = true;
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("update users set name='$name', location='$location' where id='$id'") or die($mysqli->error);
    $_SESSION['message'] = "Record updated successfully";
    $_SESSION['msg_type'] = "success";
    $id = null;
    $update_rec = false;
    header("location:index.php");
}
