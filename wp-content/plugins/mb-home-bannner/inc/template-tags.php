<?php

/*
 * function that creates template tag function 'cu_quickenquiry_button'
 * this function simply outputs basic HTML for a button which
 * has a href set to email the designated email address set on the plugin
 * options page
*/

if ( !function_exists( 'home_banner_box' ) ) {
    function home_banner_box(){
   
        ?>
        <div class="home-banner-wrap" >

         


                    <!-- owl carousel -->
          <div class="container">
                    <div class="header">
                        <h1 class="text-muted"></h1>
                    </div>
        
                    <div id="slider">
                        <ul class="slides">
                            <li class="slide slide1">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_delicious.png" style="" alt="">
                            </li>
                            <li class="slide slide2">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_sauce.png" style="" alt="">
                            </li>
                            <li class="slide slide3">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_onion.png" style="" alt="">
                            </li>
                            <li class="slide slide4">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_delicious.png" style="" alt="">
                            </li>
                            <li class="slide slide5">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_sauce.png" style="" alt="">
                            </li>
                            <li class="slide slide6">
                    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_onion.png" style="" alt="">
                            </li>
        
                         </ul>
                    </div>
        
                </div>



                <!-- banner image -->
    			<!--<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_delicious.png" style="" alt="">-->
    

              <!--<div>-->
		            <!--<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_banner_margarita.png" style="" alt="">-->
              <!--   </div>-->


    
    
    
                <!-- main heading -->
                <h1>
                    <?php echo get_option('banner_title'); ?> 
                </h1>
            
                 information content 
                <p>
                    <?php echo get_option('banner_information'); ?>
                </p>
    
    			<a class="button" href="https://mash-burger-yuzurashi.c9users.io/build-your-burger/">Build Your Burger</a>	
    			
                

        </div>
        
            <!--<script src="<?php echo get_bloginfo('template_url') ?>/js/carousel.js"></script>-->

          
        
        <?php
    }
}  

