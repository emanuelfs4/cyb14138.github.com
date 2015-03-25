/*jslint node: true, browser: true */

//"use strict";

/* 
 * The My317View handles the side menu and the about box within the view
 * It also handles callback registration for other menu items which the 
 * controller then decides how to action.
 */

function ConvertorView() {
    
            var addMouseAndTouchUp = function (ele_ID, handler) {
                var element = document.getElementById(ele_ID),
                        f = function (f) {
                            f.preventDefault();
                            handler(f);
                            return false;
                        };
                element.addEventListener("mouseup", f, false);
                
                element.addEventListener("touchend", f, false);
                
            },
            openCloseMenu = function () {
                if (openNav) {
                    openNav = false;
                    document.getElementById("nav").className = "closedmenu";
                    
                    document.getElementById("mainsection").className = "closedmenu";
                    
                    document.getElementById("navelem").style.display = "none";
                } else {
                    openNav = true;
                    document.getElementById("nav").className = "";
                    
                    document.getElementById("mainsection").className = "";
                    
                    document.getElementById("navelem").style.display = "block";
                }
            },
                    
            showAbout = function () {
                document.getElementById("popupAbout").style.display = "block";
                
                history.pushState(null, null, "#about");
            },
            hideAbout = function () {
                document.getElementById("popupAbout").style.display = "none";
                
                if (openNav) {
                      openCloseMenu(); 
                  }
        
                },
            
            showCurrency = function () {
                document.getElementById("popupCurrency").style.display = "block";            
                history.pushState(null, null, "#currency");
             },
            
            hideCurrency = function () {
                document.getElementById("popupCurrency").style.display = "none";
                    if (openNav) {     openCloseMenu(); }
     
            },
            openNav = true;
            
             this.xmlConvertor = function(){
            var xmlhttp, xmlDoc;

            if ( window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            
            xmlhttp.open("GET", "./ecbcache.xml", false);    
            
            xmlhttp.send();
            xmlDoc = xmlhttp.responseXML;
            var strJson = "";

            var x = xmlDoc.getElementsByTagName("Cube");
            var time = x[0].getElementsByTagName("Cube");
            var currency = time[0].getElementsByTagName("Cube");

            strJson = strJson + '{';

            strJson = strJson + '"Cube":{';
            strJson = strJson + '"Cube":{';

            strJson = strJson + '"_time":"' + time[0].attributes[0].value + '",';

            strJson = strJson + '"' + time[0].tagName + '":[';

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

            localStorage.setItem("strJson", strJson);
            localStorage.setItem("date_json", time[0].attributes[0].value);
        };
        
        
         
    this.init = function () {
        
         openCloseMenu();
         
         
         //xmlConvertor();   
         
         
        //fillButtons();

        addMouseAndTouchUp("navmenu",     openCloseMenu);
        addMouseAndTouchUp("navMenuAbout", showAbout);

        addMouseAndTouchUp("popupAbout", function() {window.history.back(); });
        
            window.addEventListener("popstate", function (evt) {
        hideAbout();
        });

    addMouseAndTouchUp("currencyMenu", showCurrency);        


};
};