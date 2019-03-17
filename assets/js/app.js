/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

let $ = require('jquery');
require('bootstrap');
require('../css/app.scss');
require('../js/ws.js');
require('../js/scrollup.js');
require('../css/main.css');
require('animate.css');

require('../../node_modules/animsition/dist/css/animsition.css');
require('animsition');
require('./animsitionadd.js');

require('select2');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
require('../../public/assets/mobirise/css/mbr-additional.css');
require('../../public/assets/theme/css/style.css');
require('../../public/assets/dropdown/css/style.css');
require('../../public/assets/socicon/css/styles.css');
require('../../public/assets/tether/tether.min.css');
require('../../public/assets/web/assets/mobirise-icons/mobirise-icons.css');
require('../../public/assets/smoothscroll/smooth-scroll.js');
require('../../public/assets/touchswipe/jquery.touch-swipe.min.js');
require('../../public/assets/dropdown/js/script.min.js');
require('../../public/assets/tether/tether.min.js');
require('../../public/assets/popper/popper.min.js');
require('../../public/assets/theme/js/script.js');
require('bootstrap-notify');
/*
*Jarallax
*/
import {jarallax} from 'jarallax';

jarallax(document.querySelectorAll('.jarallax'), {
    speed: 0.2
});

global.$ = $;
$('select').select2();


$('.notify').each(function (index, elt) {
    $.notify({
        message: $(elt).data('message')
    }, {type: 'success'});
    $(elt).remove();
});