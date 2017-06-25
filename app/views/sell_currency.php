<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post" id="sell_form">
            <div class="alert alert-info">
          <?php echo do_shortcode( "[currency_rates_html_table]" );?>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" for="currency_type">Select Currency To Buy</label>
              <div class="col-md-8">
                <select class="form-control" name="currency_type" id="selected_currency_sell">
                  <option value="" selected="selected">Select Currency</option>
                  <?php foreach ($data['currencies'] as $key => $value) {
                    echo "<option value='$value'>$value</option>";
                  } ?>

                </select>
              </div>

            </div>

            <div class="form-group">
              <label class="control-label col-md-4" for="deposit_method">Payment Method</label>
              <div class="col-md-8">
                <select class="form-control" name="deposit_method">
                  <option value="" selected="selected">Select Payment Receive Method</option>
                  <option value="cash_deposit" selected="selected">Cash Deposit Via Bank</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="order_type" value="sell_order">

            <div class="form-group">
              <label class="control-label col-md-4" for="deposit_method">Amount To Sell</label>
              <div class="col-md-8">
              <input type="text" class="form-control" name="currency_amount" id="amt_sell">
              <span class="help-text" id="">E.g Enter 50 To Sell 50USD</span>
              <p id="sell_order"></p>
              <input type="hidden" name="buy_order_total" id="total_sell_order" value="">
              </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" for="currency_account">Account</label>
                <div class="col-md-8">
                <input type="text" class="form-control" name="currency_account">
                <span class="help-text" id="">E.g U5590823 For Perfect Money</span>
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" for="account_name">Account Name</label>
                  <div class="col-md-8">
                  <input type="text" class="form-control" name="account_name">
                  <span class="help-text" id="">Your e-currency Account Name</span>
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                    <input type="submit" class="form-control" name="submit" id="sell_currency_btn" value="Sell e-Currency">
                    </div>
                    </div>


          </form>

          <div id="sell_response" class=""></div>
        </div>

      </div>
    </div>
  </div>
</div>
