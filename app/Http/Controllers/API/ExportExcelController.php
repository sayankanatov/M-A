<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\StudentExport;

class ExportExcelController extends Controller
{    
    public function studentTable(Request $request)
    {
        try{
        	$headers = Config::get('excel.headers');
            $exportData = (array)json_decode($request->query('data'),true);

        	$export = new StudentExport([
        		$headers,
        		$exportData,
    		]);
        	return Excel::download($export, 'students.xls');

        }catch (\Exception $e) {
            return json_encode(['status' => 'error', 'msg' => $e->getMessage()]);
        }
    }

    public function postStudentTable(Request $request)
    {
        try{
            $headers = Config::get('excel.headers');
            $exportData = (array)json_decode($request->get('data'),true);

            dd($exportData);

            $export = new StudentExport([
                $headers,
                $exportData,
            ]);
            return Excel::download($export, 'students.xls');

        }catch (\Exception $e) {
            return json_encode(['status' => 'error', 'msg' => $e->getMessage()]);
        }
    }
}