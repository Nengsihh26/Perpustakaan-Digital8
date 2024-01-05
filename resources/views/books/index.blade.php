<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <!-- Tambahkan stylesheet kustom untuk penataan tampilan -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Data Buku</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="id" readonly class="form-control">
            </div>
            <div class="mb-3">
                <label for="book-name" class="form-label">Book Name</label>
                <input type="text" name="book_name" id="book-name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author_id" id="author" class="form-control">
                    <option value="">-- Pilih Author --</option>
                    @foreach ($dataAuthor as $a)
                        <option value="{{ $a['author_id'] }}">{{ $a['author_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" id="button-reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($num = 1)
                @foreach ($data as $b)
                    <tr class="row-data">
                        <td>{{ $num++ }}</td>
                        <td>{{ $b['id'] }}</td>
                        <td>{{ $b['book_name'] }}</td>
                        <td>{{ $b['author_name'] }}</td>
                        <td>{{ $b['published_at'] }}</td>
                        <td>
                            <button id="button-edit" class="btn btn-warning button-edit"
                                data-id="{{ $b['id'] }}"
                                data-name="{{ $b['book_name'] }}"
                                data-author="{{ $b['author_id'] }}">Edit</button>
                        </td>
                        <td>
                            <form action="{{ url('/books/delete-book?id=').$b['id'] }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan bagian script pada akhir file HTML Anda -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var buttons = $('.button-edit');

    $(document).ready(function() {
        clearForm();

        buttons.each(function(index) {
            $(this).on('click', function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                var author = $(this).data('author');

                $('#id').val(id);
                $('#book-name').val(name);
                $('#author').val(author);
            });
        });

        $('#button-reset').on('click', function () {
            clearForm();
        });

        function clearForm(){
            $('#id').val('');
            $('#book-name').val('');
            $('#author').val('');
        }
    });
</script>
</body>
</html>
