<?php

/**
 *
 */

 namespace app\model;

class Model
{

  public function __construct()
  {
      //require_once(ABSPATH .'/wp-admin/includes/upgrade.php');
  }

  public function  create_db_tables()

  {
    require_once(ABSPATH .'/wp-admin/includes/upgrade.php');
    global $wpdb;
    $prefix = $wpdb->prefix;
    $charset = $wpdb->get_charset_collate();
    $users_table = $prefix . 'coin_exchange_users';
    $orders_table = $prefix. 'coin_exchange_orders';
    $sql = "CREATE TABLE $users_table (
      id int(55) NOT NULL AUTO_INCREMENT,
      first_name varchar(55) NOT NULL DEFAULT '',
      middle_name varchar(55) NOT NULL DEFAULT '',
      last_name varchar(55) NOT NULL DEFAULT '',
      email varchar(55) NOT NULL DEFAULT '',
      password varchar(255) NOT NULL DEFAULT '',
      date_of_birth varchar(55) NOT NULL DEFAULT '',
      sex varchar(55) NOT NULL DEFAULT '',
      country varchar(55) NOT NULL DEFAULT '',
      street_address varchar(55) NOT NULL DEFAULT '',
      city varchar(55) NOT NULL DEFAULT '',
      state varchar(55) NOT NULL DEFAULT '',
      created_at datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
      phone_number varchar(255) NOT NULL,
      account_name varchar(255) NOT NULL,
      account_number varchar(255) NOT NULL,
      bank_name varchar(255) NOT NULL,
      security_question varchar(255) NOT NULL,
      security_answer varchar(255) NOT NULL,
      PRIMARY KEY  (id)
    ) $charset;";

    dbdelta( $sql);

  }

  public function  create_tbl_rates()

  {
    require_once(ABSPATH .'/wp-admin/includes/upgrade.php');
    global $wpdb;
    $prefix = $wpdb->prefix;
    $charset = $wpdb->get_charset_collate();
    $rates_table = $prefix. 'coin_exchange_rates';
    $sql = "CREATE TABLE $rates_table (
      id int(55) NOT NULL AUTO_INCREMENT,
      e_currency_type varchar(55) NOT NULL DEFAULT '',
      buy_cur_rate varchar(55) NOT NULL DEFAULT '',
      sell_cur_rate varchar(55) NOT NULL DEFAULT '',
      e_is_avail varchar(55) NOT NULL DEFAULT '',

      PRIMARY KEY  (id)
    ) $charset;";

    dbdelta( $sql);

  }

  public function create_orders_table()
  {
    require_once(ABSPATH .'/wp-admin/includes/upgrade.php');
          global $wpdb;
          $prefix = $wpdb->prefix;
          $orders_table = $prefix. 'coin_exchange_orders';
          $sql = "CREATE TABLE $orders_table (
            id int(9) NOT NULL AUTO_INCREMENT,
            order_id varchar(55) NOT NULL DEFAULT '',
            order_date varchar(55) NOT NULL DEFAULT '',
            order_type varchar(55) NOT NULL DEFAULT '',
            currency_type varchar(55) NOT NULL DEFAULT '',
            payment_method varchar(55) NOT NULL DEFAULT '',
            amount varchar(55) NOT NULL DEFAULT '',
            account_name varchar(55) NOT NULL DEFAULT '',
            account_number varchar(55) NOT NULL DEFAULT '',
            order_status varchar(55) NOT NULL DEFAULT '',
            order_placed_by varchar(55) NOT NULL DEFAULT '',
            is_verified varchar(55) NOT NULL DEFAULT '',
            order_total varchar(55) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
          ) $charset;";

          dbDelta( $sql );
  }



  public function CountriesListAll()
  {

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

return $countries;

  }

  public function StatesListAll(){

$ng_states= array('FC' => 'Abuja','AB' => 'Abia','AD' => 'Adamawa','AK' => 'Akwa Ibom','AN' => 'Anambra','BA' => 'Bauchi','BY' => 'Bayelsa',
'BE' => 'Benue','BO' => 'Borno','CR' => 'Cross River','DE' => 'Delta','EB' => 'Ebonyi','ED' => 'Edo','EK' => 'Ekiti',
'EN' => 'Enugu','GO' => 'Gombe','IM' => 'Imo','JI' => 'Jigawa','KD' => 'Kaduna','KN' => 'Kano','KT' => 'Katsina','KE' => 'Kebbi',
'KO' => 'Kogi','KW' => 'Kwara','LA' => 'Lagos','NA' => 'Nassarawa','NI' => 'Niger','OG' => 'Ogun','ON' => 'Ondo','OS' => 'Osun',
'OY' => 'Oyo','PL' => 'Plateau','RI' => 'Rivers','SO' => 'Sokoto','TA' => 'Taraba','YO' => 'Yobe','ZA' => 'Zamfara');

return $ng_states;

  }

  public function ngBanksList(){
    $banksList = array(
      'Stanbic - IBTC Bank Plc','Heritage Banking Company Ltd.','Skye Bank Plc','KeyStone Bank Plc','Guaranty Trust Bank Plc',
      'First City Monument Bank Plc','First Bank of Nigeria Plc','First Bank of Nigeria Plc','Fidelity Bank Plc','Ecobank Nigeria Plc','iamond Bank Nigeria Plc','MainStreet Bank Plc','Access Bank Nigeria Plc','Standard Chartered Bank Plc','Sterling Bank Plc','Union Bank of Nigeria Plc','United Bank For Africa Plc','Unity Bank Plc','Wema Bank Plc','Zenith Bank Plc'
    );
  return $banksList;
  }

  public function currencies(){

    global $wpdb;
    $currency_tbl = $wpdb->prefix.'coin_exchange_rates';
    $get_all_currencies = "SELECT e_currency_type FROM $currency_tbl";
    $currencies = $wpdb->get_col($get_all_currencies);
  /*$currencies = array(
    'perfect_money'=>'PERFECT MONEY USD',
    'web_money'=>'WEB MONEY USD',
    'money_bookers'=>'MONEY BOOKERS USD',
    'paypal'=>'PAYPAL USD',
    'bitcoin'=>'BITCOIN USD'
  )*/

  return $currencies;


  }

  public function insertUser($user_data){
    //insert the user into wordpress users db: wp_users and into custom tables
    $id = wp_insert_user($user_data);
    return $id;
}

