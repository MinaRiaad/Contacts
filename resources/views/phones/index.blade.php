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
                    <th scope="col">Phone Numbers</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($phones as $phone)
                        @if (Auth::user()->id==$phone->user_id)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$phone->phone}}</td>
                            <td><a href="{{route('phones.edit',$phone)}}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td>
                                {!! Form::open(['route' => ['phones.destroy',$phone],'method'=>'delete']) !!}
                                    {!! Form::submit('Delete', ['class'=>"btn btn-danger btn-sm"]) !!}
                                {!! Form::close() !!}
                            </td>
                            </tr>
                        @endif
                    @empty
                    <tr>
                        <h3>You have no phones</h3>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
