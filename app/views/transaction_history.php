<div class="container">
  <div class="row">
    <div class="col-md-6">
      <table class="table">
        <thead>
          <?php $sn = 0;
          $sn++
          ?>
          <tr>
            <th>S/N</th> <th>Order Date</th> <th>Order Type</th><th>Currency Type</th> <th>Order Amount</th> <th>Order Total</th> <th>Trans Status</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($data['trans_history'] as $trans_history):
          echo "<tr>"?>
            <td><?php echo $sn++?></td>
            <?php
            echo "<td>$trans_history->order_date</td>
            <td>$trans_history->order_type</td>
            <td>$trans_history->currency_type</td>
            <td>$trans_history->amount USD</td>
            <td>&#8358;$trans_history->order_total</td>
            <td>$trans_history->order_status</td>
          </tr>";
        endforeach;?>

        </tbody>
      </table>
    </div>
  </div>
</div>
