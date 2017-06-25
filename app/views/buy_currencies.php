<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post" id="buy_form">
            <div class="alert alert-info">
            <?php echo do_shortcode( "[currency_rates_html_table]" );?>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" for="currency_type">Select Currency To Buy</label>
              <div class="col-md-8">
                <select class="form-control" name="currency_type" id="buy_selected_cur">
                  <option value="null" selected="selected">Select Currency</option>
                  <?php foreach ($data['currencies'] as $value) {
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
            <input type="hidden" name="order_type" value="buy_order">

            <div class="form-group">
              <label class="control-label col-md-4" for="deposit_method">Amount To Buy</label>
              <div class="col-md-8">
              <input type="text" class="form-control" name="currency_amount" id="amt_buy">
              <span class="help-text" id="">E.g Enter 50 To Buy 50USD</span>
              <p id="buy_order"></p>
              <input type="hidden" name="buy_order_total" id="total_order" value="">
              </div>
              </div>

              <input type="hidden" name="order_type" value="buy_order">

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
                    <input type="submit" class="form-control" name="submit" id="buy_currency" value="Buy e-Currency">
                    </div>
                    </div>


          </form>
            <div id="response" class=""></div>
        </div>

      </div>
    </div>
  </div>
</div>
