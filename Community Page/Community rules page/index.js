function show(){
			var x=document.getElementById('show-hide');
			if(x.style.display==="none"){
				x.style.display="block";
				document.getElementById('change').innerHTML='[Hide]';
			}else{
				x.style.display="none"
				document.getElementById('change').innerHTML='[Show]';
			}

		}