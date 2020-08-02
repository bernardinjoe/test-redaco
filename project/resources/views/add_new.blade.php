<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>ADD DATA</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>ADD DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/CRUD/home" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    
                    <form method="post" action="/CRUD/home/store" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <b>Images</b><br/>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <b>Love Count</b>
                            <textarea class="form-control" name="love_count"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Save">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>