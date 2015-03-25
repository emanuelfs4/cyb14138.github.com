

var name, reg, type, days, priority, str = "", checkedType = false,checkedDays= false, pressed = 1 ;

function check(){

	pressed ++;
	name = document.getElementsByName("name")[0].value;
	
	reg = document.getElementsByName("vehicle")[0].value;

	type = document.getElementsByName("vehicle_type");
	
	days = document.getElementsByName("days");

	priority = document.getElementById("select_priority");

	if(name.length == 0){
		str = str + "You must enter a valid Name.\n";

	}

	if(reg.length == 0){
		str = str + "You must enter a valid Vehicle Registration.\n"
	}

	for(i = 0 ; i < type.length ; i++){

		if(type[i].checked){

			checkedType = true;
		}

	}
	if(!checkedType){
		str = str + "You must select a Type.\n"
	}

	for(i = 0 ; i < days.length ; i++){

		if(days[i].checked){

			checkedDays = true;
		}

	}

	if(!checkedDays){
		str = str + "You must select at least one Day.\n"
	}

	if(priority.options[priority.selectedIndex].text == "-"){

		str = str + "You must select a valid Priority Case.";

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