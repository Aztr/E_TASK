var VERDAD = "TRUE";
window.onload = function(){       
    var opciones= {
        success: mostrarRespuesta
    };
    $('#form_reg_').ajaxForm(opciones) ; 
    function mostrarRespuesta (responseText){
        if(responseText.trim()=="TRUE"){
            window.location="index.php";
//alert(responseText);    
        }
        else{
            alert("Error al registrar al alumno \n verifique los datos ");    
        }                
    };
}

