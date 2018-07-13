/*
|------------------------------------------------------------------------------------
| render boolean column to checkbox
|------------------------------------------------------------------------------------
*/
function renderBoolColumn(tableauID, boolClass) {
  $(tableauID + ' tr').each(function (i, row) {
    $('td', this).each(function (j, cell) {
      if ($(tableauID + ' th').eq(j).hasClass( boolClass )) {
        if (cell.innerHTML == '1') {cell.innerHTML = '<div class="text-center text-success"><span class="fa fa-check-circle"></span></div>';}
        if (cell.innerHTML == '0') {cell.innerHTML = '<div class="text-center text-danger"><span class="fa fa-times-circle lg"></span></div>';}
      }
    });
  });
};

(function($) {
    /*
    |------------------------------------------------------------------------------------
    | Init DateTime
    |------------------------------------------------------------------------------------
    */
    $('.datetime').datetimepicker({
         format: 'd-m-Y H:i'
    });

    /*
    |------------------------------------------------------------------------------------
    | We change select we send the form
    |------------------------------------------------------------------------------------
    */
    $('select.onchange').change(function() {
        $(this).closest('form').submit();
    })


    /*
    |------------------------------------------------------------------------------------
    | Chosen
    |------------------------------------------------------------------------------------
    */
    if ($('select.chosen').length > 0) {
        $('select.chosen').chosen({
            // no_results_text: "Oops, rien n'a été trouvé!",
        });
    }

    /*
    |------------------------------------------------------------------------------------
    | iCheck
    |------------------------------------------------------------------------------------
    */
    //$('input').iCheck({
    //  checkboxClass: 'icheckbox_square-blue',
    //  radioClass: 'iradio_square-blue',
    //  increaseArea: '20%' // optional
    //});

    /*
    |------------------------------------------------------------------------------------
    | Submit delete form
    |------------------------------------------------------------------------------------
    */
    $(document).on('click', "form.delete button", function(e) {
        var _this = $(this);
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            //text: 'Are you sure to continue ?',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {
                _this.closest("form").submit();
            }
        });
    });

    $(document).ready(function() {
        var max_fields      = 5; //maximum input boxes allowed
        var wrapper_cel         = $(".celulares"); //Fields wrapper
        var wrapper_dir         = $(".direcciones"); //Fields wrapper
        var wrapper_ema         = $(".emails"); //Fields wrapper
        var add_cel      = $(".agregar-celular"); //Add button ID
        var add_dir      = $(".agregar-direccion"); //Add button ID
        var add_ema      = $(".agregar-email"); //Add button ID

        var x = 1; //initlal text box count
        $(add_cel).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                $(wrapper_cel).append('<div><input class="form-control" id="celulares[]" name="celulares[]" type="text"><a href="#" class="remove_cel">Quitar</a></div>'); //add input box
            }
        });

        var y = 1; //initlal text box count
        $(add_dir).click(function(e){ //on add input button click
            e.preventDefault();
            if(y < max_fields){ //max input box allowed
                y++; //text box increment
                //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                $(wrapper_dir).append('<div><input class="form-control" id="direcciones[]" name="direcciones[]" type="text"><a href="#" class="remove_dir">Quitar</a></div>'); //add input box
            }
        });

        var z = 1; //initlal text box count
        $(add_ema).click(function(e){ //on add input button click
            e.preventDefault();
            if(z < max_fields){ //max input box allowed
                z++; //text box increment
                //$(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                $(wrapper_ema).append('<div><input class="form-control" id="emails[]" name="emails[]" type="text"><a href="#" class="remove_ema">Quitar</a></div>'); //add input box
            }
        });

        $(wrapper_cel).on("click",".remove_cel", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })

        $(wrapper_dir).on("click",".remove_dir", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); y--;
        })

        $(wrapper_ema).on("click",".remove_ema", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); z--;
        })
    });




})(jQuery);

jQuery('#fecha_contrato').datetimepicker({
    timepicker:false,
    format:'d-m-Y',
    lang:'es'
});

jQuery('#fecha_defuncion').datetimepicker({
    timepicker:false,
    format:'d-m-Y',
    lang:'es'
});