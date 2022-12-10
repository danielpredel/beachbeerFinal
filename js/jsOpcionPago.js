function pagoSeleccionado(){
    
    let pago = document.getElementsByName("opcionPago");
    
    let seleccionado ="";
    
    for(let i=0; i<pago.length; i++) {
         
        if(pago[i].checked){
            seleccionado = pago[i].value;
            break;
        }
    }

    if(seleccionado == "Visa" || seleccionado == "Master Card" || seleccionado == "American Express"){
        //window.close();
        window.open("pagoTarjeta.php?opc="+seleccionado+"&pay=c");
        
    }else if(seleccionado == "Discover" || seleccionado == "PayPal"){
        //window.close();
        window.open("pagoTarjeta.php?opc="+seleccionado+"&pay=d");
        
    }else if(seleccionado == "visa2"){
        //window.close();
        window.open("pagoTarjeta.php?opc=Visa&pay=d"); 
        
    }else if(seleccionado == "Oxxo" || seleccionado == "7Eleven" ||  seleccionado == "Circle K"){
        //window.close();
        window.open("pagoEfectivo.php?opc="+seleccionado+"&pay=e");
    
    }else if( seleccionado == "Santander" || seleccionado == "BBVA" || seleccionado == "Citibanamex"){
             
    }        
}