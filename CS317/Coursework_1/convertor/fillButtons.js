/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var convertorView = new ConvertorView();
convertorView.xmlConvertor();

var strJson = localStorage.getItem("strJson"),
    obj = JSON.parse(strJson),
    output = "<option id = \"EUR\" value = \"1.00\" " + ">EUR</option>";

for (var i in obj.Cube.Cube.Cube) {

    output = output + " <option id=\"" + obj.Cube.Cube.Cube[i]._currency + "\" value =\" " + obj.Cube.Cube.Cube[i]._rate + "\" >" + obj.Cube.Cube.Cube[i]._currency +"</option>";
}
document.getElementById("visitorCurrency").innerHTML = output;
document.getElementById("homeCurrency").innerHTML = output;


var setVisitor =  document.getElementById("visitorCurrency"),
    setHome = document.getElementById("homeCurrency"),
    setCut = document.getElementById("bankCut"),
    str = "";

if (localStorage.getItem("criada") === null) {

        localStorage.setItem("criada",true);
    for (var i = 0; i < setVisitor.length ; i++) {

        localStorage.setItem("criada",true); 
        if(setVisitor[i].innerHTML === "EUR"){
                localStorage.setItem ("index_visitorCurrency",i);
                localStorage.setItem ("id_visitorCurrency", setVisitor[i].innerHTML);
                localStorage.setItem ("visitorCurrency", setVisitor[i].value);

        }

        if(setHome[i].innerHTML === "GBP"){
                localStorage.setItem ("index_homeCurrency",i);
                localStorage.setItem ("id_homeCurrency", setHome[i].innerHTML);
                localStorage.setItem ("homeCurrency", setHome[i].value);
        }
    }   	  
    localStorage.setItem ("index_bankCut",0);
    localStorage.setItem ("id_backCut","0%");
    localStorage.setItem ("bankCut",0.00);
}

setCut [parseInt(localStorage.getItem("index_bankCut"))].selected = true;

setVisitor[parseInt(localStorage.getItem("index_visitorCurrency"))].selected = true;

setHome[parseInt(localStorage.getItem("index_homeCurrency"))].selected = true;  