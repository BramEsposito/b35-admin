<?php

function b35_filter_doing_it_wrong_errors($enabled, $function_name, $message, $version) {
  // TODO: only disable for a month and then re-enable
  if ($function_name === '_load_textdomain_just_in_time') {
    return false;
  }

  return $enabled;
}

add_filter("doing_it_wrong_trigger_error", "b35_filter_doing_it_wrong_errors",10,4);
