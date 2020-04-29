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
            {!! Form::open(['route' => 'contacts.store']) !!}
                <div class="form-group">
                    <label for="name">User Name</label>
                    <select class="form-control" name="contact_id">
                        <option selected>Choose Contact...</option>
                        @foreach ($users as $user)
                          @if ( $user->id != Auth::user()->id)
                            <option value="{{ $user->id }}"}} >
                                {{ $user->name }}
                            </option>
                          @endif
                        @endforeach
                      </select>
                </div>
                {!! Form::submit('Add', ['class'=>"btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
