<x-app-layout>
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div class="max-w-7xl mx-auto shadow sm:rounded-lg">
        <!-- Create the editor container -->
        <div id="editor" class="max-w-7xl mx-auto p-4 sm:p-8 bg-white  ">
            <h1>some text here</h1>
        </div>

        <form action="/posts" method="post" class="space-y-6">
          @csrf
            <input type="text" name="title" placeholder="enter your post title">
            <input type="hidden" name="content" id="content" value="">
            <button type="submit"> post </button>
        </form>
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    </div>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var input = document.getElementById("content")
        quill.on('text-change', function() {
            input.value = quill.getText();
            console.log(input.value)

        });
    </script>
</x-app-layout>
