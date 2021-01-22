$(document).ready(function() {

const form = document.getElementById('form');
const hiddenField = document.getElementById('textarea');
const div = document.getElementById('body');

form.addEventListener('submit', (e) => {  
//prevent default loading when form is submitted
    e.preventDefault();
    hiddenField.value = div.innerHTML;
    form.submit();


});

});