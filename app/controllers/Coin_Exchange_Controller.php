<?php

namespace app\controllers;
use app\model\Model;
use app\Helpers\View;
use app\Helpers\Helpers;

class Coin_Exchange_Controller
{
  public function __construct( Model $model, View $view, Helpers $helpers )
  {
    add_filter('authenticate', array($this, 'authenticate_login'),101,3 );

    add_filter('login_redirect', array($this, 'redirect_auth_user'),110,3);

    add_shortcode( 'profile_update', array($this, 'profile_update') );

    add_shortcode( 'buy_currency', array($this, 'handle_buy_currency') );

    add_shortcode( 'sell_currency', array($this,'handle_sell_currency' ));

    add_shortcode( 'upload_docs', array($this, 'upload_docs') );

    add_shortcode( 'manage_orders', array($this, 'manage_orders') );

    add_shortcode( 'update_order_status', array($this, 'update_order_status') );

    add_shortcode( 'user_trans_history', array($this, 'get_user_trans_history') );

    add_action('wp_head', array($this, 'demo_ajax_call'));

    add_shortcode( 'check_order_status', array($this, 'check_order_status') );

    add_action('wp_ajax_process_buy_order', array($this, 'process_buy_order'));

    add_action('wp_ajax_process_sell_order', array($this, 'process_sell_order'));

    add_action('wp_ajax_check_the_order_status', array($this, 'check_the_order_status'));

    add_action('wp_ajax_get_user_info_by_mail', array($this, 'get_user_info_by_mail'));

    add_shortcode( 'admin_all_users', array($this, 'admin_all_users') );

    add_shortcode( 'a_user', array($this, 'a_user') );

    add_shortcode( 'manage_currencies', array($this, 'manage_currencies') );

    add_shortcode( 'currency_rates_html_table', array($this, 'currency_rates_html_table') );

    add_action('wp_ajax_add_update_currency', array($this, 'add_update_currency'));

    add_action('wp_ajax_update_currency', array($this, 'update_currency'));

    add_action('wp_ajax_update_status_order', array($this, 'update_status_order'));

    add_action('wp_ajax_buy_cur_exchnage_rate', array($this, 'buy_cur_exchnage_rate'));

    add_action('wp_ajax_sell_cur_exchnage_rate', array($this, 'sell_cur_exchnage_rate'));

  }

  public function authenticate_login($user, $username,$password){
     if("POST"==$_SERVER['REQUEST_METHOD']){
      if(is_wp_error( $user )){
        $error_codes = join(',',$user->get_error_codes());
        $login_url = home_url('member-login');
        $login_url = add_query_arg('login', $error_codes,$login_url );
        wp_redirect( $login_url );
        exit;
      }
    }
    return $user;
  }


  public function redirect_auth_user($redirect_to, $requested_redirect_to,$user){
    if(! $user->ID){
      $requested_redirect_to = home_url();
    }
    $requested_redirect_to = home_url('member-dashboard');

    return $requested_redirect_to;

  }

  public function profile_update(){
    $current_user = wp_get_current_user();
    $user_email = $current_user->user_email;
    $data['countries'] = Model::CountriesListAll();
    $data['states'] = Model::StatesListAll();
    $data['banks'] = Model::ngBanksList();
    $data['userDetails'] = Model::get_user_details();
    view::loadView('profile_update', $data);

    //when a post request is sent

    $request = Helpers::fetch_form_fields_value();

    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $middle_name = $request['middle_name'];
    $state = $request['state'];
    $city = $request['city'];
    $phone_number = $request['phone_number'];
    $street_address = $request['address'];
    $dob = $request['date_of_birth'];
    $gender = $request['gender'];
    $country = $request['country'];
    $account_name = $request['account_name'];
    $account_number = $request['account_number'];
    $bank_name = $request['bank_name'];

  if(isset($_POST['save_changes']) && $_POST['save_changes']=="Save Changes"){
    global $wpdb;
    $update = "UPDATE wp_coin_exchange_users SET
    first_name='$first_name',
    last_name='$last_name',
    middle_name='$middle_name',
    state='$state',
    phone_number='$phone_number',
    street_address='$street_address',
    date_of_birth='$dob',
    sex='$gender',
    country='$country',
    account_name='$account_name',
    account_number='$account_number',
    bank_name = '$bank_name'
    WHERE email='$user_email'";

    $update_response = $wpdb->query($update);
  wp_redirect( home_url('member-dashboard') );
  }


}



  public function handle_buy_currency($data){

    $data['currencies'] = Model::currencies();
    View::loadView('buy_currencies', $data);

  }

