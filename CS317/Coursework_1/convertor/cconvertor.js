/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*jslint node : true, browser: true */
"use strict";


var value = document.querySelectorAll("button");
var pressed = false;
var e = document.querySelectorAll("visitorCurrency");
var i;
document.getElementById("displayCurrency").value = localStorage.getItem("id_visitorCurrency");

document.getElementById("displayValue").value = "0";


for (i = 0; i < value.length; i = i + 1) {
    value[i].onclick = function () {
        
         
        var visitorDrop = new DropDown("visitorCurrency"),
            homeDrop = new DropDown("homeCurrency"),
            bankCut = new DropDown("bankCut"),
         
       
            totalCut,
            input = document.getElementById("displayValue").value,
            btnValue = this.innerHTML;

            document.getElementById("nav").className = "closedmenu";
                document.getElementById("mainsection").className = "closedmenu";
                document.getElementById("navelem").style.display = "none";
        if (btnValue.toString().charAt(1) === 'C') {
            document.getElementById("displayValue").value = "0";

        } else if (btnValue.toString().charAt(1) === '=') {
            
            if (visitorDrop.text() !== homeDrop.text()) {
                totalCut = parseFloat(parseInt(input, 10) * (visitorDrop.value() / homeDrop.value())) -
                    parseFloat(parseInt(input, 10) * (visitorDrop.value() / homeDrop.value())) * parseFloat(bankCut.value());
            } else {
                totalCut = parseFloat(parseInt(input, 10) * (visitorDrop.value() / homeDrop.value()));

            }

            pressed = true;
            

            if (!isNaN(parseFloat(input))) {

                document.getElementById("displayValue").value = totalCut.toFixed(0);
            }



        }else if( btnValue.toString().charAt(1) === 'O'){
            document.getElementById("displayValue").value = "0";
            document.getElementById("popupCurrency").style.display = "none";
            window.history.back(); 

        } else if (btnValue === 0) {
            if (!pressed) {
                input = parseInt(input, 10).toString();
                input = input.replace(/\s/g, "");
                if (document.getElementById("displayValue").value.length === 0) {
                    document.getElementById("displayValue").value = "0";
                } else {
                    input = input + btnValue;
                    input = input.replace(/\s/g, "");
                    input = parseInt(input, 10);
                    document.getElementById("displayValue").value = input;
                }
            } else {

                document.getElementById("displayValue").value = btnValue;
                pressed = false;
            }

        } else {

            if (!pressed) {
                input = input + btnValue;

                input = input.replace(/\s/g, "");

                input = parseInt(input, 10);

                document.getElementById("displayValue").value = input;
                //document.getElementById("displayValue").scrollRight;

            } else {

                document.getElementById("displayValue").value = btnValue;
                pressed = false;
            }
        }
    };
}