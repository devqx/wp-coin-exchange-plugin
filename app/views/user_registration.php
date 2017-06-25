<?php if( is_user_logged_in()){wp_redirect(home_url('member-dashboard'));exit();}?>
<div class="container">
  <div class="row">
    <?php if( isset($_GET['Registration']) && !empty($_GET['Registration']) && $_GET['Registration']=="errors"){
          echo "<h3> You Have errors, Please check and make sure you provide correct Unique Information </h3>";
        }?>
    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" action="<?php echo wp_registration_url();?>" method="post">
            <div class="step_one">
              <span class="badge badge-success">Step 1: Your Personal Details </span>
            </div>
              <hr>

            <div class="form-group">
              <label class="control-label col-md-3" for="name">First Name</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="first_name" id="name" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3" for="m_name">Middle Name</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="middle_name" id="m_name" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3" for="l_name">Last Name</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="last_name" id="l_name" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3" for="email">Email</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="email" id="email" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3" for="pwd">Password</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="password" id="pwd" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3" for="dob">Date Of Birth</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="date_of_birth" id="dob" required>
              </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3" for="dob">Your Sex</label>
            <div class="col-md-8">
            <select class="form-control" name="sex">
              <option value="" selected="selected">Choose Your Sex</option>
              <option value="male" >Male</option>
              <option value="female">Female</option>
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
                        <option value="" selected="selected">Select Country</option>
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
                    <textarea name="street_address" class="form-control" id="street_address"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for='city'>City</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="city" id="city" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for='country'>State</label>
                    <div class="col-md-8">
                      <select class="form-control" name="state">
                        <option value="" selected="selected">Select state</option>
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
                    <input type="text" class="form-control" name="phone_number" id="phone_number" required>
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
                      <input type="text" class="form-control" name="account_name" id="account_name" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for='account_number'>Account No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="account_number" id="account_number" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for='country'>Bank Name</label>
                      <div class="col-md-8">
                        <select class="form-control" name="bank_name">
                          <option value="" selected="selected">Select Your Bank Name</option>
                          <?php foreach($data['banks'] as $key=>$bank):
                            echo "<option value='$bank'>$bank</option>";
                          endforeach;
                          ?>

                        </select>
                      </div>
                  </div>

                  <hr>

                  <div class="step_one">
                    <span class="badge badge-success">Step 4: Set Security Details </span>
                  </div>
                    <hr>

                    <div class="form-group">
                      <label class="control-label col-md-3" for='security_question'>Security Question</label>
                      <div class="col-md-8">
                        <select class="security_questions" name="security_question">
                          <option value="nil" selected="selected"> Please select security question </option>
                          <option value="When did you buy your first Sim Card?">When did you buy your first Sim Card</option>
                          <option value="What is your mother maiden name">What is your mother maiden name</option>
                          <option value="Who was your best teacher in secondary school">Who was your best teacher in secondary school</option>
                          <option value="What city or village were you born in">What city or village were you born in</option>
                          <option value="What is your favorite movie">What is your favorite movie</option>
                          <option value="What is the name of your first love">What is the name of your first love</option>
                          <option value="what is your favorite drink">What is your favorite drink</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for='security_answer'>Answer</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="security_answer" id="security_answer" required>
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="col-md-offset-4">I agree to terms & Conditions <input type="checkbox" class="" name="" value="" id="" required></label>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                      <input type="submit" class="form-control btn btn-success" name="submit" id="submit" value="Register">
                    </div>
                  </div>


            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
