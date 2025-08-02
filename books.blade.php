<!DOCTYPE html>
<html>
<head>
    <title>📚 Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">📘 Book Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Book Form -->
    <div class="card mb-4 shadow">
        <div class="card-header bg-primary text-white">➕ Add New Book</div>
        <div class="card-body">
            <form method="POST" action="/books">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" name="author" class="form-control" placeholder="Author" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="number" name="year" class="form-control" placeholder="Year" required>
                    </div>
                </div>
                <button class="btn btn-success w-100">Save Book</button>
            </form>
        </div>
    </div>

    <!-- Book List -->
    <div class="card shadow">
        <div class="card-header bg-success text-white">📋 Book List</div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>📕 Title</th>
                        <th>✍️ Author</th>
                        <th>📅 Year</th>
                        <th>🗑️ Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->year }}</td>
                            <td>
                                <form method="POST" action="/books/{{ $book->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">📭 No books found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
