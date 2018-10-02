<?php

/*
 * this function simply outputs basic HTML for a button which
 * has a href set to email the designated email address set on the plugin
 * options page
*/
if ( !function_exists( 'about_info_box' ) ) {
    function about_info_box(){
        
        ?>

        
        <div class="about-info-wrap" >

            <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info1_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info1_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>
            
            <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info2_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info2_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>
        
           <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info3_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info3_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>
            
            <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info4_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info4_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>

            <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info5_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info5_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>
            
            <div class="about-info-container">
                <div class="about-info-text">
                    <h1>
                        <?php echo get_option('about_info6_title'); ?>
                    </h1>
                
                    <p>
                        <?php echo get_option('about_info6_information'); ?>
                    </p>
                </div>
                
    			<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_left.png" style="" alt="">
            </div>
         
        </div>
        <?php
    }
}  

