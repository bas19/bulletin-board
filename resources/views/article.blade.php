<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>

        <style>
        form { width: 100%; }
        </style>
    </head>
    <body>
        <div id="app" class="container">
            <h1 class="mt-5">Article Title</h1>
       
            <div class="row">
               - Title
               - Content 
               - total Votes
            </div>
        </div>
        <script>
            new Vue({
                el: '#app',
                data: {},
                created() {
                    console.log('test')
                }
            })
        </script>
    </body>
</html>
