<!DOCTYPE html>
<html>
    <head>
        <title>Words That Sound Like Other Words</title>
        <link rel="stylesheet" href="/css/app.css" media="screen">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-18190450-5', 'auto');
          ga('send', 'pageview');

        </script>
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
