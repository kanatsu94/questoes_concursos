$(document).ready(function () {
    $(".button-ajax").click(function (evt) {
        evt.preventDefault();
        var question_id = $(this).attr("value");
        var radio_name = "answer" + question_id;
        var resposta = $('input[name="' + radio_name + '"]:checked').val();
        
        $.ajax({
            type: "POST",
            url: "/questions/answer",
            data: {
                u_id: 1,
                q_id: question_id,
                a_id: resposta
            },
            beforeSend: function () {
                $("#msg_" + question_id).hide();
                $("#load_" + question_id).show();
            },
            success: function (data) {
                $("#load_" + question_id).hide();
                                
                $("#msg_" + question_id).html(data);
                $("#msg_" + question_id).show(300);
            }
        });
    });
});