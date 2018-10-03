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
    
  // 2. Get submitted fields & create variables
  $referer = $_POST['referer'];
  $customer_id = $_POST['mb_customer_id'];
  $orders = json_encode($_SESSION['order']);
  $cost = json_encode($_SESSION['price']);
  $session = session_id();
  
  $orders = str_replace(["[", "]", '"'], "", $orders);
  
  $cost = str_replace(["[", "]", '"'], "", $cost);
  
  $cost = array_sum($cost);

  // 3. Insert new row in database table
  global $wpdb;
  $wpdb->show_errors();
  $table_name = $wpdb->prefix . "mb_customer_order";
  $insert = $wpdb->insert(
    $table_name, // table
    array (
      'customer_order' => $orders,
      'customer_id' => $session,
      'cost' => $cost
      ),
      
      array('%s', '%s', '%d') // data format
    );
    
  /* 4. Check if something went wrong with the insert query
  * and redirect back to staff post page ($referer) with message
  */
  if(!$insert){
    $msg = urlencode('Sorry, we were unable to add this to your order.');
    header("Location: $referer?msg=$msg");
    die();
  }else{
    // redirect back to page with dbsa-sucess query set to 1
    session_destroy();
    $msg= 'The item has been added to your order.';
    header("Location: $referer?appointment-added=1&msg=$msg");
  }

}

?>