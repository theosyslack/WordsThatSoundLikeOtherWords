<!DOCTYPE html>
<html>
    <head>
        <title>Words That Sound Like Other Words</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css" media="screen">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-18190450-5', 'auto');
          ga('send', 'pageview');

        </script>
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
