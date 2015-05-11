

function check(){

	company_id = document.getElementsByName('company')[0].value;


	
	document.getElementById('bt_submit').type = "button";


        if(company_id.indexOf("or") != -1){
                  alert("* Please insert a valid supervisor number.");
        }else{

		if(company_id == parseInt(company_id,10)){
			//alert("is Int");
			if(company_id >= 0){
				document.getElementById('bt_submit').type = "Submit";
			}else{
				alert("* Please insert a valid area number");
			}

		}else{
			alert("* Please insert a valid area number.");
		}
	}

	
}
