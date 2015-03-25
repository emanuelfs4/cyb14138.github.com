var xmlhttp, xmlDoc;

if ( window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
} else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.open("GET", "https://devweb2014.cis.strath.ac.uk/~aes02112/ecbcache.xml", false);

//alert(xmlhttp.open("GET", "https://devweb2014.cis.strath.ac.uk/~aes02112/ecbcache.xml", false));

xmlhttp.send();

xmlDoc = xmlhttp.responseXML;



//alert(date_json);

var strJson = "";
//alert("aqui");
var x = xmlDoc.getElementsByTagName("Cube");
var time = x[0].getElementsByTagName("Cube");
var currency = time[0].getElementsByTagName("Cube");

strJson = strJson + '{';

strJson = strJson + '"Cube":{';
strJson = strJson + '"Cube":{';

strJson = strJson + '"_time":"' + time[0].attributes[0].value + '",';

strJson = strJson + '"' + time[0].tagName + '":[';


var date_json = localStorage.getItem("date_json");

//if(date_json === "null"){
    
  //  localStorage.setItem("date_json", time[0].attributes[0].value);
    
//}else{
  //  if( (new Date(date_json).getTime()) > (new Date(time[0].attributes[0].value)).getTime() )){
    //    alert("HU33");
      //  localStorage.setItem("date_json", dates.compare((new Date(date_json), (new Date(time[0].attributes[0].value))) ));
                        
    //} else{
      //  alert("LOLO");
    //}
    
    
//}

for (var i = 0; i < currency.length; i = i + 1) {
    
        strJson = strJson + '{';
        strJson = strJson + '"_currency":"';
        strJson = strJson + currency[i].attributes[0].value;
        strJson = strJson + '",';
        strJson = strJson + '"_rate":"';
        strJson = strJson + currency[i].attributes[1].value;
        strJson = strJson + '"';
        strJson = strJson + '}';

        if ( i !== currency.length - 1){
                  strJson = strJson + ',';
        }
}
strJson = strJson + ']';
strJson = strJson + '}';
strJson = strJson + '}';
strJson = strJson + '}';
//alert(strJson);
var obj = JSON.parse(strJson);
//alert(obj.Cube.Cube.Cube[0]._currency);

localStorage.setItem("strJson", strJson);

localStorage.setItem("date_json", time[0].attributes[0].value);
//alert(obj.employees[1].firstName);





