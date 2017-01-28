<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanSubmissionController extends Controller
{
    public function process()
    {

        $data['success'] = true;
        echo json_encode($data);

    }
}