  public function process_buy_order(){

    $request = [];
  foreach($_POST['postd'] as $key=>$val){
    $request[$val['name']] = $val['value'];
  }
  global $wpdb;
  //var_export($request);
  $current_user = wp_get_current_user();
  $user_email = $current_user->user_email;
  //user_name =
  $display_name = $current_user->display_name;
  $cur_type = $request['currency_type'];
  $deposit_method = $request['deposit_method'];
  $cur_amount = $request['currency_amount'];
  $order_total = $request['buy_order_total'];
  $account_name = $request['account_name'];
  $cur_account = $request['currency_account'];
  $account_number = $request['currency_account'];
  $order_type = $request['order_type'];
  $order_id = "Coin_Exchange_".rand(98829290, 999003030);

  //var_export($request);

  $data = [
    'order_type'=>$order_type,
    'order_id'=>$order_id,
    'order_date'=>current_time( 'mysql'),
    'currency_type'=>$cur_type,
    'payment_method'=>$deposit_method,
    'amount'=>$cur_amount,
    'order_status'=>'processing',
    'order_placed_by'=>$user_email,
    'is_verified'=>0,
    'order_total'=>$order_total,
    'account_name'=>$account_name,
    'account_number'=>$account_number,

  ];

  //save the order and genearate an order reference to check the order status
  $save_order = Model::save_new_order($data);
  if($save_order==TRUE){
    echo "<div class='alert alert-success'>Your Order Has been Placed and is processing, for tracking, check the order status with the order ID : $order_id . </div>";
  }
  else{
    echo "<div class='alert alert-danger'>Your Order Has Not been Placed.</div>";
    var_export($wpdb);
  }

  //send mail to the user
  $to = $user_email;
  $subject = "New Order Notification from".get_bloginfo( 'name') .'\n';
  $message = "Dear $display_name". '\n';
  $message.= "You just placed an order on our site which is being process, details are below:".'\n';
  $message.= "e-Currency Type: $cur_type".'\n';
  $message.= "Amount : $cur_amount".'USD'.'\n';
  $message.= "Buy Order Total : $order_total ".'\n';
  $message.= "Payment Instruction : Please Pay to:".'\n';
  $message.= "Account Name : COIN EXCHANGE ".'\n';
  $message.= "Account Number : 908746521".'\n';
  $message.= "Bank : GTB";

  //send order Notification email
  wp_mail( $to, $subject, $message, array() );

  exit();

  }

//handle sell order

  public function handle_sell_currency($data){

    $data['currencies'] = Model::currencies();
    View::loadView('sell_currency', $data);
}

public function process_sell_order()
{

  $request = [];
  foreach($_POST['postd'] as $key=>$val){
    $request[$val['name']] = $val['value'];
  }
  global $wpdb;
  //var_export($request);
  //die();
  $current_user = wp_get_current_user();
  $user_email = $current_user->user_email;
  //user_name =
  $display_name = $current_user->display_name;
  $cur_type = $request['currency_type'];
  $deposit_method = $request['deposit_method'];
  $cur_amount = $request['currency_amount'];
  $order_total = $request['buy_order_total'];
  $account_name = $request['account_name'];
  $cur_account = $request['currency_account'];
  $account_number = $request['currency_account'];
  $order_type = $request['order_type'];
  $order_id = "Coin_Exchange_".rand(98829290, 999003030);

  //var_export($request);

  $data = [
    'order_type'=>$order_type,
    'order_id'=>$order_id,
    'order_date'=>current_time( 'mysql'),
    'currency_type'=>$cur_type,
    'payment_method'=>$deposit_method,
    'amount'=>$cur_amount,
    'order_status'=>'processing',
    'order_placed_by'=>$user_email,
    'is_verified'=>0,
    'order_total'=>$order_total,
    'account_name'=>$account_name,
    'account_number'=>$account_number,

  ];

  //save the order and genearate an order reference to check the order status
  $save_order = Model::save_new_order($data);
  if($save_order==TRUE){
    echo "<div class='alert alert-success'>Your Order Has been Placed and is processing, for tracking, check the order status with the order ID : $order_id . </div>";
  }

  //send mail to the user
  $to = $user_email;
  $headers[]= 'From: COIN EXCHANGE <noreply@coinexchange.com>';
  $subject = "New Order Notification from".get_bloginfo( 'name') .'\n';
  $message = "Dear $display_name". '\n';
  $message.= "You just placed an order on our site which is in process, details are below:".'\n';
  $message.= "e-Currency Type: $cur_type".'\n';
  $message.= "Amount : $cur_amount".'USD' .'\n';
  $message.= "Sell Order Total : $order_total ".'\n';


  //send order Notification email
  wp_mail( $to, $subject, $message, $headers );

  exit();

  }


  public function upload_docs($data){
    View::loadView('upload_documents', $data);
  }

  public function check_order_status($data){
    View::loadView('check_order_status', $data);
  }
  
public function check_the_order_status($orderID){
  $orderID = $_POST['orderID'];
  $status = Model::check_order_status($orderID);
  echo $status;

  exit;
}

  public function demo_ajax_call()
  {
    $ajaxurl = admin_url( 'admin-ajax.php' );
      echo "<script>
      var ajaxurl='$ajaxurl'
      </script>";
  }

  public function get_user_trans_history($data)
  {
  global $wpdb;
    $data['trans_history'] = Model::get_trans_history();
    View::loadView('transaction_history', $data);

  }

  public function admin_all_users($data){
  $data['all_users'] = Model::get_all_users();
    View::loadview('admin_all_users', $data);
  }

