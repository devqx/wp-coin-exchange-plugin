<div class="container">
  <div class="row">
    <div class="col-md-9">
      <table class="table table-responsive table-hover">
        <thead>
          <?php $sn = 0;
          $sn++;

          ?>
          <tr>
            <th>S/N</th> <th>full Name</th> <th>Registered Date </th><th>Email</th><th>Phone Number</th> <th>Sex</th> <th>DOB</th> <th> Street Address</th>
            <th>Country</th><th>State</th>
          </tr>

          <?php
          foreach ($data['all_users'] as $user_info) {
            echo "<tr>";?>
              <td><?php echo $sn++;?></td>
              <?php
            echo "
                <td>$user_info->first_name $user_info->last_name</td>
                <td>$user_info->created_at </td>
                <td>$user_info->email </td>
                <td>$user_info->phone_number</td>
                <td>$user_info->sex </td>
                <td>$user_info->date_of_birth </td>
                <td>$user_info->street_address </td>
                <td>$user_info->state </td>
                <td>$user_info->country </td>
            </tr>"
            ; }?>
        </thead>

        <tbody>


        </tbody>
      </table>
    </div>
  </div>
</div>
