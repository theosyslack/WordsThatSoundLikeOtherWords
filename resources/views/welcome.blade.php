<!DOCTYPE html>
<html>
    <head>
        <title>Words That Sound Like Other Words</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css" media="screen">
        <script src="/js/index.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
            <phrase-banner :phrase="phrase"></phrase-banner>
            <rhyme-form></rhyme-form>
        </div>
        <script type="application/json" data-phrase-data>
            {!! json_encode($phrase) !!}
        </script>
    </body>
</html>
