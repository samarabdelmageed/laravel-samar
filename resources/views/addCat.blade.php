<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
@include('includes.nav')
<body>
<div class="container">
  <h2>Add new category data</h2>
  <form action="{{route('storeCat')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="cat_name">Category:</label>
      <input type="text" class="form-control" id="cat_name" placeholder="Enter cat_name" name="cat_name" value="{{old('cat_name')}}">
      @error('cat_name')
      {{$message}}
      @enderror
    </div>
    <button type="submit" class="btn btn-default">Insert</button>
  </form>
</div>

</body>
</html>