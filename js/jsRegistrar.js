function validaContra() {
    
    contra1 = document.getElementById("contra1").value;
    
    contra2 = document.getElementById("contra2").value;
    
    if(contra1 != contra2){
        
        document.getElementById("error").innerHTML = "X Las Contraseñas No Coinciden";
        return false;

    }else{
        
        return true;
    }
}