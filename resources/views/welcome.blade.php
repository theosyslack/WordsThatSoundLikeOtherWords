<!DOCTYPE html>
<html>
    <head>
        <title>Words That Sound Like Other Words</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/js/index.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="container">
          <rhyme-banner :rhyme="rhyme" ></rhyme-banner>
          <rhyme-form></rhyme-form>
        </div>
        <script type="application/json" data-rhyme-data>
            {!! json_encode($data) !!}
        </script>
    </body>
</html>
