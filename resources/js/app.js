
require('./bootstrap');


window.select2 = require('select2');


$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});



