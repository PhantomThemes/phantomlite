/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="phantomlite-ads"><a href="https://phantomthemes.com/items/phantom-pro-wordpress-theme/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',phantomlite_customizer_pro_js_obj.pro));
});