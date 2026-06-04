<?php

class AdminManager
{
    public $page_title = 'WP Admin Options';

    public $menu_title = 'WP Admin Options';

    public $capability = 'manage_options';

    public $menu_slug = 'b35-admin';

    public $sets = [];

    public function __construct()
    {
        // register menu items
        add_action('admin_menu', [$this, 'addMenuItems']);
        add_action('admin_init', function () {
            require __DIR__.'/../tweaks-list.php';
            $this->sets = $sets;

            // handle $_POST data for this plugin
            $this->handleAdminUI();
        });
    }

    public function addMenuItems()
    {
        add_submenu_page(
            'options-general.php',
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            [$this, 'listOptions']
        );
    }

    public function listOptions()
    {
        if (! current_user_can($this->capability)) {
            return false;
        }
        require_once __DIR__.'/TweaksSet.php';
        ?>
    <div class="wrap">
      <h1><?php _e('Activate WordPress tweaks', 'b35-admin'); ?></h1>
      <form method="post" id="save_settings" action="">
        <?php
            wp_nonce_field('b35-admin-save-tweaks');
            $this->handleNotice();

        foreach ($this->sets as $key => $tweak) {
            $data['set'] = new TweaksSet($key, $tweak);
            $data['set']->renderCard();
        }
        ?>
        <p class="submit">
            <input type="submit" name="b35-admin-save-tweaks" class="button-primary" value="<?php _e('Save tweaks', 'b35-admin'); ?>"/>
        </p>
      </form>
    </div>
    <?php
    }

    public function handleNotice()
    {
        if (isset($_POST['b35-admin-save-tweaks'])) {
            ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Settings saved', 'b35-admin'); ?></p>
        </div>
      <?php
        }
    }

    public function handleAdminUI()
    {
        if (! isset($_POST['b35-admin-save-tweaks'])) {
            return;
        }

        // Only privileged users may change settings, and only via our own form.
        if (! current_user_can($this->capability)) {
            return;
        }
        check_admin_referer('b35-admin-save-tweaks');

        // Load the canonical tweak lists so we can whitelist incoming keys.
        require __DIR__.'/../tweaks-list.php';

        $settings = [];
        foreach ($this->sets as $key => $set) {
            if (empty($_POST[$key]) || ! is_array($_POST[$key])) {
                continue;
            }

            // Allowed tweak slugs for this set, e.g. $general_list.
            $allowed = isset(${$key.'_list'}) && is_array(${$key.'_list'}) ? ${$key.'_list'} : [];

            foreach ($_POST[$key] as $tweak => $active) {
                if ($active === 'on' && isset($allowed[$tweak])) {
                    $settings[$key][$tweak] = true;
                }
            }
        }

        update_option('b35_admin_settings', $settings);
    }
}
