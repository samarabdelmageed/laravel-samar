<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@include('includes.nav')
<div class="container">
  <h2>Cars List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Decription</th>
        <th>Published</th>
    </tr>
    </thead>

    @foreach($cars as $car)  
    <tbody>
      <tr>
        <td>{{$car->title}}</td>
        <td>{{$car->description}}</td>
        <td>{{$car->published ? 'yes':'no'}}</td>
        <!-- Another method to transform 1 and 0 in published into yes and no -->
        <!-- <td>
            {{$car->published}}
            @if($car->published)
                Yes
            @else
                No
            @endif
        </td> -->
      </tr>
    @endforeach
   
    </tbody>
  </table>
</div>

</body>
</html>
