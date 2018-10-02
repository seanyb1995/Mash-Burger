<?php

/*
 * function that creates template tag function 'ma_product_list'
 * this function queries WP database for the staff posts and uses the WP loop
 * to output some HTML for each product with a heading and link.
*/

if ( !function_exists( 'mb_product_list' ) ) {
    function mb_product_list(){

        
        // get product posts from database
			$args = array(
				'post_type' => 'product',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			$product = new WP_Query($args);
			
		    if( $product->have_posts() ){
			    while($product->have_posts()) {
			        $product->the_post(); 
			        ?>
			        <article class="product-profile">
			            <h2>
			                <a href="<?php the_permalink(); ?>" title="View Product"><?php the_title(); ?></a>
			            </h2>
			            <?php the_content(); ?>
			        </article>
		        <?php
			    }
	    	}else{
    	    ?>
	        	<p>Sorry, we currently have no food products to list</p>
		    <?php
		  }
    }
}


/*
 * function that creates template tag function 'ma_product_list'
 * this function queries WP database for the staff posts and uses the WP loop
 * to output some HTML for each product with a heading and link.
 * A dropdown appears allowing the front-end user to filter by the category taxonomy
*/

if ( !function_exists( 'mb_product_list_withfilter' ) ) {
    function mb_product_list_withfilter(){


        // set catrgory var fron GET data
        $category = $_GET['category'];
        
        // setup empty var for the final output of our filter form
        $filter_form = "";
        
        /*
        	get a klist of terms for our category taxonomy this will
        	return each term as an array
        */
        $terms = get_terms('category');
        
        
        /*
        	if there are any terms in category then begin outputting
        	the HTML require for the form to output
        */
        if($terms){
            $filter_form .= "<form action='' method='get'>";
                $filter_form .= "<label for='category'>Filter by Category:</label>";
                $filter_form .= "<select name='category' id='category' onchange='this.form.submit()'>";
                    $filter_form .= "<option value=''>All</option>";
                    //  loop through each term and output as an <option> in a <select> dropdown
                    foreach ($terms as $term){
                        /* if the current term/category is active as a filter
                            then make that option selected in the dropdown
                        */
                        $selected = "";
                        if($category == $term->term_id){
                            $selected = "selected";
                        }
                        $filter_form .= "<option value='{$term->term_id}' $selected >{$term->name}</option>";
                    }
                $filter_form .= "</select>";
            $filter_form .= "</form>";
            
            // output the form HTML
            echo $filter_form;
        }      	
        
        
        // setup the parameters for the query
        $tax_query = "";
        
        /*
        	if category is not empty, then filter must be active
        	set var $tax_query to be used in out final WP query
        	for the product post
        */
        if( $category != "" ){
            $tax_query = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        
        
        /*
        	if var tax_query is set, create an $args var with 
        	the tax_query parameter set to filter posts by that 
        	taxonomy term.
        */
        if($tax_query){
            $args = array(
                'post_type' => 'product',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'tax_query' => $tax_query
            );
        }else{
            // else, just qyery all posts as normal (no filtering)
            $args = array(
                'post_type' => 'product',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
        }
        
            // create the query with WP_Query and store the results in $product
            $product = new WP_Query($args);
       
			
		    if( $product->have_posts() ){
			    while($product->have_posts()) {
			        $product->the_post(); 
			        ?>
			        
			        		<!-- post listing -->
                
			         <!-- food profile listing container single-->
                    <a href="<?php the_permalink();?>">
                    
			      		   <!-- food profile listing container single-->
	                        <article class="food-profile">
	                               
	                               <!-- food image -->
	                                <div class="imgcontainer">
	                				<?php if( has_post_thumbnail() ): ?>
	            	    				<?php the_post_thumbnail( 'medium', array('class' => 'img') ); 
	            	    				?>
	                				<?php endif; ?>
	                				</div>
	                			
	                                <h2 class="">
	                                     <title="View food Profile"><?php the_title();?></title>
	                                </h2>
	                                
	                            <?php the_excerpt();?>
	                            
	                        </article>
	                        <!-- end of 'food-profile single' -->
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