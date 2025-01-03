document.addEventListener("keypress", function(event) {
  console.log(event);
  if (b35.e_shortcut_enabled && event.keyCode === 101) {
    if(!["INPUT","TEXTAREA","SELECT","OPTION"].includes(document.activeElement.tagName)) {
      window.location.assign(b35.edit_post_url);
      jQuery("#b35-admin-shortcuts-modal").css("display","grid");
    }
  }
});
