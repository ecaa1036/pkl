<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{asset('auth/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Masukan Token!</h2>
  <form id="login-form" action="masuk" method="post">
    @csrf
    <p>
    {{-- <label for="">Token Masuk</label> --}}
    <input type="text" id="token_masuk" name="token_masuk" placeholder="Token Masuk Silahkan Diisi" required><i class="validation"><span></span><span></span></i>
    </p>
    {{-- <p>
    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    </p> --}}
    <p>
    <input type="submit" id="login" value="Masuk">
    </p>
  </form>
  <div id="create-account-wrap">
    {{-- <p>Not a member? <a href="#">Create Account</a><p> --}}
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
