<?php
/**
 *
 */

 namespace app\helpers;

class View
{

  function __construct()
  {

  }
  /**
   * View Helper Function
   * @param $view_name, $data:to be based to the view
   * @since 0.1.0
   * @package Wordpress
   * @subpackage coinExchange
   */

  public function loadView($view_name, $data = array() )
  {
    //dynamically load a view when called with the right parameter passed to it

    ob_start();

    do_action('before_render_view'.$view_name);


    require_once( ABSPATH.'wp-content/plugins/coinExchange/app/views/'.$view_name.'.php' );

    do_action('after_render_view'.$view_name);

    $view = ob_get_contents();

    ob_end_clean();

    echo $view;


  }


}




 ?>
