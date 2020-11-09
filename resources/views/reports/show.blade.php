<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</html>