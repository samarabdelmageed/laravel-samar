<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
    <h1> Post Data </h1>
    <h2> Car Title: </h2> <h3 style="color:blue;"> {{$car->title}} </h3>
    <h2> Created at: </h2> <h3 style="color:blue;">  {{$car->created_at}} </h3>
    <h2> Updated at: </h2> <h3 style="color:blue;"> {{$car->updated_at}} </h3>
    <h2> Description: </h2> <p style="color:blue;"> {{$car->description}} </p>
    <h2> Category: </h2> <p style="color:blue;"> {{$car->category->cat_name}} </p>
    <h2> Published or Not Published: </h2> <h3 style="color:blue;"> {{ $car->published? "Published" : "Not Published" }} </h3>
    <h2> Car Image: </h2>
    <img src="{{ asset('assets/images/'.$car->image) }}" alt="car" style="width:200px;">

</body>
</html>