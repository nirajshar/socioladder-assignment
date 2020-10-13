@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Employment Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}">
                        @csrf
                     
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
                                                <input id="company_name" type="text" class="form-control" name="company_name[]" value="{{ $company->company_name }}">
                                            </td>
                                            
                                            <td>
                                                <input id="designation" type="text" class="form-control" name="designation[]" value="{{ $company->designation }}">
                                            </td>
                                            
                                            <td>
                                                <input id="from_month" type="text" class="form-control" name="from_month[]"  value="{{ $company->from_month }}">
                                            </td>
                                                                                    
                                            <td>
                                                <input id="from_year" type="text" class="form-control" name="from_year[]" value="{{ $company->from_year }}">
                                            </td>     

                                            <td>
                                                <input id="to_month" type="text" class="form-control" name="to_month[]" value="{{ $company->to_month }}">
                                            </td>     

                                            <td>
                                                <input id="to_year" type="text" class="form-control" name="to_year[]" value="{{ $company->to_year }}">                                            
                                            </td>   

                                            <td>
                                                <input id="job_type" type="text" class="form-control" name="job_type[]" value="{{ $company->job_type }}">
                                            </td>
                                        </tr>     
                                    
                                        
                                    @empty
                                        <tr>
                                            <td colspan="8">
                                                No Companies !
                                            </td>
                                        </tr>          
                                    @endforelse
                                    <tr>
                                        <td colspan="7"> </td>
                                        <td class="text-right"> 
                                            <button type="button" class="btn btn-dark " id="add_company">+ Add More Company</button>
                                        </td>
                                    </tr>    
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
                                            <input id="skill_name" type="text" class="form-control" name="skill_name[]"  value="{{ $skill->skill_name }}">
                                        </td>

                                        <td>
                                            <input id="proficiency" type="text" class="form-control" name="proficiency[]"  value="{{ $skill->proficiency }}">
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No Skills !
                                        </td>
                                    </tr>
                                    
                                @endforelse    
                                
                                <tr>
                                    <td colspan="2"></td>
                                    
                                    <td class="text-right"> 
                                        <button type="button" class="btn btn-dark " id="add_skills">+ Add More Skills</button>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#add_company').on('click', function() {
        addCompanyRow();
        // console.log('okay');
    });

    function addCompanyRow() {
        var tr = '<tr>'+
                    '<td> </td>' +
                    '<td> <input id="company_name" type="text" class="form-control" name="company_name[]"> </td>' +
                    '<td> <input id="designation" type="text" class="form-control" name="designation[]" > </td>' +
                    '<td> <input id="from_month" type="text" class="form-control" name="from_month[]" > </td>' +
                    '<td> <input id="from_year" type="text" class="form-control" name="from_year[]" > </td>' +
                    '<td> <input id="to_month" type="text" class="form-control" name="to_month[]" > </td>' +
                    '<td> <input id="to_year" type="text" class="form-control" name="to_year[]" > </td>' +
                    '<td> <input id="job_type" type="text" class="form-control" name="job_type[]" > </td>' +
                '<tr>';
        // $('#company_table > tbody:last-child').append(tr);
        $('#company_table tr:last').before(tr);                    
    }

    $('#add_skills').on('click', function() {
        addSkillsRow();
        // console.log('okay');
    });

    function addSkillsRow() {
        var tr = '<tr>'+
                    '<td> </td>' +
                    '<td> <input id="skill_name" type="text" class="form-control" name="skill_name[]" > </td>' +
                    '<td> <input id="proficiency" type="text" class="form-control" name="proficiency[]" > </td>' +                    
                '<tr>';
        // $('#company_table > tbody:last-child').append(tr);
        $('#skill_table tr:last').before(tr);                    
    }

</script>

@endsection