public function registerCoinUser($table, $coin_user,$columns, $values )
{
  $add_message ="";

  $db_col = join(',', $columns );
  $db_val = join( ', ' , $values );
    $add_message="";
      global $wpdb;
      $table = $wpdb->prefix .'coin_exchange_users';
      $query = "INSERT INTO $table ($db_col) VALUES($db_val)";
      $exec = $wpdb->query($query);
  if($exec == false){
    $add_message = "User Not Added";
  }
  else{
    $add_message = "User Added Successfuly";
  }
  return $add_message;
}

public function get_user_details(){
  global $wpdb;
  $user_where = wp_get_current_user();
  $email = $user_where->user_email;
  $prefix = $wpdb->prefix;
  $table = $prefix. 'coin_exchange_users';
  $fetch_query = "SELECT * FROM $table WHERE email='$email'";
  $query_response = $wpdb->get_results($fetch_query);
  return $query_response;
}

public function save_new_order($data){

global $wpdb;
$table = $wpdb->prefix.'coin_exchange_orders';
if( $wpdb->insert($table, $data) > 0 ){
  return TRUE;
}


}


public function check_order_status($orderID){
  $status ="";
  global $wpdb;
  $table = $wpdb->prefix.'coin_exchange_orders';
  $query = "SELECT order_status FROM $table WHERE order_id='$orderID'";
  $check_status = $wpdb->get_var($query);
  if($check_status){
   $status = $check_status;
 }
 else{
   $status = "Sorry, We can't find any order with the Order Id Supplied";
 }

 return $status;

}
public function get_trans_history()
{
    global $wpdb;
    $cur_user = wp_get_current_user()->user_email;
    $table = $wpdb->prefix.'coin_exchange_orders';
    $query = "SELECT * FROM $table WHERE order_placed_by='$cur_user'";
    $trans_history = $wpdb->get_results($query);

    return $trans_history;
}

public function get_all_users()
{
  global $wpdb;
  $table_users = $wpdb->prefix.'coin_exchange_users';
  $query = "SELECT * FROM $table_users ";
  $all_users = $wpdb->get_results($query);
  return $all_users;
}

public function get_user($email)
{
    global $wpdb;
    $table_users = $wpdb->prefix.'coin_exchange_users';
    $query = "SELECT * FROM $table_users WHERE email='$email'";
    $the_user = $wpdb->get_results($query);
    return $the_user;

}

public function add_coin_currencies($cur_type,$sell_cur_rate,$buy_cur_rate, $cur_available){
  global $wpdb;
  $table_rates = $wpdb->prefix.'coin_exchange_rates';
  $add = "INSERT INTO $table_rates (e_currency_type,sell_cur_rate,buy_cur_rate,e_is_avail) VALUES('$cur_type', '$sell_cur_rate', '$buy_cur_rate','$cur_available')";
  $added = $wpdb->query($add);
  if($added > 0){
    return TRUE;
  }

}

public function update_coin_currencies($cur_type,$sell_cur_rate,$buy_cur_rate, $cur_available){
  global $wpdb;
  $table_rates = $wpdb->prefix.'coin_exchange_rates';
  $update = "UPDATE $table_rates SET sell_cur_rate ='$sell_cur_rate', buy_cur_rate='$buy_cur_rate', e_is_avail='$cur_available' WHERE e_currency_type ='$cur_type'";
  $updated = $wpdb->query($update);
  if($updated > 0){
    return TRUE;
  }

}

public function fetch_orders(){
  global $wpdb;
  $orders_table = $wpdb->prefix.'coin_exchange_orders';
  $query = "SELECT * FROM $orders_table";
  $all_orders = $wpdb->get_results($query);
  return $all_orders;

}

public function update_orders_status($order_status,$order_id)
{
  global $wpdb;
  $table = $wpdb->prefix.'coin_exchange_orders';
  $query = "UPDATE $table SET order_status='$order_status' WHERE order_id='$order_id'";
  $updated = $wpdb->query($query);
  if($updated > 0){
    return TRUE;
  }
}

public function get_cur_buy_rates($cur_name)
{
    global $wpdb;
    $rates_tbl = $wpdb->prefix.'coin_exchange_rates';
    $get_cur_name_and_rates = "SELECT buy_cur_rate FROM $rates_tbl WHERE e_currency_type='$cur_name' ";
    return $wpdb->get_var($get_cur_name_and_rates);

}

public function sell_cur_buy_rates($cur_name)
{
    global $wpdb;
    $rates_tbl = $wpdb->prefix.'coin_exchange_rates';
    $get_cur_name_and_rates = "SELECT sell_cur_rate FROM $rates_tbl WHERE e_currency_type='$cur_name' ";
    return $wpdb->get_var($get_cur_name_and_rates);

}


}


 ?>
