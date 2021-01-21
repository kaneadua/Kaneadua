function boldweight(){
	var x=document.getElementById('body_content');
   x.style.fontWeight='bold';
   document.getElementById('b').style.background='grey';
}
function normalweight(){
	var x=document.getElementById('body_content');
	x.style.fontWeight='normal';
	document.getElementById('b').style.background='white';
}
function italicstyle(){
		var x=document.getElementById('body_content');
		x.style.fontStyle='italic';
		document.getElementById('i').style.background='grey';
		
	}
function normalstyle(){
		var x=document.getElementById('body_content');
		x.style.fontStyle='normal';
		document.getElementById('i').style.background='white';
	}
	function underline(){
		var x=document.getElementById('body_content');
		x.style.textDecoration='underline';
		document.getElementById('u').style.background='grey';
	}
	function underlinenone(){
		var x=document.getElementById('body_content');
		x.style.textDecoration='none';
		document.getElementById('u').style.background='white';
	}
