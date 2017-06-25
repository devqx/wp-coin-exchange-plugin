<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">
            <div class="form-group">
              <label class="control-label col-md-4" for="new_order_status">Choose Order Status</label>
              <div class="col-md-6">
              <select class="form-control" name="new_order_status" id="new_order_status">
                <option value="" selected="selected">Select New Order Status</option>
                <option value="processing">Processing</option>
                <option value="on Hold">On Hold</option>
                <option value="completed">Completed</option>

              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4" id="" for="order_ID">Provide Order ID</label>
              <div class="col-md-6">
                <input type="text" name="order_id" class="form-control" id="order_ID" placeholder="">
              </div>
            </div>

              <div class="form-group">
                <div class="col-md-offset-4 col-md-6">
                  <input type="submit" name="submit" class="form-control btn btn-primary" id="db_order_update" Value="Update Status">
                </div>
              </div>
                </form>
                <div id="status_update_response">

                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
