<?php
if( ! current_user_can('administrator')){
  _e("Sorry , You dont have enough permission to access this page");
  exit();
} ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills">
        <li class="active">
          <a href="#all_users" data-toggle='tab'>All Users</a>
        </li>

        <li >
          <a href="#a_user" data-toggle='tab'>Find A User</a>
        </li>

        <li >
          <a href="#manage_currencies" data-toggle='tab'>Manage Currencies</a>
        </li>


        <li >
          <a href="#manage_orders" data-toggle='tab'>All orders</a>
        </li>

        <li >
          <a href="#manage_order_status" data-toggle='tab'>Manage orders Status</a>
        </li>

        <!--<li >
          <a href="#" data-toggle='tab'>Delete Order</a>
        </li>-->
      </ul>
    </div>
    <hr>

    <div class="tab-content">
      <div class="tab-pane active fade in" id="all_users">
        <?php echo do_shortcode( "[admin_all_users]" );?>
      </div>

      <div class="tab-pane fade in" id="a_user">
        <?php echo do_shortcode( "[a_user]" );?>
      </div>

      <div class="tab-pane fade in" id="manage_currencies">
        <?php echo do_shortcode( "[manage_currencies]" );?>
      </div>

      <div class="tab-pane fade in" id="manage_orders">
        <?php echo do_shortcode( "[manage_orders]" );?>
      </div>

      <div class="tab-pane fade in" id="manage_order_status">
        <?php echo do_shortcode( "[update_order_status]" );?>
      </div>


    </div>
  </div>

</div>
