window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
<<<<<<< HEAD
=======

>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

//noty
window.Noty = require("noty");