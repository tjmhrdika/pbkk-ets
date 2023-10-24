@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="{{ url('add') }}" class="btn btn-success btn-sm">
    <i class="fa fa-plus"></i> Add
</a>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Type</th>
                <th>Condition</th>
                <th>Description</th>
                <th>Damage</th>
                <th>Amount</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->condition }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->damage }}</td>
                <td>{{ $item->amount }}</td>
                <td><img src="{{ asset('storage/images/'.$item->image) }}" style="max-width: 150px;" class="img-fluid" alt="{{ $item->image }}"></td>
                <td>
                    <a href="{{ url('edit/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ url('home/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
