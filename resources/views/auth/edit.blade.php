@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {!! Form::model($user,['route' => ['user.update',$user],'method'=>'put']) !!}
                <div class="form-group">
                    <label for="address">Address</label>
                    {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>"Enter Address"]) !!}
                </div>
                {!! Form::submit('Update', ['class'=>"btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
