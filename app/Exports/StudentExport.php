<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Http\Request;

class StudentExport implements FromArray
{
    
    protected $students;

    public function __construct(array $students)
    {
        $this->students = $students;
    }

    public function array(): array
    {
        return $this->students;
    }
}