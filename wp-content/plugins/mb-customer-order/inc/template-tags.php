<?php
/* 
 * function that creates template tag function 'mb_customer_add_order_button'
 * this function simply outputs basic HTML for a button which
 * adds the menu item to the customer order 
*/
session_start();

if( ! function_exists( 'mb_customer_add_order_button' ) ) {
    function mb_customer_add_order_button($post_id) {
    global $customer_order_plugin_root;
    ?>
    <form action="<?php echo $customer_order_plugin_root_url; ?>/wp-content/plugins/mb-customer-order/inc/customer-order-add.php" method="post">
        <input type="hidden" name="item" value="<?php echo get_the_title() ?>">
        <input type="hidden" name="cost" value="<?php echo get_field('price') ?>">
        <input type="hidden" name="referer" value="<?php echo get_permalink() ?>">
        <input type="submit" name="submit" value="Add To Order">
    </form>
    <?php
    }
}

if ( !function_exists( 'mb_order_docket' ) ) {
    function mb_order_docket() {
        ?>
        
        <div class="mb_order_docket_wrap">
            <p>
            <?php 
            
            $orders = ($_SESSION['order']);
            $length = count($orders);
            
            for($i = 0; $i < $length; $i++){
                foreach($orders as $order)
                ?><td><?php echo $orders[$i][0]; ?></td><br><?php
                }
                
            ?>
            </p>
            <form action="<?php echo $customer_order_plugin_root_url; ?>/wp-content/plugins/mb-customer-order/inc/customer-submit-order.php" method="post">
                <input type="hidden" name="referer" value="<?php echo get_permalink() ?>">
                <input type="submit" name="submit" value="Submit Order">
            </form>
        </div>
        
        <?php
    }
}

?>