  public function a_user($data){
    View::loadview('a_user', $data);
  }

  public function get_user_info_by_mail($email){
  $email = $_POST['email_id'];
  $user_info = Model::get_user($email);
  foreach($user_info as $the_user){
    $full_name = $the_user->first_name .' '. $the_user->last_name;
    $email_user = $the_user->email;
    $phone_number = $the_user->phone_number;
    $sex = $the_user->sex;
    $state = $the_user->state;
    $account_number = $the_user->account_number;
    $account_name = $the_user->account_name;
    $bank_name = $the_user->bank_name;
}
  $response = "
  <div class='page-header col-md-4 alert alert-info'>
    <h3>Personal Data:</h3>

  <p> Full Name:$full_name</p>
  <p> Email: $email_user </p>
  <p> Phone Number: $phone_number </p>
  <p> Gender: $sex </p>
  <p> State: $state </p>
  </div>
  <div class='page-header col-md-4 alert alert-info'>
    <h3>Bank Account Details:</h3>

  <p> Account Number: $account_number </p>
  <p> Account Name: $account_name </p>
  <p> Bank Name: $bank_name </p>
  </div>";

  echo $response;

    exit;
  }

public function manage_currencies($data)
{
    global $wpdb;
    $rates_tbl = $wpdb->prefix.'coin_exchange_rates';
    $rates = $wpdb->get_results("SELECT * FROM $rates_tbl");
    $data['currencies'] = $rates;
    View::loadView('manage_currencies', $data);
}

public function add_update_currency(){
  $addstatus = "";
  $cur_type = $_POST['cur_name'];
  $sell_cur_rate = $_POST['selling_cur_rate'];
  $buy_cur_rate = $_POST ['buying_cur_rate'];
  $cur_available = $_POST['cur_status'];

  $add_status = Model::add_coin_currencies($cur_type, $sell_cur_rate, $buy_cur_rate, $cur_available);
  if($add_status > 0){
    $addstatus = "<div class='alert alert-success'>The currency was addedd successfully</div>";
  }
  else{
    $addstatus = "Currency was not added";
  }
  echo $addstatus;
  exit();
}

public function update_currency($cur_type, $sell_cur_rate, $buy_cur_rate, $cur_available){
  $updated_status = "";
  $cur_type = $_POST['cur_name'];
  $sell_cur_rate = $_POST['updated_sell_cur_rate'];
  $buy_cur_rate = $_POST ['updated_buy_cur_rate'];
  $cur_available = $_POST['cur_status'];

  $update_status = Model::update_coin_currencies($cur_type, $sell_cur_rate, $buy_cur_rate, $cur_available);
  if($update_status > 0){
    $updated_status = "<div class='alert alert-success'>The currency was updated successfully</div>";
  }
  else{
    $updated_status = "Currency was not Updated";
  }
  echo $updated_status;
  exit();
}

public function manage_orders($data)
{
  $data['all_orders'] = Model::fetch_orders();
  View::loadview('manage_orders', $data);
}

public function update_order_status($data){
  View::loadView('admin_update_order_status', $data);
}

public function update_status_order($order_status,$order_id)
{
  $updated_status = "";
  $order_status = $_POST['new_status'];
  $order_id = $_POST['update_ID'];
  $order_updated_status = Model::update_orders_status($order_status,$order_id);
  if($order_updated_status ==TRUE){
   $updated_status= "<div class='alert alert-success'>The order was updated successfully</div>";
  }
  else{
    $updated_status = "<div class='alert alert-danger'>The order was not updated</div>";
  }
  echo $updated_status;
  exit();
}

public function currency_rates_html_table(){

  $sn =1;
  ?>
  <p>NOTES: Current Exchange Rates:</p>
  <table class="table">
    <tr>
      <th>S/N</th><th>Currency Type</th><th>Selling Rate</th><th>Buying Rate</th><th>Available</th>
    </tr>

  <?php
  $cur_rates = [];
  global $wpdb;
  $rates_tbl = $wpdb->prefix.'coin_exchange_rates';
  $fetch_rates = "SELECT * FROM $rates_tbl";
  $the_rates = $wpdb->get_results($fetch_rates);
  //var_export($the_rates);
  foreach ($the_rates as $key => $value) {

  echo "<tr>";?>
  <td><?php echo $sn++;?></td>
  <?php echo "
  <td>$value->e_currency_type</td>
  <td>$value->sell_cur_rate</td>
  <td>$value->buy_cur_rate</td>
  <td>$value->e_is_avail</td>
  </tr>";

  }

   ?>
   </table>

   <?php
}

public function buy_cur_exchnage_rate($cur_name)
{
    $cur_name = $_POST['cur_name'];
    //echo $cur_name;
    $buy_rates = Model::get_cur_buy_rates($cur_name);
    echo $buy_rates;
    exit();
}

public function sell_cur_exchnage_rate()
{
  $cur_name = $_POST['currency_name'];
  //echo $cur_name;
  $sell_rate = Model::sell_cur_buy_rates($cur_name);
   echo $sell_rate;
  exit();
}



}

