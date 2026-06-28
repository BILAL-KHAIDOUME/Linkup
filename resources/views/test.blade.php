<!DOCTYPE html>
<html>
<head>
    <title>LinkUp Feed</title>
</head>
<body>

<h1>Feed</h1>

@foreach($posts as $post)

<div style="border:1px solid #ccc; margin:20px; padding:15px;">

    <img
        src="{{ $post->user->image_url ?? 'https://via.placeholder.com/80' }}"
        width="80"
        height="80"
        alt="Profile Picture">

    <h3>{{ $post->user->name }}</h3>

    <p>{{ $post->user->headline }}</p>

    <hr>

    <p>{{ $post->content }}</p>

    <small>{{ $post->created_at->diffForHumans() }}</small>

</div>

@endforeach

</body>
</html>