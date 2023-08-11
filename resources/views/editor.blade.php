<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Create the editor container -->
<div id="editor" class="">
  <p>Hello World!</p>
  <p>Some initial <strong>bold</strong> text</p>
  <p><br></p>
</div>

<form action="/post" method="post">
    <input type="hidden" name="content" id="content">
    <button type="submit"> post </button>
</form>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  document.querySelector('form').addEventListener('submit', function() {document.querySelector('#content').value = quill.root.innerHTML;});
</script>
