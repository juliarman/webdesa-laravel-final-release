@extends('pages.administrator.layout')


@section('main-content')


    <h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>

@endsection
