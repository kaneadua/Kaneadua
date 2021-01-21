function general_discussion_topics(number){
	var a
	if(number == 0) a= 'No topic yet'
		else if (number == 1) a = number + ' topic'
			else a= number + ' topics'

	document.getElementById('GeneralDiscussion').innerHTML = a
}  ///format the results appropriately

