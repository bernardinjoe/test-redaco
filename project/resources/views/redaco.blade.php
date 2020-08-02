<!DOCTYPE html>
<html>
<style>
body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: #505050;
  color: white;
}
</style>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>REDACO</title>
    </head>

<body>

<div class="container">
  <div class=" mt-5">
      <div class="card-header text-center"  style ="background-color:red">
          Redaco
      </div>
      <div class="card-body" >
        <form method="post" action="/shot" enctype="multipart/form-data">
        {{ csrf_field() }}
        <a onclick="myFunction()" class="btn btn-primary">Toggle dark mode</a>
            <a href="/index" class="btn btn-primary">Index</a>
            <br/>
            <br/>
            <div class="form-group">
                <b>shot</b>
                <textarea class="form-control" name="shot"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="GO">
            </div>
      </div>
      
  </div>
</div>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

</body>
</html>