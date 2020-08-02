<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>EDIT DATA</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/home" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    

                    <form method="post" action="/CRUD/home/update/{{ $data->id }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <b>Images</b><br/>
                            <input type="file" name="image"> 
                        </div>

                        <div class="form-group">
                            <label>love count</label>
                            <textarea name="love_count" class="form-control" placeholder=""> {{ $data->love_count }} </textarea>

                             @if($errors->has('love_count'))
                                <div class="text-danger">
                                    {{ $errors->first('love_count')}}
                                </div>
                            @endif

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