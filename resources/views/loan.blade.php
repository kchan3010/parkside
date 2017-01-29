<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/loan.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <input id="token" type="hidden" value="{{$encrypted_token}}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loan Application</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="loan-header">
        Enter your information and click submit to apply for a loan
    </div>

    <div id="loan-form" class="col-sm-2">
        <form id="loan-app-form">
            <div id="loan-amt-group" class="form-group">
                Loan Amount: <input type="text" class="form-control" name="loan_amt" id="loan_amt"><br>
            </div>
            <div id="prop-val-group" class="form-group">
                Property Value: <input type="text" class="form-control" name="prop_value" id="prop_value"><br>
            </div>
            <div id="ssn-group" class="form-group">
                SSN (xxx-xx-xxxx): <input type="text" class="form-control" name="ssn" id="ssn" placeholder="xxx-xx-xxxx"><br>

            </div>
            <p></p>
            <input type="button" value="Submit Application" onclick="process_loan()">
            <input type="submit" value="Submit" onclick="process_loan()">
        </form>
    </div>

    <div id="loan-status">

    </div>

</body>
