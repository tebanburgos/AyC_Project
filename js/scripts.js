var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('../js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
						$("#total").text('Total: '+e);
				});
			}
		}
	});
	$(".cantidad").focusout(function(e){
		if($(this).val()!=''){
			var max = parseInt($(this).attr('max'));
			var valor = parseInt($(this).val());
				if(valor > max){
					alert("La cantidad de este producto no puede ser mayor a "+max);
					$(this).val(max);
					$(this).focus();
				}
				else{
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('../js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
						$("#total").text('Total: '+e);
				});
			}
		}
				else if ($(this).val() == ''){
			alert("Debe ingresar cantidad");
			$(this).focus();
		}
	});
		$(".cantidad").change(function(e){
		if($(this).val()!=''){
			var max = parseInt($(this).attr('max'));
			var valor = parseInt($(this).val());
				if(valor > max){
					alert("La cantidad de este producto no puede ser mayor a "+max);
					$(this).val(max);
					$(this).focus();
				}
				else{
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('../js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
						$("#total").text('Total: '+e);
				});
			}
		}

	});
	$(".eliminar").click(function(e){
		//e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('../js/eliminar.php',{
			Id:id
		},function(a){
			
			if(a=='0'){
				location.href="../carro.php";
			}
		});

	});

}	
$(document).on('ready',inicio);