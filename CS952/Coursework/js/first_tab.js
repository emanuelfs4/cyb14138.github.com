

function check(){


	area = document.getElementsByName('area')[0].value;

//	alert(sup_number);
	
	document.getElementById('bt_submit').type = "button";


        if(area.indexOf("or") != -1){

		alert("* Please insert a valid supervisor number.");

		}else{
		if(area == parseInt(area,10)){

		//alert("is Int");
		if(area >= 0){

				document.getElementById('bt_submit').type = "Submit";
			}else{
				alert("* Please insert a valid area number");
		}
		
		}else{
			alert("* Please insert a valid area number.");	
		}
	}
	
}
