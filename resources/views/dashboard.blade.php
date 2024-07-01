<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
   
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <form action="">
                @csrf
            <label for="city">city</label>
            <input type="text" class="city" id="city" placeholder="add city">
            </form>
        </div>
        <div class="content">
            content
        </div>
    </div>
</body>
</html>
