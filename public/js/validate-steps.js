$(document).ready(function() {
	//Primero se declaran las variables checkBoxes y submitButton
	let checkBoxes = $('input[type=checkbox]'),
	submitButton = $('#continue');

	//Cuando la variable checkBoxes cambie, se mantiene desactivado el botón
    $(checkBoxes).change(function() {
    	submitButton.attr("disabled", checkBoxes.is(":not(:checked)"));

    	//Si todos los checkBoxes NO están marcados se marca como desactivado
        if(checkBoxes.is(":not(:checked)")) {
	        submitButton.addClass('btn-disabled');
	    } else {
	    	//Cuando todos los checkBoxes están marcados se activa el botón
	        submitButton.removeClass('btn-disabled');
	    }   
    });
});