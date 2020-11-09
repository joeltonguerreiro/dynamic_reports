@extends('layouts.default')

@section('title', 'Page Title')

@section('content')

<div class="col-md-12">
    <form action="/reports/edit/{{$report->id}}" method="post">
        <div>
            <label for="name">
                Report Name
                <input type="text" name="name" value="{{$report->name}}">
            </label>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>

@endsection