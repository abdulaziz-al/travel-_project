



@extends('layouts.app')

@section('content')

<div class="container" >

<div style="text-align: right">

        @include('sweetalert::alert')


        @foreach ($userjob as $users)

        {{$users->faisal->name}}
        {{$users->faisal->start}}

        {{$users->user->name}}
        <hr>
        <br>

      
        @endforeach
        <h3>إضافة وظيفة جديدة  </h3>

        <form method="POST" action="{{ route('newJobs') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="job_name"/>
            <input type="number" class="form-control" name="job_price"/>
            <input type="time" class="form-control" name="start"/>
            <input type="time" class="form-control" name="end" placeholder="start"/>
            <button type="submit" class="btn btn-primary" id="btn">
                إرسال
            </button>
        </form>
            <br>


            <h3>إضافة بدل </h3>

            
            <form method="POST" action="{{ route('overSalary') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" name="over_name"/>
                <input type="doubel" class="form-control" name="over_percentage"/>
                <button type="submit" class="btn btn-primary" id="btn">
                    إرسال
                </button>
            </form>
            <br>
         
            <form method="POST" action="{{ route('userOver') }}" enctype="multipart/form-data">
                @csrf
            <div class="col-md-5 form-inline float-right">
              <div class="form-inline">                  
                    <select name="seletedUser">
                        @foreach ($userjob as $users)

                      <option value="{{$users->id}}">{{$users->user->name}}</option>
                 @endforeach
                    </select>
                    <h5>      إختر الموظف   </h5>

                  </div>

                  <div class="form-inline">                  
                    <select  name="overSalary" >            
  
                    @foreach ($over_salary as $over_salarys)
               
                    <option value="{{$over_salarys->id}}">{{$over_salarys->name}} {{$over_salarys->percentage}}</option>
                    @endforeach

                </select>
                <label >إختر البدل   </label>

              </div>
            </div>

            <button type="submit" class="btn btn-primary" id="btn">
                إرسال
            </button>
            </form>
            @foreach ($userjob as $users)
            {{$users->user->name}}
            {{$users->faisal->name}}
            {{$users->faisal->start}}
            {{$users->faisal->price}}ريال 
            @foreach ($userOver as $userOvers)
            @if ($users->id == $userOvers->user_job_id )
            {{$userOvers->over_salary->name}}
            {{$userOvers->over_salary->percentage}} %
            {{ $userOvers->user_job->faisal->price / $userOvers->over_salary->percentage }} ريال  
            @endif
       
            @endforeach
            <hr>
            <br>
    
          
            @endforeach

       


    </div>
    </div>
    @endsection