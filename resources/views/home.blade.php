@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{ __('Employee Details') }} 
                        </div>
                        <div class="col-md-6 text-right">
                            <a type="button" class="btn btn-dark pull-right" href="{{ route('edit') }}" > Edit Employment / Skills </a>
                            <a type="button" class="btn btn-dark pull-right" href="{{ route('pdf') }}" > Download PDF </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control" name="name" value=" {{ $employee->name }} " readonly>
                           
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $employee->email }}" readonly >                             
                        </div>
                    </div>


                    <hr style="background:black">
                    <table class="table" id="company_table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">From Month</th>
                            <th scope="col">From Year</th>
                            <th scope="col">To Month</th>
                            <th scope="col">To Year</th>
                            <th scope="col">Job Type</th>
                        </tr>
                        </thead>
                        <tbody>

                            @forelse ($employee->employee_company as $company)
                            
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <input id="company_name" type="text" class="form-control" name="company_name[]" value="{{ $company->company_name }}" readonly>
                                    </td>
                                    
                                    <td>
                                        <input id="designation" type="text" class="form-control" name="designation[]" value="{{ $company->designation }}" readonly>
                                    </td>
                                    
                                    <td>
                                        <input id="from_month" type="text" class="form-control" name="from_month[]"  value="{{ $company->from_month }}" readonly>
                                    </td>
                                                                            
                                    <td>
                                        <input id="from_year" type="text" class="form-control" name="from_year[]" value="{{ $company->from_year }}" readonly>
                                    </td>     

                                    <td>
                                        <input id="to_month" type="text" class="form-control" name="to_month[]" value="{{ $company->to_month }}" readonly>
                                    </td>     

                                    <td>
                                        <input id="to_year" type="text" class="form-control" name="to_year[]" value="{{ $company->to_year }}" readonly>                                            
                                    </td>   

                                    <td>
                                        <input id="job_type" type="text" class="form-control" name="job_type[]" value="{{ $company->job_type }}" readonly>
                                    </td>
                                </tr>     
                            
                                
                            @empty
                                <tr>
                                    <td colspan="8">
                                        No Companies !
                                    </td>
                                </tr>          
                            @endforelse
                            
                        </tbody>
                    </table>


                <hr style="background:black">

                <table class="table" id="skill_table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Skill</th>
                        <th scope="col">Proficiency</th>                                
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($employee->employee_skill as $skill)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <input type="text" class="form-control" value="{{ $skill->skill_name }}" readonly>
                                </td>

                                <td>
                                    <input type="text" class="form-control" value="{{ $skill->proficiency }}" readonly>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    No Skills !
                                </td>
                            </tr>
                            
                        @endforelse                        
                       
                    </tbody>
                </table>
                  

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
