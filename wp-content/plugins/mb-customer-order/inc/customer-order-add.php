<?php

/*
 * First require the wp-load.php
 * we need these in order to use wordpress
 * functions like update_post_meta
*/

session_start();
  
  // 0. Setting Order variable and resetting single item array
  if  ( ! isset($_SESSION['order'])) {
  $_SESSION['order'] = array();
  }
  $_SESSION['single_item'] = array();
  
   // 0. Setting Price variable and resetting single price array
  if  ( ! isset($_SESSION['price'])) {
  $_SESSION['price'] = array();
  }
  $_SESSION['single_price'] = array();

require_once('../../../../wp-load.php');

  // 1. Check if any POST data has been submitted
  if (isset($_POST['submit'])) {
  $referer = $_POST['referer'];
  $item = $_POST['item'];
  $price = $_POST['price'];

  // 2. Create session array and push order item into array
  array_push($_SESSION['single_item'], $item);
  array_push($_SESSION['order'], $_SESSION['single_item']);
  
  // 3. Create session array and push order price into array
  array_push($_SESSION['single_price'], $price);
  array_push($_SESSION['price'], $_SESSION['single_price']);

/* redirect back to page with dbsa-sucess query set to 1*/
  $msg= 'The item has been added to your order.';
  header("Location: $referer?appointment-added=1&msg=$msg");
  exit();

}

?>

