<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Display Notes</h1>
        <div id="notes-container">
            @foreach($notes as $note)
                <div class="note">
                    <h3 class="note-title">{{ $note->title }}</h3>
                    <p class="note-topic-id">Topic: {{ $note->topic->name }}</p>
                    <p class="note-description">{{ $note->description }}</p>
                    <p class="note-keywords">Keywords: {{ $note->mots_cles }}</p>
                    <img src="{{ asset('C:\public\storage\notes' . $note->photo) }}" alt="Image de la note" class="img-fluid">
                    <p class="note-published-at">Published at: {{ $note->created_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
