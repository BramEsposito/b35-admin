<?php

class TweaksSet {
  var $name = "tweaks";
  var $data;
  var $tweaks;

  public function __construct($name, $data) {
    $this->name = $name;
    $this->data = $data;
    $this->load();
  }

  public function load() {
    require(__DIR__."/../tweaks-list.php");

    $this->tweaks = ${$this->name."_list"};

    $active = get_option("b35_admin_settings",[]);

    foreach($this->tweaks as $k => &$tweak) {
      $tweak['slug'] = $k;
      $tweak['active'] = empty($active[$this->name][$k])?false:true;
    }
  }

  public function renderCard() {
    ?>
      <div class="card">
        <h2><?php echo $this->data['title']; ?></h2>
        <hr>
          <?php
          foreach ($this->tweaks as $option) {
            $checked = "";
            if($option['active']) $checked = "checked='checked'";
            ?>
            <label><input type="checkbox" name="<?php echo $this->name."[".$option['slug']."]"; ?>" <?php echo $checked; ?>> <?php echo $option['title']; ?></label><br>
            <?php
          }
          ?>
      </div>
    <?php
  }
}
