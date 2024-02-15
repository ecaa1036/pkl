<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('auth/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container " id="container">
        <div class="form-container sign-in">
            <form action="/login" method="POST" id="loginForm">
                @csrf
                <h1>Sign In </h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your Usernamed password</span>
                <input type="text" name="username" id="emailOrusername" placeholder="Email or Username">
                <input type="password" name="password" id="password" placeholder="password">
                <a href="#"> Forget Your Password?</a>
                <button id="login-btn" type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello Friend!</h1>
                    <p>Register whith you personal details to use all of site featurs</p>
                    <button class="hidden" id="registerBtn">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault(); // Prevent form submission
                
                var emailOrUsername = $("#emailOrusername").val();
                var password = $("#password").val();

                if (emailOrUsername == "" || password == "") {
                    toastr.error("Email atau username dan password harus diisi!");
                } else {
                    $.ajax({
                        method: "POST",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success) {
                                toastr.success("Berhasil login!").then(function () {
                                    // Redirect to home page or perform any other action
                                    window.location.href = "/home";
                                });
                            } else {
                                toastr.error("Gagal login. Periksa kembali email/username dan password Anda.");
                            }
                        },
                        error: function() {
                            toastr.error("Terjadi kesalahan. Silakan coba lagi nanti.");
                        }
                    });

                }
            });
        });
    </script> --}}
</body>
</html>
