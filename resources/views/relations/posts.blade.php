<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
<style>
    .card img {
        height: 200px;
        object-fit: cover
    }
</style>
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center">All Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('uploads/'.$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <p class="card-text">{{ substr($post->content, 0, 100).'...' }}</p>
                      <a href="{{ route('posts.single', $post->id) }}" class="btn btn-outline-dark w-100">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach

        </div>
    </div>

</body>
</html>
