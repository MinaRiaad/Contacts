@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row justify-content-center">
            {!! Form::open(['route' => 'phones.store']) !!}
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>"Enter phone number"]) !!}
                </div>
                {!! Form::submit('Add', ['class'=>"btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
