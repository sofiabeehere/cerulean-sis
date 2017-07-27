"use strict";

console.log("Javascript is running!");

	document.getElementById("confirm-correct").onclick=function(){
		if (document.getElementById("confirm-correct").checked = true) {
		document.getElementById('submit-application').disabled = false;
		} else {
			document.getElementById('submit-application').disabled = true;
		} 
	}