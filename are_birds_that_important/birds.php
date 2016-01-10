<?php

// If new post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  include '../connect.php';

  // Set variables
  $name = $_POST['name'];
  $name = $name === '' ? 'Anonymous' : $name;
  $com = $_POST['com'];
  $important = isset($_POST['birds']) ? $_POST['birds'] : 0;
  $important = $important == 1 ? 1 : 0;

  // Do not allow empty comments
  if ($com === '') {
    header('Location: .');
    exit();
  }

  // Sanitize data
  $name = mysqli_real_escape_string($con, $name);
  $com = mysqli_real_escape_string($con, $com);

  // Enter message
  $query = "INSERT INTO `birds`(`name`, `comment`, `important`) 
  VALUES ('" . $name . "','" . $com . "'," . $important . ");";
  $result = mysqli_query($con, $query);

  header('Location: .');

}  
?>