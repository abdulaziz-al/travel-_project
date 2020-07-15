@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Addmember') }}" enctype="multipart/form-data">
                        @csrf


                            <div class="col-sm-12 form-inline">

                        <div class="select-box">
                            <img src="search.png" class="imgg" alt="Avatar">

                            <label for="select-box1"  class="label select-box1"><span class="label-desc">إختر الوظيفة </span> </label>
                            <select id="select-box1" name="selected" class="select">
                                @foreach ($job as $jobs)
                               
                              <option value="{{$jobs->id}}">{{$jobs->price}} {{$jobs->name}}</option>
                              @endforeach

                            </select>
                            
                          </div>

                            </div>
                            <br>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <img src="mail.png" class="img" alt="Avatar">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="الإيميل" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              

                            </div>
                            <div class="col-md-6 input-container">
                                <img src="name.png" class="img" alt="Avatar">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="الإسم الرباعي" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                           

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 input-container">
                                <img src="date.png" class="img" alt="Avatar">

                                    <input type='text' name="Exp" class="form-control" id="hijri-date-input3" placeholder="تاريخ إنتهاء الهوية أو الإقامة"/>
                             
                                                        </div>
                            <div class="col-md-6 input-container">
                                <img src="id.png" class="img" alt="Avatar">

                                <input type="text" name="NID" class="form-control" placeholder="رقم الهوية">
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="phone.png" class="img" alt="Avatar">

                            <input type="text" name="phone" class="form-control" placeholder="رقم الجوال">
                            </div>
                            <div class="col-md-6">
                                <img src="password.png" class="img" alt="Avatar">

                                
                                <input id="password" type="password" class="form-control" name="password" placeholder="الرقم السري" required autocomplete="new-password">

                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>

                                <button type="submit" class="btn btn-primary" id="btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
