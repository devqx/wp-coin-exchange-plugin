<div class="container">
  <div class="row">
    <?php //var_export($data['all_orders']); ?>
    <div class="col-md-9">
      <table class="table">
        <?php $sn = 1; ?>
        <thead>
          <tr>
            <th>S/N</th><th>Order ID</th><th>Order Date</th><th>Order Type</th><th>Currency Type</th><th>Amount</th><th>Order Total</th>
            <th>Order Status</th><th>Order Placed By</th>
          </tr>
            <hr>
        </thead>

        <tbody>
          <?php foreach($data['all_orders'] as $order ){
          echo "<tr>";?>
            <td><?php echo $sn++;?></td>
          <?php
          echo "<td>$order->order_id</td>
          <td>$order->order_date</td>
          <td>$order->order_type</td>
          <td>$order->currency_type</td>
          <td>$order->amount</td>
          <td>$order->order_total</td>
          <td>$order->order_status</td>
          <td>$order->order_placed_by</td>
          </tr>";
        }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
