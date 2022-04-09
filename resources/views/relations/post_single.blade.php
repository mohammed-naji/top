<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single post</title>
    <style>
        body {
            overflow-x: hidden;
        }
        .navigation {
            position: fixed;
            width: 100px;
            height: 100px;
            background: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            /* border-radius: 50%; */
            transition: all .3s ease;
            top: 50%;
            transform: translateY(-50%);
        }

        .navigation:before {
            content: '';
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,.4);
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .navigation.next {
            right: -70px;
        }
        .navigation.next:hover {
            right: 0px;
            color: #fff;
        }
        .navigation.prev {
            left: -70px;
        }

        .navigation.prev:hover {
            left: 0px;
            color: #fff
        }
    </style>
</head>
<body>

    @if ($next_post)
    <a style="background: url({{ asset('uploads/'.$next_post->image) }});background-size: cover" href="{{ route('posts.single', $id+1) }}" class="navigation next">Next</a>
    @endif

    @if ($prev_post)
    <a style="background: url({{ asset('uploads/'.$prev_post->image) }});background-size: cover" href="{{ route('posts.single', $id-1) }}" class="navigation prev">Previous</a>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">

            <div class="col-md-8">

            <h1 class="text-center">{{ $post->title }}</h1>
            <img class="w-75 mx-auto d-block mt-5 mb-4" src="{{ asset('uploads/'. $post->image) }}" alt="">
            <p>{{ $post->content }}</p>


            <hr>

            <h2>All Comments ({{ $post->comments->count() }})</h2>

            @if ($post->comments->count() > 0)
            @foreach ($post->comments as $comment)
            <div class="comment">
                <b>{{ $comment->user->name }}</b>
                <span>{{ $comment->created_at->diffForHumans() }}</span>
                <p class="mt-2">{{ $comment->comment }}</p>
            </div>
            @endforeach

            @else
            <p class="text-center">No Comment Yet</p>
            @endif


            </div>


        </div>
    </div>

</body>
</html>
