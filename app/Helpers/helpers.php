<?php

// untuk membuat flash message

use App\Models\AcademicYear;

if(!function_exists('flashMessage')){
    function flashMessage($message, $type = 'success'){
        session()->flash('message', $message);
        session()->flash('type', $type);
    }
}

// untuk membuat signature payments
if(!function_exists('signatureMidtrans')){
    function signatureMidtrans($order_id, $status_code, $gross_amount, $server_key)
    {
        return hash('sha512', $order_id . $status_code . $gross_amount . $server_key);
    }
}

// actvie academcYear
if(!function_exists('activeAcademicYear'))
{
    function activeAcademicYear()
    {
        return AcademicYear::query()->where('is_active', true)->first();
    }
}

// untuk grades
if(!function_exists('getLetterGrade'))
{
    function getLetterGrade($grade)
    {
        // match itu seperti while
        return match (true){
            $grade > 90 => 'A',
            $grade > 85 => 'A-',
            $grade > 80 => 'B+',
            $grade > 75 => 'B',
            $grade > 70 => 'B-',
            $grade > 65 => 'C+',
            $grade > 60 => 'C',
            $grade > 55 => 'C-',
            $grade > 50 => 'D',
            default => 'E'
        };
    }
}
