<!-- this is for the back end of wp -->
<!-- displays information on the home page -->
<!-- brief summary of the website 'about' -->

<div class="wrap">
    
    <h1 class="wp-heading-inline"><?php _e( 'About Brief Page Settings', 'about_brief' ); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            /* Setup our fields
             * so WordPress can process the form correctly
            */
            settings_fields( 'about_brief_fields' );
            do_settings_sections( 'about_brief_fields' );
        ?>
                
                
        <table class="form-table">
            
            <!-- heading title input -->
            <!-- not necessary -->
            <tr valign="top">
                <th scope="row">Title:</th>
                <td><input type="text" style="width: 300px;" name="about_brief_title" value="<?php echo get_option('about_brief_title'); ?>"/></td>
            </tr>


            <!-- main information input area -->
            <tr valign="top">
                <th scope="row">Information:</th>
                <td><input type="text" style="width: 500px; height: 200px;" name="about_brief_information" value="<?php echo get_option('about_brief_information'); ?>"/></td>
            </tr>

        </table>
        <?php submit_button(); ?>
    </form>

</div><!--/.wrap -->