<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if(Session::has('error'))
        {{ session('error') }}
    </div>
    @endif
    <div class="wrapper">
        <h4 class="text-center" style="color: black">Admin Login</h4>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
       <div class="input-box">
        <input type="email" id="aemail" name="aemail" value="{{ old('aemail') }}" placeholder="Email"><br><br>
    </div>
        <div class="input-box">
        <input type="password" id="apassword" name="apassword" placeholder="Password">
        </div>
        <button class="btn" type="submit">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>