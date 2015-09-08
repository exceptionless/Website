/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {

  Object.size = function(obj) {
      var size = 0, key;
      for (key in obj) {
          if (obj.hasOwnProperty(key)) size++;
      }
      return size;
  };

  $("#customize-control-shoestrap_google_webfont select").change(function() {
    var variants = $('#customize-control-shoestrap_webfonts_weight select', $(this).parent().parent().parent());
    var subsets = $('#customize-control-shoestrap_webfonts_character_set select', $(this).parent().parent().parent());
    var details = $(this).find(':selected').data('details');

    var html = '<option value="">Select font weight</option>';
    for (i = 0; i<=Object.size(details.variants); i++){
      if (details.variants[i] == null)
        continue;
      if (details.variants[i].id == variants.val()) {
        var selected = ' selected="selected"';
      } else {
        selected = "";
      }
      html += '<option value="'+details.variants[i].id+'"'+selected+'>'+details.variants[i].name+'</option>';
    }
    variants.html(html);

    var html = '<option value="">Select character set</option>';
    for (i = 0; i<=Object.size(details.subsets); i++){
      if (details.subsets[i] == null)
        continue;
      if (details.subsets[i].id == subsets.val()) {
        var selected = ' selected="selected"';
      } else {
        selected = "";
      }
      html += '<option value="'+details.subsets[i].id+'"'+selected+'>'+details.subsets[i].name+'</option>';
    }
    subsets.html(html);

  });
  // Initiate the update of the fields
  $("#customize-control-shoestrap_google_webfont select").change();

} )( jQuery );



