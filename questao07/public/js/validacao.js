$().ready(function() {
    $('#form_cadastro').validate({
        rules: {
            nome: {
                required: true
            },
            empresa: {
                required: true
            },
            endereco: {
                required: true
            },
            bairro: {
                required: true
            },
            cidade: {
                required: true
            },

            estado: {
                required: true
            }

        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            nome: {
                required: "Este campo não pode ser vazio"
            },
            empresa: {
                required: "Este campo não pode ser vazio",
            },
            endereco: {
                required: "Este campo não pode ser vazio",
            },
            bairro: {
                required: "Este campo não pode ser vazio",
            },

            cidade: {
                required: "Este campo não pode ser vazio",
            },

            estado: {
                required: "Este campo não pode ser vazio",
            }
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        number: "Entre com um número válido.",
    });
});