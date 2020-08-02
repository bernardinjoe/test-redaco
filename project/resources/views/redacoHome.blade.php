<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Home</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    CRUD Data 
                </div>
                <div class="card-body">
                    <a href="/CRUD/home/add" class="btn btn-primary">Add New</a>
                    <a href="/index" class="btn btn-primary">Index</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>image</th>
                                <th>love_count</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td><img width="150px" src="{{ url('/images/'.$d->image) }}"></td>
                                <td>{{ $d->love_count }}</td>
                                <td>
                                <a href="/CRUD/home/edit/{{ $d->id }}" class="btn btn-warning">Edit</a>
                                <a href="/CRUD/home/delete/{{ $d->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>