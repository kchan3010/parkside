<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanSubmissionController extends Controller
{
    const LTV_THRESHOLD = 40;
    const LOAN_STATUS_DENIED = 'denied';
    const LOAN_STATUS_APPROVED = 'approved';

    protected $errors;
    protected $loan_amt;
    protected $prop_val;
    protected $ssn;

    public function process()
    {
        try{
            $this->validate();

            if(!empty($this->errors)) {
                throw new \Exception();
            }

            $loan_status = $this->reviewLoanApplication();
            $success = true;
            $msg = "Your loan application has been processed.";


        } catch (\Exception $e) {
            $success = false;
            $msg = "There was a problem with your submission";

            $loan_status = self::LOAN_STATUS_DENIED;
        }


        $data['success']        = $success;
        $data['msg']            = $msg;
        $data['errors']         = $this->errors;
        $data['loan_status']    = $loan_status;

        echo json_encode($data);

    }

    public function validate()
    {
        if(empty($_POST['loan'])) {
            $this->erors[] = 'Loan amount is required';
        } else {
            $this->loan_amt = $_POST['loan'];


        if(empty($_POST['prop_val'])) {
            $this->erors[] = 'Property value amount is required';
        } else {
            $this->prop_val = $_POST['prop_val'];
        }

        if(empty($_POST['ssn'])) {
            $this->erors[] = 'Property value amount is required';
        } else {
            $this->ssn = $_POST['ssn'];
        }

        if(!is_numeric($this->loan_amt)) {
            $this->errors[] = "Loan amount needs to be a numeric value";
        } elseif ($this->loan_amt < 0) {
            $this->errors[] = "Loan amount needs to be a postive value";
        }

        if(!is_numeric($this->prop_val)) {
            $this->errors[] = "Property value amount needs to be a numeric value";
        } elseif ($this->prop_val < 0) {
            $this->errors[] = "Property value amount needs to be a positive value";
        }

        $ssn_pattern = "/(?!000|666)[0-9]{3}([ -]?)(?!00)[0-9]{2}\1(?!0000)[0-9]{4}/";
        if(!preg_match($ssn_pattern, $this->ssn)) {
            $this->errors[] = "Social Security Numbers need to be numeric and follow this format (xxx-xx-xxxx)";
        }

    }
}

    public function reviewLoanApplication()
    {
        $ret_val = self::LOAN_STATUS_DENIED; //default

        $ltv = floor($this->loan_amt / $this->prop_val);

        if($ltv <= self::LTV_THRESHOLD) {
            $ret_val = self::LOAN_STATUS_APPROVED;
        }
        
        return $ret_val;
    }
}
