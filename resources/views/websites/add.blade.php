@extends('layouts.default')

@section('title', 'Page Title')

@section('content')

<div class="col-md-12">
<form action="/websites/add" method="post">
    <input type="text" name="domain">
    <button type="submit">Save</button>
</form>
</div>

@endsection