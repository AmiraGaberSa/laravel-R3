<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Post</title>
</head>
<body>
   <h1>{{ $post->postTitle }}</h1> 
   <h5>Author : {{ $post->author }}</h5> 
   <h5>created at : {{ $post->created_at }}</h5> 
   <h5>updated at : {{ $post->updated_at }}</h5> 
   <p>Description : {{ $post->description }}</p> 
   <p>{{ ($post->published)?"Published" :"Not Published" }}</p> 
</body>
</html>