$(document).ready(function() {

const form = document.getElementById('form');
const hiddenField = document.getElementById('textarea');

form.addEventListener('submit', (e) => {  
//prevent default loading when form is submitted
    e.preventDefault();
    hiddenField.value = $("#bodyB").html();
    form.submit();

});

});

function see_saw(text){
	$("#bodyB").html(text);
}



function get_topic_parser(title,author,details,date_created,number_of_replies){

   var author = '🙋🏻‍♂️ ' + author
   var date_created = '🕒 ' + date_created
   var number_of_replies = '🧛🏻‍♂️ ' + number_of_replies

   $("#title").html(title);
   $("#body").html(details);
   $("#author").html(author);
   $("#date").html(date_created);
   $("#replies").html(number_of_replies);

}

function load_replies_parser(message,replyer,date){
	var replyer = '🧛🏻‍♂️ ' + replyer;
	var date = '🕒 ' + date;

	var str = '<article class="replyers"><p id="fix">' + message + ' </p><div class="attr"><div id="author">' + replyer +'</div><div id="rep_date">' + date + '</div></div></article>';
   $("#benchmark").append(str);

}