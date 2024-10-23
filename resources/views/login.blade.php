
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 11 Multi Auth</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
   
     @if(Session::has('successotp'))
         <script>
             document.addEventListener('DOMContentLoaded', function() {
            alert("{{ session('successotp') }}");
        });
         </script>
        @endif
         @if(Session::has('wrongotp'))
       
         <script>
             document.addEventListener('DOMContentLoaded', function() {
            alert("{{ session('wrongotp') }}");
        });
         </script>
        @endif
          @if (Session::has('error'))
                 <script>
             document.addEventListener('DOMContentLoaded', function() {
            alert("{{ session('error') }}");
        });
         </script>
            @endif        
          <div class="wrapper">
              
       <form action="{{ route('customer.login') }} " method="POST">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="email"  value="{{ old('email') }}" name = "email" id="email" placeholder="  Email"> 
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <i class='bx bxs-user'></i> 
            </div>
            <div class="input-box">
                <input type="Password" placeholder="  Password" name="password" id="password" value="{{ old('password') }}" >
                 @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <i class='bx bxs-lock-alt' ></i>          
           </div>
            <button type="submit" class="btn">Generate Otp</button><br></form>
    
            <form method="POST" action="{{ route('verify.otp') }}">
                @csrf
                <div class="input-box">
                <input type="text" name="otp" placeholder="Enter Otp" required>          
           </div>
           <button type="submit" class="btn">Verify Otp</button><br>
           <br>
            <div class="remember-forgot">
                <label><input type="checkbox"/>Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
           
            <div class="register-link ">
                <p>Don't have an account? <a href="{{ route('customer.registerview') }}">Register</a></p>
            </div>
         </form>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
