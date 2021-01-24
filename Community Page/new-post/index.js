$(document).ready(function() {

const form = document.getElementById('form');
const hiddenField = document.getElementById('textarea');

form.addEventListener('submit', (e) => {  
//prevent default loading when form is submitted
    e.preventDefault();
    hiddenField.value = $("#body").html();
    form.submit();


});

});

function see_saw(text){
	$("#body").html(text);
}