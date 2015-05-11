

function check(){


	sup_number = document.getElementsByName('supervisor_number')[0].value;
	
	document.getElementById('bt_submit').type = "button";

//	alert(sup_number);
	if(sup_number.indexOf("or") != -1){

		alert("* Please insert a valid supervisor number.");
	
	}else{

	if(sup_number == parseInt(sup_number,10)){
		//alert("is Int");
		if(sup_number >= 0){
			document.getElementById('bt_submit').type = "Submit";

		}else{
			alert("* Please insert a valid supervisor number.");
		}
	
	}else{
		alert("* Please insert a valid supervisor number.");
	}

	}

	
}
