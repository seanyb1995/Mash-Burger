<!-- this is for the back end of wp -->
<!-- displays information on the home page -->
<!-- brief summary of the website 'map' -->

<div class="wrap">
    
    <h1 class="wp-heading-inline"><?php _e( 'Map Page Settings', 'map' ); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            /* Setup our fields
             * so WordPress can process the form correctly
            */
            settings_fields( 'map_fields' );
            do_settings_sections( 'map_fields' );
        ?>
                
        <table class="form-table">
            
            <!-- main information input area -->
            <tr valign="top">
                <th scope="row">Insert iframe URL:</th>
                <td><input type="text" style="width: 100%; height: 100px;" name="map_information" value="<?php echo get_option('map_information'); ?>"/></td>
            </tr>

        </table>
        <!-- end of table -->
        
        <?php submit_button(); ?>
    </form>

</div><!--/.wrap -->