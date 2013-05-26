/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    var opciones= {
        success: mostrarRespuesta 
    };
    $('#form_reg_defect').ajaxForm(opciones) ; 
    function mostrarRespuesta (responseText){
        alert("Defecto añadido");
    };
});