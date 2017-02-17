<form action='' method='post'>

    <p><label>Title</label><br />
        <input type="text" name="title" value="<?= $_POST['title']?>">
    </p>

    <p><label>Content</label><br />
        <textarea name='content' >
            <?= $_POST['content']?>
        </textarea>
    </p>

    <hr/>

        <p>
            <input type='submit' name='submit' value='Save post'>
        </p>
</form>

<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=dllocqh35goymlejidw2xuej322z6vmnph5y2k4hry1kyszn"></script>
<script>
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>