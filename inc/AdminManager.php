<?php

class AdminManager {

  var $page_title = "WP Admin Options";
  var $menu_title = "WP Admin Options";
  var $capability = "manage_options";
  var $menu_slug  = "b35-admin";
  var $sets = [];

  public function __construct() {
    // register menu items
    add_action('admin_menu', array($this,'addMenuItems'));

    require(__DIR__.'/../tweaks-list.php');
    $this->sets = $sets;

    // handle $_POST data for this plugin
    $this->handleAdminUI();
  }

  public function addMenuItems() {
    add_submenu_page(
      "options-general.php",
      $this->page_title,
      $this->menu_title,
      $this->capability,
      $this->menu_slug,
      array($this, 'listOptions')
    );
  }

  public function listOptions() {
    if(!current_user_can($this->capability)) return false;
    require_once(__DIR__."/TweaksSet.php");
    ?>
    <div class="wrap">
      <h1><?php _e("Activate WordPress tweaks","b35-admin"); ?></h1>
      <form method="post" id="save_settings" action="">
        <?php
        $this->handleNotice();

        foreach($this->sets as $key => $tweak) {
          $data['set'] = new TweaksSet($key, $tweak);
          $data['set']->renderCard();
        }
        ?>
        <p class="submit">
            <input type="submit" name="b35-admin-save-tweaks" class="button-primary" value="<?php _e("Save tweaks","b35-admin"); ?>"/>
        </p>
      </form>
    </div>
    <?php
  }

  public function handleNotice() {
    if (isset($_POST['b35-admin-save-tweaks'])) {
      ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Settings saved', 'b35-admin' ); ?></p>
        </div>
      <?php
    }
  }

  public function handleAdminUI() {
    if (isset($_POST['b35-admin-save-tweaks'])) {
      // TODO: validation is insufficiently secure
      $settings = [];
      foreach($this->sets as $key => $set) {
        if(!empty($_POST[$key])) {
          foreach($_POST[$key] as $tweak=>$active) {
            if($active == "on") $settings[$key][$tweak] = true;
          }
        }
        update_option("b35_admin_settings", $settings);
      }
    }
  }
}
