@extends('layouts.default')

@section('title', 'Page Title')

@section('content')
<div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th>Domain</th>
                <th>Register On</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($responseData as $row) : ?>
                <tr>
                    <td>{{$row->Domain}}</td>
                    <td>{{$row->{'Register On'} }}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

@endsection