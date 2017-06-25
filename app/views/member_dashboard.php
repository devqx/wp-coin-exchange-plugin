<?php
if(!is_user_logged_in()){
  wp_redirect(home_url('member-login'));
}
?>
<div class="row sidebar-wrapper">
    <div class="col-md-4">
      <div class="user-sidebar">

        <ul class="nav nav-tabs nav-stacked">
          <li><?php $user = wp_get_current_user();
          echo "<p> Welcome $user->user_nicename</p>
          <p>Account Status: unVerified</p>
          <a href='#verify_docs' data-toggle='tab'>Become Verified</a>
          ";
          ?></li>

          <li class="">
            <a href="#profile" data-toggle='tab' class="active">
              <button type="button" class="btn btn-block btn-dashboard">
            PROFILE SUMMARY
          </button></a></li>

          <li>
            <a href="#verify_docs" data-toggle='tab'>
              <button type="button" class="btn btn-block btn-dashboard">
            UPLOAD DOCUMENTS
          </button></a></li>

          <li><a href="#buy_currencies" data-toggle='tab'><button type="button" class="btn btn-primary btn-block btn-dashboard">
            BUY CURRENCIES
          </button></a></li>

          <li><a href="#sell_currency" data-toggle='tab'><button type="button" class="btn btn-primary btn-block btn-dashboard">
            SELL CURRENCIES
          </button></a></li>

          <li><a href="#order_status" data-toggle='tab'><button type="button" class="btn btn-primary btn-block btn-dashboard">
            ORDER STATUS
          </button></a></li>

          <li><a href="#trans_history" data-toggle='tab'><button type="button" class="btn btn-primary btn-block btn-dashboard">
            TRANSACTIONS HISTORY
          </button></a></li>

          <li><a href="<?php echo wp_logout_url();?>"><button type="button" class="btn btn-primary btn-block btn-dashboard">
            LOG OUT
          </button></a></li>

        </ul>
      </div>

    </div>

    <div class="col-md-8">

    <div class="tab-content">

      <div  id="profile" class="tab-pane fade in active">
        <h3> Welcome To Your Member Area: <?php echo $user->user_nicename;?></h3>
        <p>Your Profile Summary Is Displayed Below, Update Any If Need Be</p>
        <?php echo do_shortcode( "[profile_update]" );?>
      </div>

      <div id="verify_docs" class="tab-pane fade in">
        <h3>Upload Documents For Verification</h3>
        <p>Upload Verification Docs Instruction</p>
            <?php echo do_shortcode( "[upload_docs]" );?>
      </div>

      <div id="buy_currencies" class="tab-pane fade ">
        <h3>Fill The Buy Currency Request Form Below:</h3>

        <?php echo do_shortcode( "[buy_currency]" );?>
      </div>

      <div id="sell_currency" class="tab-pane fade ">
        <h3>Fill The Buy Currency Request Form Below:</h3>

          <?php echo do_shortcode( "[sell_currency]" );?>
      </div>

      <div id="order_status" class="tab-pane fade ">
        <h3>Supply Order ID To check Order Status</h3>

        <?php echo do_shortcode( "[check_order_status]" );?>

      </div>

      <div id="trans_history" class="tab-pane fade ">
        <h3>Your Transaction History are displayed below: </h3>

        <?php echo do_shortcode( "[user_trans_history]" );?>

      </div>


    </div>

    </div>
  </div>
</div>
