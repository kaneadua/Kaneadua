

function showHide(){
			var button = document.getElementById('togscreen')
			var section = document.getElementById('container')

			if(section.classList.contains('fade')){
				section.classList.remove('fade')
				section.classList.add('restore')
				button.innerHTML = 'Hide'
		} else {
			section.classList.add('fade')
			section.classList.remove('restore')
			button.innerHTML = 'Show'
		}

	}

function general_discussion_topics(number){
	var a
	if(number == 0) a= 'No topic yet'
		else if (number == 1) a = number + ' topic'
			else a= number + ' topics'

	document.getElementById('topicount').innerHTML = a

   
}

function load_topics_parser(id,title,author,number_of_replies,replyer,date_replied){

  var section = document.getElementsByClassName('section-4')[0];
  var url = "example.php?article=" + id;
 	 
 /////a
  var article = document.createElement('a')
  article.setAttribute('href',url)
  article.classList.add('queries_wrapper')


////article
  var container1=document.createElement('article')
  container1.classList.add('queries')
  

////div class a
  var container2 = document.createElement('div')
  container2.setAttribute('id','a')
 
 ////div
  var container3 = document.createElement('div')
  container3.classList.add('texts')

  ////span
  var container4 = document.createElement('span')
  container4.setAttribute('id','topic_title')
  container4.appendChild(document.createTextNode(title));


  container3.appendChild(container4);
  container2.appendChild(container3);   ///class a grouped


  ////div class b
  var container5 = document.createElement('div')
  container5.setAttribute('id','b')


  //div
  var container6 = document.createElement('div')
  container6.classList.add('texts')
  container6.classList.add('normal')   


  ///span
  var container7 =document.createElement('span')
  container7.setAttribute('id','topic_replies')
  container7.appendChild(document.createTextNode(number_of_replies));

  //line break
  var break1 = document.createElement('br')

  //line break
  var break2 = document.createElement('br')


  ///span
  var container8 = document.createElement('span')
  container8.setAttribute('id','topic_author')
  container8.appendChild(document.createTextNode(author))

  container6.appendChild(container7)
  container6.appendChild(break1)
  container6.appendChild(break2)
  container6.appendChild(container8)
  container5.appendChild(container6)    ///class b grouped



  ///container class c
  var wrapper1 = document.createElement('div')
  wrapper1.setAttribute('id','c')

  //div tests
  var wrapper2 = document.createElement('div')
  wrapper2.classList.add('texts')


///span
  var wrapper3 = document.createElement('span')
  wrapper3.setAttribute('id','last_replyer')
  wrapper3.appendChild(document.createTextNode(replyer))


  ///break
  var break3 = document.createElement('br')

  //break
  var break4 = document.createElement('br')

  ///span
  var wrapper4 = document.createElement('span')
  wrapper4.setAttribute('id','last_replyer_time')
  wrapper4.classList.add('normal')
  wrapper4.appendChild(document.createTextNode(date_replied))


  wrapper2.appendChild(wrapper3)
  wrapper2.appendChild(break3)
  wrapper2.appendChild(break4)
  wrapper2.appendChild(wrapper4)

  wrapper1.appendChild(wrapper2)   ////grouped class c


  container1.appendChild(container2)
  container1.appendChild(container5)
  container1.appendChild(wrapper1)  ///grouped under article


 


 article.appendChild(container1)


  
  section.appendChild(article) ///groupings done 




}

