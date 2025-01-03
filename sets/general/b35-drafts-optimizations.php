<?php

function b35_drafts_optimizations_add_admin_styles()
{
  echo <<<STYLE
<style>
.striped> tbody#the-list > tr:nth-child(odd).status-draft {
    background-color: #f5ece9;
}
.striped> tbody#the-list > tr:nth-child(even).status-draft {
    background-color: #fff9f6; 
}
.striped> tbody#the-list > tr.status-draft .post-state {
    color: red;
}
</style>
STYLE;
}

add_action('admin_head', 'b35_drafts_optimizations_add_admin_styles');
