@extends('layouts.app')
@section('content')
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Numebr</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        @if (Auth::user()->id!=$contact->contact_id&&Auth::user()->id==$contact->user_id)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                            <td>
                                {!! Form::open(['route' => ['contacts.destroy',$contact->id],'method'=>'delete']) !!}
                                    {!! Form::submit('Delete', ['class'=>"btn btn-danger btn-sm"]) !!}
                                {!! Form::close() !!}
                            </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
