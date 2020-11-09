@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
<div class="col-md-12">
    <div class="text-center">
    <a href="/reports/add"><button>Add new Report</button></a>
    </div>
    <div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report) : ?>
                <tr>
                    <td>{{$report->name}}</td>
                    <td><a href="/reports/show/{{$report->id}}">show</a></td>
                    <td><a href="/reports/edit/{{$report->id}}">edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
</div>

@endsection