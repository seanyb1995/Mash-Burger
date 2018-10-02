<?php

/*
 * function that creates template tag function 'cu_quickenquiry_button'
 * this function simply outputs basic HTML for a button which
 * has a href set to email the designated email address set on the plugin
 * options page
*/
if ( !function_exists( 'about_brief_box' ) ) {
    function about_brief_box(){
        
        ?>
        <div class="about-brief-wrap" >

            <div class="about-brief-container">
                
                
                
                <div class="about-brief-text">
    		    	<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_solo_mega.png" style="" alt="">
                </div>
                
                <div class="about-brief-text">
                    <h1>
                        <?php echo get_option('about_brief_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_brief_information'); ?>
                    </p>
                    
		        	<a class="button" href="https://mash-burger-yuzurashi.c9users.io/about/">Learn More</a>	
                    
                </div>
                
            </div>	

        </div>
        <?php
    }
}  

