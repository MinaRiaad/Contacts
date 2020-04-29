@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {!! Form::model($phone,['route' => ['phones.update',$phone],'method'=>'put']) !!}
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>"Enter phone number"]) !!}
                </div>
                {!! Form::submit('Update', ['class'=>"btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
