<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/parkside.css">
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
    <div class="loan_header">
        Enter your information and click submit to apply for a loan
    </div>

    <div class="loan_form">
        <form id="loan_app_form">
            Loan Amount: <input type="text" name="loan_amt" id="loan_amt"><br>
            Property Value: <input type="text" name="prop_value" id="prop_value"><br>
            SSN: <input type="text" name="ssn" id="ssn"><br>
            <p></p>
            <input type="submit" value="Submit" onclick="process_loan()">
        </form>
    </div>

    <div class="loan_status"></div>

</body>
