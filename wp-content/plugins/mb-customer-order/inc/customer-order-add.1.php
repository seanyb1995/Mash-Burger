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
  $item = json_encode($_SESSION['order']);
  $session = session_id();
  
  echo $item;
  
  // // 3. Insert new row in database table
  // global $wpdb;
  // $wpdb->show_errors();
  // $table_name = $wpdb->prefix . "mb_customer_order";
  // $insert = $wpdb->insert(
  //   $table_name, // table
  //   array (
  //     'customer_order' => $item,
  //     'cost' => $cost,
  //     'customer_id' => $session
  //     ),
  //     array('%s', '%d', '%s') // data format
  //   );
    
  // /* 4. Check if something went wrong with the insert query
  // * and redirect back to staff post page ($referer) with message
  // */
  // if(!$insert){
  //   $msg = urlencode('Sorry, we were unable to add this to your order.');
  //   header("Location: $referer?msg=$msg");
  //   die();
  // }else{
  //   // redirect back to page with dbsa-sucess query set to 1
  //   $msg= 'The item has been added to your order.';
  //   header("Location: $referer?appointment-added=1&msg=$msg");
  // }

}

?>