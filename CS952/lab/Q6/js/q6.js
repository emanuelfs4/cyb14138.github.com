

var name, reg, type, days, priority, app_date, permit_date, str = "", checkedType = false,checkedDays= false, pressed = 1 ;

function check(){

	pressed ++;
	name = document.getElementsByName("name")[0].value;
	
	reg = document.getElementsByName("vehicle")[0].value;

	type = document.getElementsByName("vehicle_type");

	app_date = document.getElementsByName("application_date");

	permit_date = document.getElementsByName("permit_date");

	days = document.getElementsByName("days[]");

	priority = document.getElementById("select_priority");


//Name
	if(name.length == 0){
		str = str + "* You must enter a valid Name.\n";

	}


	

	//alert((/[A-Z]{2}[0-9]{2}\s[A-Z]{3}/.test(reg)));


//Registration

	if(reg.length == 0) {

		str = str + "* You must enter a valid Vehicle Registration.\n";
	}else{
		if(!(/[A-Z]{2}[0-9]{2}\s[A-Z]{3}/.test(reg))){
			str = str + "* You must enter a valid Vehicle Registration.\n";
		}
	}


//Applicatioon Date
	if(app_date[0].value.length == 0){
		str = str + "* You must enter a valid Application Date.\n"
	}else{
		if(checkDate(app_date[0].value) == null ){
			str = str + "* You must enter a valid Application Date.\n";
		}
	}

// Permit Date
	if(permit_date[0].value.length == 0){
		if(checkDate(app_date[0].value.length) != null ){
			permit_date[0].value = app_date[0].value;
		}else{
			str = str + "* You must enter a valid Permit Start Date.\n";
		}

	}else{
		if(checkDate(permit_date[0].value) == null){
			alert(checkDate(permit_date[0].value));
			str = str + "* You must enter a valid Permit Start Date.\n";
		}

	}

	if(checkDate(permit_date[0].value) < checkDate(app_date[0].value)){
		str = str + "* The Permit Start Date must be after the Application Date.\n";
	}

//Type of vehicle
	for(i = 0 ; i < type.length ; i++){

		if(type[i].checked){

			checkedType = true;
		}

	}
	if(!checkedType){
		str = str + "* You must select a Type.\n"
	}

//Days Selected
	for(i = 0 ; i < days.length ; i++){

		if(days[i].checked){

			checkedDays = true;
		}

	}

	if(!checkedDays){
		str = str + "* You must select at least one Day.\n"
	}

//Priority Case
	if(priority.options[priority.selectedIndex].text == "-"){

		str = str + "* You must select a valid Priority Case.";

	}	
	
	if(str.length == 0){
		document.getElementById('bt_submit').type = "Submit";
	}else{
		alert(str);

	}

	if(pressed>1){
		str = "";
	}

}




function checkDate(date){
		var timestamp=Date.parse(date);
		if (isNaN(timestamp)==false){
			return new Date(timestamp);
		}else{
			return null;
		}
}


	