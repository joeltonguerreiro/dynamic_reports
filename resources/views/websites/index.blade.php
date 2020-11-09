@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
<div class="col-md-12">
    <div class="text-center">
        <a href="/websites/add"><button>Add new Website</button></a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($websites as $website) : ?>
                    <tr>
                        <td>{{$website->domain}}</td>
                        <td>{{$website->created_at}}</td>
                        <td><a href="/websites/edit/{{$website->id}}">edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

@endsection