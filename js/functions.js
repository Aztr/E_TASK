$(document).ready(function() {
	   //alert("hey");
						   
	$('#subcontenidoCinco tr[tooltip]').each(function(){
		  //alert("2"); 
    	  $(this).qtip({
   					content: { url: 'tip.php', 
   						  data: {
							  		op: 0,
						  			id: $(this).attr('tooltip'),
									},
						  method: 'get'
   					}, 
					style: { 
				  	width: 280,
				  	color: 'black',
			      	name: 'cream', // Inherit from preset style
				  	tip: true,
			   	},
			  	 show: { 
			   			//when: { event: 'click' },
			   			effect: { 
								type: 'fade',
								length: 300,
						} 
					},
					hide: { delay: 100 }
			 		//style: 'green' // Give it a crea mstyle to make it stand out
      		});
		});

		//$("#instrucciones").hide();
  		//toggle the componenet with class msg_body
		
	    //$("#binstructions").click(function() {
		//	$("#instrucciones").slideToggle(300);
        //});
		
		$("#encabezadoUno button").click(function() {
			$("#contenidoUno").slideToggle(300);
        });
	
		$("#encabezadoDos button").click(function() {
			$("#contenidoDos").slideToggle(300);
        });

		//$("#bsiguiente").click(function() {				
		//	$("#contenidoUno").load("task01.php");
		//	$("#contenidoDos").load("result.php?op=1");			
		//});					
});  

	function oculta(){
		$("#instrucciones").slideToggle(300);
	}

	function instruction(endedtask, numberoftasks, t){
		$("#instrucciones").slideToggle(300);
	}

	function siguiente(endedtask, numberoftasks, t){	
			//endedtask=endedtask+1;
			var msg;
			if (endedtask < numberoftasks-1){
				msg = confirm("Una vez que pasas a la siguiente tarea no puedes retroceder, ¿Pasar a la siguiente tarea?");	
				if ( msg ) {
					endedtask=endedtask+1;
					//alert(task+" "+t);
					$.ajax({
   							type: "POST",
	   						url: "update_task.php",
   							data: "task="+endedtask,
   							success: function(datos){
									//alert("");
						   			$("#contenidoUno").load(t+"_task"+endedtask.toString()+".php");
									$("#contenidoDos").load(t+"_result.php?op="+endedtask.toString());
									$("#piePagina").load("footpage.php");
									$("#titleCenter").load("titletasks.php");
									$("#leftBar").load("divleft.php");
									$("#instrucciones").load("instructions.php");
									$("#instrucciones").show();
	   					   	 }
 					});
				}
			}else if ( endedtask == numberoftasks-1){

					msg = confirm("Ésta es la última tarea, una vez finalizada se cerrará la actual sesión, ¿Finalizar con esta tarea?");	
					if ( msg ) {
					endedtask=endedtask+1;
					$.ajax({
   							type: "POST",
   							url: "update_task.php",
   							data: "task="+endedtask,
	   						success: function(datos){
									//alert("");
						   			//$("#contenidoUno").load(t+"_task"+endedtask.toString()+".php");
									//$("#contenidoDos").load(t+"_result.php?op="+endedtask.toString());
									$("#piePagina").load("footpage.php");
									$("#titleCenter").load("titletasks.php");
   					   	 	}
 					});

						cerrar();

					}
			} else if (endedtask == numberoftasks){
					msg = confirm("Ésta es la última tarea, una vez finalizada se cerrará la actual sesión, ¿Finalizar con esta tarea?");	
					if ( msg ) {
						//alert("Has finalizado satisfactoriamente las tareas de esta sesión, hasta la próxima.");
						//$("#bfin").attr("disabled", true);
						cerrar();
					}
			}
	}

   	function delete_data(op, id){
		var msg = confirm("Desea eliminar este dato?");
		if ( msg ) {
			$.ajax({
				url: 'delete.php',
				type: "GET",
				data: "op="+op+"&id="+id,
				success: function(datos){
					//alert(datos);
					$("#fila-"+id).remove();
					if (op == 3 || op==6){
						$("#filat-"+id).remove();
					}
				}
			});
		}
		return false;
	}	
	
   function show_nested(op,id,t){
	   switch (op) {
			case 1:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=100&idcp="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoCuatro").html(datos);					
				}
			});	
			break;
			
			case 2:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=101&idcp="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoSeis").html(datos);					
				}
			});	
			break;
			
			case 3:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=102&idoutput="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoCuatro").html(datos);					
				}
			});	
			break;		
			case 4:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=102&idoutput="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoSeis").html(datos);					
				}
			});	
			break;	
			case 5:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=103&idcp="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoSeisa").html(datos);					
				}
			});	
			break;
			case 6:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=104&idcp="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoSeis").html(datos);					
				}
			});	
			break;
			case 7:
	   		//alert(cp_id+" "+t);
			$.ajax({
				url: t+"_result.php",
				type: "GET",
				data: "op=102&idoutput="+id,
				success: function(datos){
					//alert(cp_id);
					$("#subcontenidoSeisb").html(datos);					
				}
			});	
			break;	
	   }
		return false;
	}
	
	function insert_data(op, t){
		//alert(t);
		switch (op) {
			case 1:
			    if ( $('#ed2').attr('value').length != 0 ){
				$.ajax({
   					type: "POST",
   					url: "insert.php",
   					data: "op="+op+"&ed1="+$("input[@name='ed1']:checked").val()+"&ed2="+$('#ed2').attr('value'),
   					success: function(msg){
					   $('#ed2').val('');
					   $("#contenidoDos").load(t+"_result.php?op=0");
   				    }
 			    });
			    } else {
					alert("El área de texto no puede estar vacía");
				}
				break;
			case 2:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=class'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idclass"+j+"="+$('input[name=class'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idclass"+j+"="+$('input[name=class'+i+']').val();
						}
					}								
				}	
				if ( (j != 0) && ( $('#ed3').attr('value').length != 0 ) && ( $('#ed4').attr('value').length != 0 ) ){	
					str="op="+op+"&classes="+j+"&"+str+"&ed3="+$('#ed3').attr('value')+"&ed4="+$('#ed4').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed3').val('');
						   $('#ed4').val('');
						   $("#contenidoDos").load(t+"_result.php?op=1");
						   //EN LUGAR DE CARGAR LA P&aacute;GINA, AGREGAR UN TR, SIMILAR AL REMOVE
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;
			case 3:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=testcase'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						}
					}								
				}	
				if ( (j != 0) && ( $('#ed5').attr('value').length != 0 ) ){	
					str="op="+op+"&testcases="+j+"&"+str+"&ed5="+$('#ed5').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed5').val('');
						   $("#contenidoDos").load(t+"_result.php?op=2");
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;
			case 4:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=testcase'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						}
					}								
				}	
				str=str+"&s1="+$('#s1').attr('value');
				if ($('input[name=cb1]').is(':checked')){
					str=str+"&cb1=Y";
				}else{
					str=str+"&cb1=N";
				}
				if ( (j != 0) && ( $('#ed6').attr('value').length != 0 ) ){						
					str="op="+op+"&testcases="+j+"&"+str+"&ed6="+$('#ed6').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed6').val('');
						   $('#s1').val(1);
						   $("#contenidoDos").load(t+"_result.php?op=4");
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;	
			case 5:	
				var str;
				if ( ($('#ed3').attr('value').length != 0 ) && ($('#ed4').attr('value').length != 0 ) ){	
					str="op="+op+"&ed3="+$('#ed3').attr('value')+"&ed4="+$('#ed4').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#ed3').val('');
						   $('#ed4').val('');
						   $("#contenidoDos").load(t+"_result.php?op=0");
						   //EN LUGAR DE CARGAR LA P&aacute;GINA, AGREGAR UN TR, SIMILAR AL REMOVE
   				   	     }
 			    	});
			    } else {
					alert("Los cuadros de texto deben rellenarse");
				}
				break;
				case 6:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=testcase'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						}
					}								
				}	
				str=str+"&s1="+$('#s1').attr('value');
				if ($('input[name=cb1]').is(':checked')){
					str=str+"&cb1=Y";
				}else{
					str=str+"&cb1=N";
				}
				if ( (j != 0) && ( $('#ed6').attr('value').length != 0 ) ){						
					str="op=4"+"&testcases="+j+"&"+str+"&ed6="+$('#ed6').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed6').val('');
						   $('#s1').val(1);
						   $("#contenidoDos").load(t+"_result.php?op=3");
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;
				case 7:
				if ( ( $('#ed1').attr('value').length != 0 ) && ( $('#ed2').attr('value').length != 0 ) ){
				$.ajax({
   					type: "POST",
   					url: "insert.php",
   					data: "op="+op+"&ed1="+$('#ed1').attr('value')+"&ed2="+$('#ed2').attr('value'),
   					success: function(msg){
					   $('#ed1').val('');
					   $('#ed2').val('');
					   $("#contenidoDos").load(t+"_result.php?op=0");
   				    }
 			    });
				} else {
					alert("Debes completar ambos campos");
				}
				break;
				case 8:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=line'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idline"+j+"="+$('input[name=line'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idline"+j+"="+$('input[name=line'+i+']').val();
						}
					}								
				}	
				str=str+"&s1="+$('#s1').attr('value');
				if ($('input[name=cb1]').is(':checked')){
					str=str+"&cb1=Y";
				}else{
					str=str+"&cb1=N";
				}
				if ( (j != 0) && ( $('#ed6').attr('value').length != 0 ) && ( $('#ed7').attr('value').length != 0 ) ){						
					str="op="+op+"&lines="+j+"&"+str+"&ed6="+$('#ed6').attr('value')+"&ed7="+$('#ed7').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed6').val('');
						   $('#ed7').val('');
						   $('#s1').val(1);
						   $("#contenidoDos").load(t+"_result.php?op=1");
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;
				case 9:	
				var str;
				var j = 0;
				for (var i = 1; i <= $('input[name=count]').val(); i++){				
					if ($('input[name=testcase'+i+']').is(':checked')){
						j=j+1;
						if (j == 1){
						  str="idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						} 
						if ( j > 1){
						  str=str+"&idtestcase"+j+"="+$('input[name=testcase'+i+']').val();
						}
					}								
				}	
				if ( (j != 0) && ( $('#ed5').attr('value').length != 0 ) ){	
					str="op=3&testcases="+j+"&"+str+"&ed5="+$('#ed5').attr('value');
					$.ajax({
   						type: "POST",
   						url: "insert.php",
   						data: str,
   						success: function(msg){
						   $('#contenidoUno').find(':checked').attr('checked', '');
						   $('#ed5').val('');
						   $("#contenidoDos").load(t+"_result.php?op=1");
   				   	     }
 			    	});
			    } else {
					alert("Al menos debe haber un checkbox seleccionado junto con los textareas");
				}
				break;
		}
	}

	function IsNumeric(val) {
    	if (isNaN(parseFloat(val))) {
       	   return false;
    	 }
     	return true;
	}

	function update_data(op, t){
		//alert(t);
		switch (op) {
			case 1:
				var value = "";
				var len = document.f1.output.length;
				if (IsNumeric(len)){
					for (var i = 0; i <len; i++) {
						//alert(i);
						if (document.f1.output[i].checked) {
							value = document.f1.output[i].value;
						}
					}
				}else{
					value = document.f1.output.value;
				}
				$.ajax({
   					type: "POST",
   					url: "update.php",
   					data: "op="+op+"&idoutput="+value+"&ed6="+$('#ed6').attr('value'),
   					success: function(msg){
						$('#contenidoUno').find(':checked').attr('checked', '');
						$('#ed6').val('');
					   $("#contenidoDos").load(t+"_result.php?op=3");
   				    }
 			    });
				break;
				case 2:
				var value = "";
				var len = document.f1.output.length;
				if (IsNumeric(len)){
					for (var i = 0; i <len; i++) {
						//alert(i);
						if (document.f1.output[i].checked) {
							value = document.f1.output[i].value;
						}
					}
				}else{
					value = document.f1.output.value;
				}
				$.ajax({
   					type: "POST",
   					url: "update.php",
   					data: "op=1"+"&idoutput="+value+"&ed6="+$('#ed6').attr('value'),
   					success: function(msg){
						$('#contenidoUno').find(':checked').attr('checked', '');
						$('#ed6').val('');
					   $("#contenidoDos").load(t+"_result.php?op=2");
   				    }
 			    });
				break;
		}
	}

	function oculta(){
		$("#instrucciones").slideToggle(300);
	}
	function cerrar(){
		$.ajax({
				url: 'logout.php',
				success: function(data){
					top.location.href = 'index.php';
				}
			});
	}
