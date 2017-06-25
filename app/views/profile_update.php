<div class="container">
  <div class="row">
    <div class="col-md-6">
      <?php foreach ( $data['userDetails'] as $user) {?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" action="" method="post">
          <div class="step_one">
            <span class="badge badge-success">Step 1: Your Personal Details </span>
          </div>
            <hr>

          <div class="form-group">
            <label class="control-label col-md-3" for="name">First Name</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="first_name" id="name"  value="<?php echo $user->first_name;?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3" for="m_name">Middle Name</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="middle_name" id="m_name"  value="<?php echo $user->middle_name;?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3" for="l_name">Last Name</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="last_name" id="l_name"  value="<?php echo $user->last_name;?>" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3" for="dob">Date Of Birth</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="date_of_birth" id="dob"  value="<?php echo $user->date_of_birth;?>">
            </div>
          </div>

          <div class="form-group">
          <label class="control-label col-md-3" for="dob">Your Sex</label>
          <div class="col-md-8">
          <select class="form-control" name="gender">
            <option value="<?php echo $user->sex ?>" selected="selected"><?php echo $user->sex;?></option>
            <?php if( $user->sex == "female" ){?>
            <option value="male" >Male</option>
            <?php }
            else{?>
            <option value="female">Female</option>
            <?php }?>
          </select>
            </div>
            </div>
            <hr>

            <div class="step_one">
              <span class="badge badge-success">Step 2: Your Contact Details </span>
            </div>
              <hr>

              <div class="form-group">
                <label class="control-label col-md-3" for='country'>Country</label>
                  <div class="col-md-8">
                    <select class="form-control" name="country">
                      <option value="<?php echo $user->country;?>" selected="selected"><?php echo $user->country;?></option>
                      <?php foreach($data['countries'] as $key=>$country):
                        echo "<option value='$country'>$country</option>";
                      endforeach;
                      ?>

                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for='street_address'>Street Address</label>
                <div class="col-md-8">
                  <textarea name="address" class="form-control" id="street_address">
                    <?php echo $user->street_address;?>
                  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for='city'>City</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="city" id="city"  value="<?php echo $user->city;?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for='country'>State</label>
                  <div class="col-md-8">
                    <select class="form-control" name="state">
                      <option value="<?php echo $user->state;?>" selected="selected"><?php echo $user->state;?></option>
                      <?php foreach($data['states'] as $key=>$state):
                        echo "<option value='$state'>$state</option>";
                      endforeach;
                      ?>

                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for='phone_number'>Phone Number</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="phone_number" id="phone_number"  value="<?php echo $user->phone_number;?>">
                  <p class="help-text text-info" id="">You can pass Multiple, Seperate each with comma</p>
                </div>
              </div>

              <hr>

              <div class="step_one">
                <span class="badge badge-success">Step 3: Your Bank Details </span>
              </div>
                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3" for='account_name'>Account Name</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="account_name" id="account_name"  value="<?php echo $user->account_name;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for='account_number'>Account No.</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="account_number" id="account_number"  value="<?php echo $user->account_number;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for='country'>Bank Name</label>
                    <div class="col-md-8">
                      <select class="form-control" name="bank_name">
                        <option value="<?php echo $user->account_number;?>" selected="selected"><?php echo $user->bank_name;?></option>
                        <?php foreach($data['banks'] as $key=>$bank):
                          echo "<option value='$bank'>$bank</option>";
                        endforeach;
                        ?>

                      </select>
                    </div>
                </div>
                <?php }?>

                <div class="form-group">
                  <div class="col-md-8 col-md-offset-3">
                    <input type="submit" class="form-control" name="save_changes" id="save_changes" value="Save Changes">
                  </div>
                </div>
              </form>

      </div>

    </div>
  </div>
</div>
</div>
