

function check(){


	sup_number = document.getElementsByName('company')[0].value;

//	alert(sup_number);

	if(sup_number == parseInt(sup_number,10)){
		//alert("is Int");
		document.getElementById('bt_submit').type = "Submit"
	}else{
		alert("Please insert a valid area number");
	}


	
}
