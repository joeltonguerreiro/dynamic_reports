@extends('layouts.default')

@section('title', 'Page Title')

@section('content')

<div class="col-md-12">
    <form action="/websites/edit/{{$website->id}}" method="post">
        <div>
            <label for="">
                Domain
                <input type="text" name="domain" value="{{$website->domain}}">
            </label>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>

@endsection