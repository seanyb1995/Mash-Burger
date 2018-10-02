<?php

/*
 * function that creates template tag function 'cu_quickenquiry_button'
 * this function simply outputs basic HTML for a button which
 * has a href set to email the designated email address set on the plugin
 * options page
*/
if ( !function_exists( 'map_box' ) ) {
    function map_box(){
        
        ?>
        <div class="map-wrap" >

            <div class="map-container">
                    <div class="map-text">
                      
                        <h1>OUR LOCATIONS</h1>
                        
    			          <?php echo get_option('map_information'); ?>
    			    
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.449411169767!2d115.88975161511789!3d-32.00293798121265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bc8f1c1e4ef9%3A0xd69537e182cd6a4e!2sDumas+Rd%2C+Bentley+WA+6102!5e0!3m2!1sen!2sau!4v1536551368866" width="100%" height="1000em" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    			
                    </div>  <!-- end of map-text -->
                    
        	    <a class="button" href="https://mash-burger-yuzurashi.c9users.io/find-us/">FIND YOUR CLOSEST STORE</a>	

            </div>	
        </div>
        <?php
    }
}  

