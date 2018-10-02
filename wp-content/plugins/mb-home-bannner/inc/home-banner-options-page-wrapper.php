<!-- this is for the back end of wp -->

<div class="wrap">
    
    <h1 class="wp-heading-inline"><?php _e( 'Home Banner Page Settings', 'home_banner_menu' ); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            /* Setup our fields
             * so WordPress can process the form correctly
            */
            settings_fields( 'banner_fields' );
            do_settings_sections( 'banner_fields' );
        ?>
                
                
        <table class="form-table">
            
            <!-- heading title input -->
            <tr valign="top">
                <th scope="row">Title:</th>
                <td><input type="text" style="width: 300px;" name="banner_title" value="<?php echo get_option('banner_title'); ?>"/></td>
            </tr>   


            <!-- main information input area -->
            <!-- not necessary -->
            <tr valign="top">
                <th scope="row">Announcement:</th>
                <td><input type="text" style="width: 500px; height: 200px;" name="banner_information" value="<?php echo get_option('banner_information'); ?>"/></td>
            </tr>





        </table>
        <?php submit_button(); ?>
    </form>

</div><!--/.wrap -->