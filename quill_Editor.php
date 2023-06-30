<?php
if ($_POST) {
    $metin = $_POST["metin"];
    echo "<div class='ortala' style='height: unset; color: red'><b>Quil Editor den gelen değer:</b></div>";
    echo "<div class='ortala' style='height: unset'>$metin</div>";
} ?>

<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quill Editor</title>

    <!-- Include quill editor stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>

        .ortala {
            margin-left: 20%;
            margin-right: 20%;
            height: 40%;
        }

        .buton {
            margin-top: 2%;
            padding: 1%;
            width: 25%;
            margin-left: 36%;
            margin-right: 64%;
        }

    </style>
</head>

<form method="post" class="ortala">

    <div id="quilleditor"></div>
    <input type="hidden" id="quill_html" name="metin">
    <button type="submit" class="buton">GÖNDER</button>
    <br>

</form>

<div class="ortala" style="margin-top: 8%">
    <button onclick="dosyaDown()" class="buton">PROJEYİ İNDİR</button>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<body>

<script>
    //https://quilljs.com/docs/modules/toolbar/
    //Toolbar ayarları için ilgili bağlantıyı ziyaret edip orada bulunan bilgilerden faydalanabilirsiniz.

    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
        [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
        [{'direction': 'rtl'}],                         // text direction

        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
        [{'header': [1, 2, 3, 4, 5, 6, false]}],

        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'font': []}],
        [{'align': []}],
        ['link', 'image', 'video'],
        ['clean']                                         // remove formatting button
    ];

    const quill = new Quill('#quilleditor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    quill.on('text-change', function (delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });

    function dosyaDown() {
        var path = window.location.pathname;
        document.location.href = path.substring(0, path.lastIndexOf('/')) + "/quill.zip";
    }

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php if ($_POST) echo "<script>alert('$metin')</script>"; ?>
</body>
</html>