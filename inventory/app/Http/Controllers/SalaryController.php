<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Salary;
use Image;
use DB;

class SalaryController extends Controller
{
    public function paid(Request $request, $id){
    	$validateData = $request->validate([
            'salary_month' => 'required'
        ]);

        $month = $request->salary_month;
        $check = DB::table('salaries')->where('employee_id', $id)->where('salary_month', $month)
        		->first();

        if($check){
        	return response()->json('Salary Already Paid');
        }else{
        	$data = array();
	    	$data['employee_id'] = $id;
	    	$data['amount'] = $request->amount;
	    	$data['salary_date'] = date('d/m/y');
	    	$data['salary_month'] = $month;
	    	$data['salary_year'] = date('Y');
	    	DB::table('salaries')->insert($data);

        }	
    }

    public function getAllSalary(){
    	$salary = DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
                    return response()->json($salary);
    }

    public function getMonthWiseSalary($id){

    	$salaries = DB::table('salaries')
                    ->join('employees', 'salaries.employee_id','employees.id')
                    ->select('employees.name','salaries.*')
                    ->where('salaries.salary_month', $id)
                    ->orderBy('salaries.id','DESC')
                    ->get();
                    return response()->json($salaries);
    }


    public function test($id){
    	$data = DB::table('salaries')
                    ->join('employees', 'salaries.employee_id','employees.id')
                    ->select('employees.name as name','employees.email as email' ,'salaries.*')
                    ->where('salaries.id', $id)
                    ->first();
                    return response()->json($data);
    }


    public function salaryUpdate(Request $request, $id){
    	$validateData = $request->validate([
            'salary_month' => 'required'
        ]);

        	$data = array();
	    	$data['amount'] = $request->amount;
	    	$data['salary_month'] = $request->salary_month;
	    	DB::table('salaries')->where('id', $id)->update($data);
    }



}
