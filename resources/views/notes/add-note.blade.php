<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.00.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Notes List</h1>
        <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="topic">Topic</label>
        <input type="text" class="form-control" id="topic" name="topic" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" class="form-control" id="keywords" name="keywords" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" required>
    </div>
    <div class="form-group">
        <label for="discipline_id">Discipline</label>
        <select class="form-control" id="discipline_id" name="discipline_id" required>
            @foreach($disciplines as $discipline)
                <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Note</button>
</form>
        <div id="notes-list">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#notes-form").on("submit", function (event) {
                event.preventDefault();
                var title = $("#title").val();
                var description = $("#description").val();
                var discipline = $("#discipline").val();
                $.ajax({
                    url: "/submit",
                    method: "POST",
                    data: {
                        title: title,
                        description: description,
                        discipline: discipline
                    },
                    success: function (note) {
                        $("#notes-list").append(`
                            <div class="note" id="note-${note.id}">
                                <h2>${note.title}</h2>
                                <p>${note.description}</p>
                                <p>Discipline: ${note.discipline}</p>
                            </div>
                        `);
                        $("#notes-form")[0].reset();
                    }
                });
            });
        });
    </script>
</body>
</html>