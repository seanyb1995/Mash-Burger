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
        <input type="hidden" name="price" value="<?php echo get_field('price') ?>">
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
            <h3>Items</h3>
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
            <h3>Cost</h3>
            <p>
            <?php 
            
            $prices = ($_SESSION['price']);
            $length = count($prices);
            
            for($i = 0; $i < $length; $i++){
                foreach($prices as $price)
                ?><td><?php echo $prices[$i][0]; ?></td><br><?php
                }
                
            ?>
            <h3>Total</h3>
            <?php
            $price = str_replace(["[", "]", '"'], "", $price);
            echo array_sum($price);
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

if ( ! function_exists( 'mb_custom_burger' ) ) {
    function mb_custom_burger() {
        
    // get ingrients posts from database
    $args = array(
        'post_type' => 'ingredient',
        'orderby' => 'menu_order',
        'order' => 'ASC'
        );
    $ingredient = new WP_Query($args);
    
		    if( $ingredient->have_posts() ){
			    while($ingredient->have_posts()) {
			        $ingredient->the_post(); 
			        ?>
	                				<?php if( has_post_thumbnail() ): ?>
	                				<div class="ingreident-container">
	            	    				<?php the_post_thumbnail( 'medium', array('class' => 'ingreident-slide') ); ?>
	            	    			</div>
	                				<?php endif; ?>
		        <?php
			    }
	    	}else{
    	    ?>
	        	<p>Sorry, we currently have no food products to list</p>
		    <?php
        }
    }
}

?>