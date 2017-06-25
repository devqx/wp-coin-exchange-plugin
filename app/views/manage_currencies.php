<div class="container">
  <div class="row">
    <div class="col-md-5">
      <h4>ADD CURRENCY </h4>
      <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-md-4" for="cur_name">Currency Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="cur_name" placeholder="">
                </div>

              </div>
              <div class="form-group">
                <label class="control-label col-md-4" for="buy_cur_rate">Buying Currency Rate</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="buy_cur_rate" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" for="sell_cur_rate">Selling Currency Rate</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="sell_cur_rate" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" for="cur_status">Status</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="cur_status" placeholder="">
                  <p class="help-text" id="">Currency Availability, 1 for available, 0 for unavailable</p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <input type="submit" class="form-control" id="add_cur" value="Add Curency">
                </div>
              </div>

            </form>

            <div id="add_status">

            </div>
        </div>

      </div>
    </div>


    <div class="col-md-5">
      <h4>UPDATE CURRENCY </h4>
      <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-md-4" for="cur_name">Currency Name</label>
                <div class="col-md-6">
                <select class="form-control" name="cur_type" id="cur_selected">
                  <option value="" selected="selected">Select Currency </option>
                  <?php foreach($data['currencies'] as $cur):
                    echo "<option value='$cur->e_currency_type'>$cur->e_currency_type</option>";
                  endforeach;
                    ?>
                </select>
                </div>

              </div>
              <div class="form-group">
                <label class="control-label col-md-4" for="">Buying Currency Rate</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="new_buy_cur_rate" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" for="">Selling Currency Rate</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="new_sell_cur_rate" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" for="cur_status">Status</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="new_cur_status" placeholder="">
                  <p class="help-text" id="">Currency Availability, 1 for available, 0 for unavailable</p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <input type="submit" class="form-control" id="update_cur" value="Update Curency">
                </div>
              </div>

            </form>

            <div id="update_status">

            </div>
        </div>

      </div>
    </div>

</div>
</div>
