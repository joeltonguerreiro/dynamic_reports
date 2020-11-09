@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
<div class="col-md-12">
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Name</th>
                    <th>Label</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metas as $meta) : ?>
                    <tr>
                        <td>{{$meta->model}}</td>
                        <td>{{$meta->name}}</td>
                        <td>{{$meta->label}}</td>
                        <td>{{$meta->type}}</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

@endsection