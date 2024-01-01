<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Car</title>
</head>
<body>
   <h1>{{ $car->title }}</h1> 
   <h5>created at : {{ $car->created_at }}</h5> 
   <h5>updated at : {{ $car->updated_at }}</h5> 
   <p>{{ $car->description }}</p> 
   <p>{{ ($car->published)?"Published" :"Not Published" }}</p> 
   <p>{{ $car->category->cat_name }}</p> 
</body>
</html>