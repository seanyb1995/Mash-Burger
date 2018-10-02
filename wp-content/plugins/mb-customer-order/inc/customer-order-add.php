<?php

/*
 * First require the wp-load.php
 * we need these in order to use wordpress
 * functions like update_post_meta
*/

session_start();

require_once('../../../../wp-load.php');

  // 1. Check if any POST data has been submitted
  if (isset($_POST['submit'])) {
  $referer = $_POST['referer'];
  $item = $_POST['item'];
  
  // 2. Create session array and push order item into array
  
  $_SESSION['single_item'] = array();
  array_push($_SESSION['single_item'], $item);
  array_push($_SESSION['order'], $_SESSION['single_item']);

  print_r($_SESSION['order']);

  // redirect back to page with dbsa-sucess query set to 1
  $msg= 'The item has been added to your order.';
  header("Location: $referer?appointment-added=1&msg=$msg");
  exit();

}

$_SESSION['order'] = array();

?>