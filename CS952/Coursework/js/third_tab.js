

function check(){




	year = document.getElementsByName('year')[0].value;
	
	month = document.getElementsByName('month')[0].value;
//

	str = "";
	document.getElementById("bt_submit").type = "button";

	if(year == parseInt(year,10)){
		//alert("is Int");
		//document.getElementById('bt_submit').type = "Submit"	
		if(year >=2000){
			
		}else{
			str = str + "* Please insert a valid year.\n";
		}
	}else{

		str = str + "* Please insert a valid year.\n";
		//alert("Please insert a valid area number");
	}

	if(month == parseInt(month,10)){
		//alert("is Int");
		//document.getElementById('bt_submit').type = "Submit"
		if(month >= 1 && month <= 12){
		}else{
			str = str + "* Please inser a valid month.\n";
		}	
	}else{

		str = str + "* Please insert a valid month.\n";
		//alert("Please insert a valid area number");
	}

	
	
	if(str.length != 0){
		alert(str);
	}else{
		document.getElementById('bt_submit').type = "Submit";	
	}








	
}
