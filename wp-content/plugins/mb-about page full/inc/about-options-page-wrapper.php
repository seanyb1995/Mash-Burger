<!-- this is for the back end of wp -->
<!-- information inputs for the about page on site -->

<div class="wrap">
    
    <h1 class="wp-heading-inline"><?php _e( 'About Information Page Settings', 'about_info_site' ); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            /* Setup our fields
             * so WordPress can process the form correctly
            */
            settings_fields( 'about_info_fields' );
            do_settings_sections( 'about_info1_fields' );
            do_settings_sections( 'about_info2_fields' );
            do_settings_sections( 'about_info3_fields' );
            do_settings_sections( 'about_info4_fields' );
            do_settings_sections( 'about_info5_fields' );
            do_settings_sections( 'about_info6_fields' );
            

        ?>
                
                
        <table class="form-table">
            
     
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info1_title" value="<?php echo get_option('about_info1_title'); ?>"/></td>
                </tr>
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info1_information" value="<?php echo get_option('about_info1_information'); ?>"/></td>
                </tr>
        
        
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info2_title" value="<?php echo get_option('about_info2_title'); ?>"/></td>
                </tr>
    
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info2_information" value="<?php echo get_option('about_info2_information'); ?>"/></td>
                </tr>
   
   
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info3_title" value="<?php echo get_option('about_info3_title'); ?>"/></td>
                </tr>
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info3_information" value="<?php echo get_option('about_info3_information'); ?>"/></td>
                </tr>
   
   
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info4_title" value="<?php echo get_option('about_info4_title'); ?>"/></td>
                </tr>
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info4_information" value="<?php echo get_option('about_info4_information'); ?>"/></td>
                </tr>
   
   
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info5_title" value="<?php echo get_option('about_info5_title'); ?>"/></td>
                </tr>
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info5_information" value="<?php echo get_option('about_info5_information'); ?>"/></td>
                </tr>
   
   
                <!-- sub heading title input -->
                <!-- sometimes not necessary -->
                <tr valign="top">
                    <th scope="row">Sub-heading Title:</th>
                    <td><input type="text" style="width: 300px;" name="about_info6_title" value="<?php echo get_option('about_info6_title'); ?>"/></td>
                </tr>
    
                <!-- main information input area -->
                <tr valign="top">
                    <th scope="row">Information:</th>
                    <td><input type="text" style="width: 500px; height: 200px; margin-bottom:50px;" name="about_info6_information" value="<?php echo get_option('about_info6_information'); ?>"/></td>
                </tr>

        </table>
        <?php submit_button(); ?>
    </form>

</div><!--/.wrap -->