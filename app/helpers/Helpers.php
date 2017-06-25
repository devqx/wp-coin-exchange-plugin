<?php
/**
 * Pages Helper class
 */

 namespace app\helpers;
 use app\model\Model;

class Helpers
{


  public function __construct( Model $model )
  {
      add_action( 'wp_enqueue_scripts', array($this, 'load_assets') );
  }


  public function load_assets()
  {
    wp_enqueue_style( 'coin_bts',home_url().'/wp-content/plugins/coinExchange/public/assets/bootstrap/dist/css/bootstrap.css' , array(),'0.1.0', 'all' );
    wp_enqueue_style( 'coin_flat',home_url().'/wp-content/plugins/coinExchange/public/assets/flatUI/css/flat-ui.min.css' , array(),'0.1.0', 'all' );
    wp_enqueue_style( 'coin_css',home_url().'/wp-content/plugins/coinExchange/public/assets/css/coin.css' , array(),'0.1.0', 'all' );
    wp_deregister_script( 'jquery' );
    wp_enqueue_script('jquery', home_url().'/wp-content/plugins/coinExchange/public/assets/jquery/dist/jquery.min.js', array(), '0.1.0',true);
    wp_enqueue_script( 'bts_js',home_url().'/wp-content/plugins/coinExchange/public/assets/bootstrap/dist/js/bootstrap.min.js' , array("jquery"),'0.1.0', false);
    wp_enqueue_script( 'coin_js',home_url().'/wp-content/plugins/coinExchange/public/assets/js/coin.js' , array("jquery"),'0.1.0', false);
  }


  public function create_plugin_pages()
    {
      $created_pages = [];
      $pages_definitions = array(
        'member-register'=>array(
          'title'=>'New User Registration',
          'content'=>'[user-register]'
        ),
        'member-login'=>array(
          'title'=>'Member Login',
          'content'=>'[user-login]'
        ),

        'member-dashboard'=>array(
          'title'=>'Your Member Dashboard Area',
          'content'=>'[user-dashboard]'
        ),

        'admin-dashboard'=>array(
          'title'=>'Admin Dashboard',
          'content'=>'[admin-dashboard]'
        ),
      );
      foreach($pages_definitions as $slug=>$page):
      $check_pages = new \WP_Query('pagename='.$slug);
      if(! $check_pages->have_posts() ):
        $new_page = wp_insert_post(array(
          'post_name'=>$slug,
          'post_title'=>$page['title'],
          'post_content'=>$page['content'],
          'post_status'=>'publish',
          'ping_status'=>'closed',
          'post_type'=>'page',
          'comment_status'=>'closed'
        ));
        $created_pages[$slug] = $new_page;
        update_option('coin_pages', $created_pages);
      endif;
      endforeach;
    }

    public function sanitext_field_inputs()
    {
      foreach($_POST as $key=>$value):
        sanitize_text_field( $value );
      endforeach;
    }

    public function fetch_form_fields_value()
    {
      // grab the form values
      foreach( $_POST as $key=>$value){
        $request[$key] = $value;
      }

      return $request;

    }

    public function delete_coin_pages()

    {
      $coin_pages = get_option('coin_pages');
      foreach($coin_pages as $key=>$val){
        wp_delete_post($val);
      }
      delete_option('coin_pages');
    }


  }





 ?>
