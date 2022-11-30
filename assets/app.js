/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// Import our custom CSS
// import '../styles/styles.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap';

// start the Stimulus application
// import './bootstrap';

// Import JQuery 
const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;
 
// // ES6 Modules or TypeScript
import Swal from 'sweetalert2';
window.Swal = Swal;


