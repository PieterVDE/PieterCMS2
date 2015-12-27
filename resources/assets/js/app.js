window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$( document ).ready(function() {
    console.log("All loaded well. BootstrapJS tooltip version: " + $.fn.tooltip.Constructor.VERSION);
});