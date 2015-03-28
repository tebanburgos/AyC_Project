var inicio=function () {
		$("#cliente").change(function(e){
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
}	
$(document).on('ready',inicio);