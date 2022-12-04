function validaContra() {
    
    contra1 = document.getElementById("inputPassword4").value;
    
    contra2 = document.getElementById("inputPassword5").value;
    
    if(contra1 != contra2){
        
        document.getElementById("error").innerHTML = "X Las Contraseñas No Coinciden";
        return false;

    }else{
        
        return true;
    }
}