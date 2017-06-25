<?php
/**
 *
 */
namespace app\route;

use app\Helpers\Helpers;
use app\model\Model;

class Route
{

  function __construct( Helpers $helpers, Model $model )
  {
    add_action('login_form_register', array($this, 'getRegisterRoute'));

    add_action('login_form_register', array($this, 'register_form_submit'));

    add_action('login_form_login', array($this, 'getLoginRoute'));
  }

  public function getRegisterRoute(){

    if("GET"==$_SERVER['REQUEST_METHOD']):

      if( is_user_logged_in() ):
        return __("You are already logged in");
      endif;
      wp_redirect( home_url( 'member-register' ) );
    endif;
  }

  public function getLoginRoute(){

    if("GET"==$_SERVER['REQUEST_METHOD']):

      if( is_user_logged_in() ):
        return __("You are already logged in");
      endif;
      wp_redirect( home_url( 'member-login' ) );
    endif;
  }



  public function register_form_submit(){

    //check the request method for the http call to the registration form

    if("POST"==$_SERVER['REQUEST_METHOD']){

      $user_reg_url = home_url('member-register');

      //if registration is not opened , redirect back with a messageBag using query parameter

      if( ! get_option('users_can_register') ){
        $redirect_url = add_query_arg('Registration', 'closed',$user_reg_url );
      }

    else {
      //sanitize the form fields
      Helpers::sanitext_field_inputs();

      //then grab the values
      $request = Helpers::fetch_form_fields_value();

      //save the submited data
      global $wpdb;

      $table = $wpdb->prefix."coin_exchange_users";

      $user_data = array(
        'user_login'=>$request['email'],
        'user_email'=>$request['email'],
        'user_nicename'=>$request['first_name'],
        'first_name'=>$request['first_name'],
        'last_name'=>$request['last_name'],
        'user_pass'=>$request['password']
      );




      $coin_user = array(
        'first_name'=>$request['first_name'],
        'last_name'=>$request['last_name'],
        'middle_name'=>$request['middle_name'],
        'email'=>$request['email'],
        'password'=>md5($request['password']),
        'date_of_birth'=>$request['date_of_birth'],
        'sex'=>$request['sex'],
        'country'=>$request['country'],
        'street_address'=>$request['street_address'],
        'city'=>$request['city'],
        'state'=>$request['state'],
        'phone_number'=>$request['phone_number'],
        'account_name'=>$request['account_name'],
        'account_number'=>$request['account_number'],
        'bank_name'=>$request['bank_name'],
        'security_question'=>$request['security_question'],
        'security_answer'=>$request['security_answer']

      );

      $columns = [];
      $values = [];

      foreach($coin_user as $key=>$val){
        $columns[] = $key;
        $values[] = "'$val'";
      }
      $user_error = Model::insertUser($user_data);

      if(is_wp_error( $user_error )){
        $registe_url = home_url('member-register');
      $redirect_url = add_query_arg('Registration' ,'errors',$registe_url );

      }

      $user_saved = Model::registerCoinUser($table, $coin_user,$columns,$values);

      if( $user_saved == "User Added Successfuly"){  
          $reg_url = home_url('member-login');
          $redirect_url = add_query_arg('Registration','successful',$reg_url);
        }

      }
    }

      return wp_safe_redirect( $redirect_url );
}

}



?>
