<?php
/**
 * Plugin Name: Coin Exchange
 * Plugin URI: http://www.devqxz.com.ng
 * Author: Oluwaseun Paul (Devx->08133884165)
 * Author URI: http://www.devqxz.com.ng
 * Version: 0.1
 * Description: Premium Wordpress plugin built for coine4xchange.com
 * License: MIT
 * Text Domain: coinexchange
 */

ob_start();


require 'vendor/autoload.php';

use app\controllers\Coin_Exchange_Controller as Controller;
use app\model\Model;
use app\helpers\View;
use app\helpers\Helpers;
use app\route\Route;


class Coin_Exchange
{


  public function __construct(Controller $controller, Model $model, View $view , Helpers $helpers, Route $route )
  {

    add_shortcode( 'user-register', array($this, 'UserRegistration') );

    add_shortcode( 'user-login', array($this, 'UserLogin') );

    add_shortcode( 'user-dashboard', array($this, 'member_dashboard') );

    add_shortcode( 'admin-dashboard', array($this, 'admin_dashboard') );


  }

  public function coin_pages()
  {

  Helpers::create_plugin_pages();

  }

  public function delete_coin_pages()
  {
      Helpers::delete_coin_pages();
  }

public function database_migrations()
{
  Model::create_db_tables();
  Model::create_orders_table();
  Model::create_tbl_rates();
}

public function enqueue_assets(){
  Helpers::load_assets();
}

public function UserRegistration( $data )

{
  $data['countries'] = Model::CountriesListAll();
  $data['states'] = Model::StatesListAll();
  $data['banks'] = Model::ngBanksList();
   View::loadView( 'user_registration', $data);

}


public function handle_register_form()
{

  Route::register_form_submit();

}

public function UserLogin($data)
{

    View::loadView('user_login', $data);
}

public function member_dashboard($data){

View::loadView('member_dashboard', $data);

}

public function admin_dashboard($data)
{
    View::loadView('admin_dashboard', $data);
}


}


//an instance of the required dependency injections

$model = new Model();
$view = new View();
$helpers = new Helpers( $model );
$route = new Route( $helpers , $model );
$controller = new Controller( $model , $view ,$helpers);

$app = new Coin_Exchange($controller , $model , $view  , $helpers , $route );


//plugin bootstraping, run service providers

register_activation_hook( __FILE__, array('Coin_Exchange', 'coin_pages') );
register_activation_hook( __FILE__, array('Coin_Exchange', 'database_migrations') );
register_deactivation_hook( __FILE__, array('Coin_Exchange', 'delete_coin_pages') );
