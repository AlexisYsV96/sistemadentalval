var currentLocation = window.location;
$(document).ready(function(){

});

$("#GeneraReportePagos").click(function()
	{
		var f_inicial =  $('input#finicial').val();
		var f_final   =  $('input#ffinal').val();
		var finicial = moment(f_inicial, "DD/MM/YYYY");
		var ffinal = moment(f_final, "DD/MM/YYYY");
		if(f_inicial==""){
			alert("Elige la Fecha Inicial");
			$("#finicial").focus();
			return false;
		}else if(f_final==""){

			alert("Elige la Fecha Final");
			$("#fecha_inicial").focus();
			return false;
		}else if((Date.parse(finicial)) > (Date.parse(ffinal))){
			alert("La Fecha Inicial no puede ser mayor que la Fecha Final");
			$("#fecha_inicial").focus();
			return false;
		}else{
			var Reportes_movimiento = new Object();
			Reportes_movimiento.fechainicio      = $('input#fechainicio').val();
			Reportes_movimiento.fechafin 	   = $('input#fechafin').val();
		    Reportes_movimiento.documento	   = $('select#documento').val(); 
			$("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='"+ baseurl +"/img/gif-load.gif'> Generando Reporte...</center></div></div>");	
			var DatosJson = JSON.stringify(Reportes_movimiento);
			$.post(currentLocation + '/GeneraReportePagos',
			{ 
				MiReporte: DatosJson
			},
				function(data, textStatus) {
					$("#Reportes_movimiento tbody").html("");
					
					var total    = 0;
					$.each(data, function(i, item) {
						// Subtotal = parseFloat(Subtotal) + parseFloat(item.BRUTO);
						// iva      = parseFloat(iva) + parseFloat(item.TOTAL_IMPUESTO);
						total    = parseFloat(total) + parseFloat(item.Total);
						
						var TotalActual = item.Total;
						var nuevaFila =
						"<tr>"
						+"<td>"+item.cod_pago+"</td>"
						+"<td>"+item.concepto_pago+"</td>"
						+"<td>"+item.Nombre + ' ' + item.Apellido+"</td>"
						+"<td>"+item.Procedimiento+"</td>"
						+"<td>"+item.Fecha+"</td>"
						
						
						+"<td>S/ "+parseFloat(TotalActual).toFixed(2)+"</td>"
						+"</tr>";
						$(nuevaFila).appendTo("#Reportes_movimiento tbody");

					});
					
					$("#lbltotal").text("S/ " + total.toFixed(2));
					if(total=="0"){
						var nuevaFila =
						"<tr>"
						+"<td colspan=6><center>Rango de Fecha: "+finicial+" al "+ffinal+", No Existen Registros</center></td>"
						+"</tr>";
						$(nuevaFila).appendTo("#Reportes_movimiento tbody");
					}
					$("#mensaje").text("");
				}, 
				"json"		
			);

				return false;
		}
		
	});
	
	$("#ExportarReporte").click(function(){
		var f_inicial =  $('input#finicial').val();
		var f_final   =  $('input#ffinal').val();
		var finicial = moment(f_inicial, "DD/MM/YYYY");
		var ffinal = moment(f_final, "DD/MM/YYYY");
		if(f_inicial==""){
			alert("Elige la Fecha Inicial");
			$("#finicial").focus();
			return false;
		}else if(f_final==""){

			alert("Elige la Fecha Final");
			$("#ffinal").focus();
			return false;
		}else if((Date.parse(finicial)) > (Date.parse(ffinal))){
			alert("La Fecha Inicial no puede ser mayor que la Fecha Final");
			$("#finicial").focus();
			return false;
		}else{
			var f_inicial_origen = f_inicial.split("/");
			var f_final_origen = f_final.split("/");
			var f_inicial_resultado = new Date(f_inicial_origen[2], f_inicial_origen[1] - 1, f_inicial_origen[0]);
			var f_final_resultado = new Date(f_final_origen[2], f_final_origen[1] - 1, f_final_origen[0]);
			var fecha_inicial = f_inicial_resultado.getFullYear() + '-' + (f_inicial_resultado.getMonth() + 1) + '-' + f_inicial_resultado.getDate();
			var fecha_final = f_final_resultado.getFullYear() + '-' + (f_final_resultado.getMonth() + 1) + '-' + f_final_resultado.getDate();
			window.open(currentLocation + '/ExportarReporte/' + fecha_inicial + '/' + fecha_final,'_blank');
		}
	});