@extends('layouts.app')

@section('content')
<a href="{{ url('home') }}" class="btn btn-secondary btn-sm">
    <i class="fa fa-undo"></i> Back
</a>
<form action="{{ url('home') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Type</label>
        <select name="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Condition</label>
        <select name="condition_id">
            @foreach ($conditions as $condition)
            <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label>Damage</label>
        <input type="text" name="damage" class="form-control">
    </div>
    <div class="form-group">
        <label>Amount</label>
        <input type="text" name="amount" class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection('content')