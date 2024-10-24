
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 11 Multi Auth</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-light">
        <div class="wrapper">
            <h4 class="text-center">Register Here</h4>
            <form action="{{ route('customer.register') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="text" value="{{ old('f_name') }}" class="form-control" name="f_name" id="f_name" placeholder="First Name" >
                    
                    @error('f_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                                                         
                <div class="input-box">
                    <input type="text" value="{{ old('l_name') }}" class="form-control" name="l_name" id="l_name" placeholder="Last Name" >
                    
                    @error('l_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                                        
                <div class="input-box">
                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email" >
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                                       
                                       
                <div class="input-box">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                    
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                                  
                <div class="input-box">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password" >
                   
                        @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
                <button class="btn " type="submit">Register Now</button>
                <div class="register-link ">
                    <p>click here to <a href="{{ route('customer.loginview') }}">login</a></p>
                </div>              
            </form>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
