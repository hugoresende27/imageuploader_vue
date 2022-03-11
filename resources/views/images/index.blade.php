<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Uploading with Vue and Laravel</title>
    

    
    <meta name="csrf-token" content="{{ csrf_token() }}" >


</head>
<body>

    <div class="max-w-lg mx-auto mt-24">
        <h1 class="text-4xl font-bold text-center">
            Image Uploader
        </h1>

        <div id="app">


        </div>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>