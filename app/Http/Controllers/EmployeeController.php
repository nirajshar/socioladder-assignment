<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Company;
use App\Skill;

use PDF;

class EmployeeController extends Controller
{
      
    public function show($id)
    {
        $employee =  Auth::user();
        
    }

    
    public function edit()
    {
        
        $employee = User::with('employee_company', 'employee_skill')->first();
        // dd($employee);
        
        return view('edit')->with('employee', $employee);
    }

   
    public function update(Request $request)
    {
        // dd($request);
        $user_data = Auth::user();
        $data = $request->all();
        $added_company = array();
        $added_skills = array();

        foreach ($request->company_name as $key => $value) {

            $company = Company::where('company_name', '=', $request->company_name[$key])
                                ->where('user_id', '=', $user_data->id)->first();            

            if ( $company ) {

                $company_data = array(
                    'user_id' => $user_data->id,
                    'company_name' => $request->company_name[$key],
                    'designation' => $request->designation[$key],
                    'from_month' => $request->from_month[$key],
                    'from_year' => $request->from_year[$key],
                    'to_month' => $request->to_month[$key],
                    'to_year' => $request->to_year[$key],
                    'job_type' => $request->job_type[$key],
                );
    
                // echo "<pre>";
                // print_r($company_data);die;
    
                $company->fill($company_data);
    
                if ( $company->isDirty() ){
                    $added_company[] = $request->company_name[$key]; 
                    $company->save();
                    
                }

            } else {
                $company = new Company();          
                $company->user_id = $user_data->id;
                $company->company_name = $request->company_name[$key];
                $company->designation = $request->designation[$key];
                $company->from_month =  $request->from_month[$key];
                $company->from_year = $request->from_year[$key];
                $company->to_month = $request->to_month[$key];
                $company->to_year = $request->to_year[$key];
                $company->job_type = $request->job_type[$key];                
                $company->save();

                $added_company[] = $request->company_name[$key]; 

            }
            
           
        }

        

        foreach ($request->skill_name as $key => $value) {

            $skill = Skill::where('skill_name', '=', $request->skill_name[$key])
                                ->where('user_id', '=', $user_data->id)->first();    

            if ( $skill ) {

                $skill_data = array(
                    'user_id' => $user_data->id,
                    'skill_name' => $request->skill_name[$key],
                    'proficiency' => $request->proficiency[$key]               
                );
    
                $skill->fill($skill_data);
    
                if ( $skill->isDirty() ){
                    $added_skills[] = $request->skill_name[$key]; 
                    $skill->save();
                }

            } else {

                $skill = new Skill;
                $skill->user_id = $user_data->id;
                $skill->skill_name = $request->skill_name[$key];
                $skill->proficiency = $request->proficiency[$key];
                $skill->save();

                $added_skills[] = $request->skill_name[$key]; 
            }
            
        }

        // echo "<pre>";
        // print_r($added_company);
        // print_r($added_skills);
        // die;

        $message = count($added_company).' companies added, '.count($added_skills).' skills added !';

        return redirect()->route('home')->with('message',$message); 

        
    }


    public function pdf() {
        
        $employee = User::with('employee_company', 'employee_skill')->first();
  
        
        view()->share('employee',$employee);
        $pdf = PDF::loadView('pdf_view', $employee);
        $pdf->setPaper('A3', 'landscape');
  
       
        return $pdf->download('pdf_file.pdf');
      }

}
