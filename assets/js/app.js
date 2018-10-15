function getCep(cep) {
    let cepInfo = undefined;
    $.ajax({
        url: "https://viacep.com.br/ws/" + cep + "/json/",
        async: false
    }).done(function(data) {
        console.log(data);
        cepInfo = data
    });
    return cepInfo;
}

$(function(){
    $('#birthday').mask('00/00/0000');
    $('#zipCode').mask('00000-000');
    $('#cpf').mask('000.000.000-00', {reverse: false});

    $("#zipCode").keyup(function () {
        if ($(this).val().length === 9) {
            const cepInfo = getCep($(this).val());

            if (cepInfo !== undefined) {
                cepInfo.logradouro ? $("#address").val(cepInfo.logradouro) : $("#address").attr('disabled', false);
                cepInfo.bairro ? $("#neighborhood").val(cepInfo.bairro) : $("#neighborhood").attr('disabled', false);
                cepInfo.localidade ? $("#city").val(cepInfo.localidade) : $("#city").attr('disabled', false);
                cepInfo.uf ? $("#state").val(cepInfo.uf) : $("#state").attr('disabled', false);
            } else {
                $("#address").attr('disabled', false);
                $("#neighborhood").attr('disabled', false);
                $("#city").attr('disabled', false);
                $("#state").attr('disabled', false);
            }
        }
    });
});

