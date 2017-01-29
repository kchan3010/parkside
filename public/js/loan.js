/**
 * Created by kennychan on 1/27/17.
 */
function process_loan()
{

    $('#loan-status').removeClass('has-error'); // remove the error class
    $('#loan-status').removeClass('alert alert-success'); // remove the success class
    $('.help-block').remove(); // remove the error text

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

            if(!data.success) {
                if(data.errors.loan_amt)
                {
                    $("#loan-amt-group").addClass('has-error');
                    for(i in data.errors.loan_amt) {
                        $("#loan-amt-group").append('<div class="help-block">' + data.errors.loan_amt[i] + '</div>');
                    }
                }

                if(data.errors.prop_val)
                {
                    $("#prop-val-group").addClass('has-error');
                    for(i in data.errors.prop_val) {
                        $("#prop-val-group").append('<div class="help-block">' + data.errors.prop_val[i] + '</div>');
                    }
                }

                if(data.errors.ssn)
                {
                    $("#ssn-group").addClass('has-error');
                    for(i in data.errors.ssn) {
                        $("#ssn-group").append('<div class="help-block">' + data.errors.ssn[i] + '</div>');
                    }
                }
            } else {
                $("#loan-status").addClass('alert alert-success');
                $("#loan-status").append('<div class="help-block"> Status:' + data.loan_status + '</div>');
                $("#loan-status").append('<div class="help-block">' + data.msg + '</div>');


            }
        });


    // $("#loan_app_form").ajaxSubmit({url: '/loan_submission', type: 'post'});

}
