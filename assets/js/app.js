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
require('../css/main.css');
require('select2');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

$('select').select2();

global.$ = $;
