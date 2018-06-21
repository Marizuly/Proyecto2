
function validar() {
    var letras = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,45}$/i;
    var nombre = $('#nombre').val().trim();
    $('#nombre').val(nombre);

    if (nombre === '') {
        swal({
            title: '¡Error!',
            text: 'No se permite campo Vacío',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;

    } else if (nombre.length < 3) {
        swal({
            title: '¡Error!',
            text: 'El numero de caracteres minimos deben de ser 3',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
        
    } else if (!letras.test(nombre)) {
        swal({
            title: '¡Error!',
            text: 'Solo se permiten letras',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;

    } else if (nombre.toLowerCase() == 'null') {
        swal({
            title: '¡Error!',
            text: 'Cáracter no válido',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
    return true;
}

function validarNumeros() {
    var valor = $('#valor').val().trim();
    var ano = $('#ano').val().trim();

    if (valor === '' || ano === '') {
        swal({
            title: '¡Error!',
            text: 'No se permiten campos Vacíos',
            type: 'error',
            confirmButtonColor: '#d33'
        });
        return false;
    }
}

/*VALIDA QUE SOLO SEAN NUMEROS Y POSITIVOS*/
$(document).ready(function(){
	$('.num').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	});
});

