<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="mt-3 space-y-2">
                @foreach ($comments as $comment)
                    <div class="flex items-start gap-2">
                        
                        <div class="bg-[rgba(0,0,0,0.05)] rounded-2xl px-3 py-2 text-sm flex-1">
                            
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
</body>
</html>