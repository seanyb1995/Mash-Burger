<div class="wrap">
    
    <h1 class="wp-heading-inline"><?php_e( 'Customer Order', 'mb_customer_order' ); ?></h1>
    
    <form method="post" action="options.php">
        <?php
            global $wpdb;
            $table_name = $wpdb->prefix . "mb_customer_order";
            $rows = $wpdb->get_results("SELECT * from $table_name");
        ?>
        
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php esc_attr_e( 'ID', 'mb_customer_order' ); ?></th>
                    <th><?php esc_attr_e( 'Customer ID', 'mb_customer_order' ); ?></th>
                    <th><?php esc_attr_e( 'Name', 'mb_customer_order' ); ?></th>
                     <th><?php esc_attr_e( 'Order', 'mb_customer_order' ); ?></th>
                     <th><?php esc_attr_e( 'Cost', 'mb_customer_order' ); ?></th>
                    <th><?php esc_attr_e( 'Email', 'mb_customer_order' ); ?></th>
                    <th><?php esc_attr_e( 'Number', 'mb_customer_order' ); ?></th>
                </tr>
            </thead>
            
        <?php foreach ($rows as $row): ?>

        <tr>
          <td><?php esc_attr_e( $row->id, 'mb_customer_order' ); ?></td>
          <td><?php esc_attr_e( $row->customer_id, 'mb_customer_order' ); ?></td>
          <td><?php esc_attr_e( $row->name, 'mb_customer_order' ); ?></td>
            <td><?php esc_attr_e( $row->customer_order, 'mb_customer_order' ); ?></td>
            <td><?php esc_attr_e( $row->cost, 'mb_customer_order' ); ?></td>
          <td><?php esc_attr_e( $row->email, 'mb_customer_order' ); ?></td>
          <td><?php esc_attr_e( $row->phone_number, 'mb_customer_order' ); ?></td>
        </tr>
        
        <?php endforeach; ?>
        
        </table>
    </form>
    
</div><!--/.wrap-->