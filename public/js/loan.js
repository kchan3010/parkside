/**
 * Created by kennychan on 1/27/17.
 */
function process_loan()
{

    $('#loan-status').removeClass('has-error'); // remove the error class
    $('.help-block').remove(); // remove the error text

    var $_token = $('#token').val();

    var form_data = {
        'loan' : $("#loan-amt").val(),
        'prop_val' : $("#prop-value").val(),
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
            // console.log(data);

            if(!data.success) {
                $("#loan_status").addClass('has-error');
                $("#loan-status").append('<div class="help-block">' + data.msg + '</div>');
                $("#loan-status").append('Status:' + data.status + '</div>');
                $("#loan-status").append('<div class="help-block">' + data.errors + '</div>');
            } else {
                $("#loan_status").addClass('alert alert-success');
                $("#loan-status").append('Status:' + data.status + '</div>');
                $("#loan-status").append('<div>' + data.msg + '</div>');
                $("#loan-status").append('<div>' + data.errors + '</div>');

            }
        });


    // $("#loan_app_form").ajaxSubmit({url: '/loan_submission', type: 'post'});

}
