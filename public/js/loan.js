/**
 * Created by kennychan on 1/27/17.
 */
function process_loan()
{
    var $_token = $('#token').val();

    var form_data = {
        'loan' : $("#loan_amt").val(),
        'prop_val' : $("#prop_value").val(),
        'ssn' : $("#ssn").val()
    };

    console.log(form_data);

    $.ajax(
        {
            type: 'POST',
            headers: { 'X-XSRF-TOKEN' : $_token },
            url: '/loan-submission',
            data: form_data,
            dataType: 'json',
            encode: true

        }
    )

        .done(function(data) {
            console.log(data);
        });


    // $("#loan_app_form").ajaxSubmit({url: '/loan_submission', type: 'post'});

}
