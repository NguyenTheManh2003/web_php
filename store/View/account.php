<!-- --------------------account page---------------- -->
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="images/image1.png" alt width="100%">
            </div>

            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="Login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicate">
                    </div>
                    <form id="loginForm" action="index.php?action=login&act=login_action" method="post">
                        <input type="text" name="user" placeholder="Username">
                        <input type="password"  name="pass"  placeholder="Password">
                        <button type="submit" class="btn" name="submit">login</button>
                        <a href="">Forgot password</a>
                    </form>

                    <form id="RegisterForm" action="index.php?action=registration&act=dangky_action" method="post">
                        <input type="text" name="tenkhachhang" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="matkhau" placeholder="Password">
                        <button type="submit" name="submit" class="btn">Register</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var LoginForm = document.getElementById("loginForm");
    var RegForm = document.getElementById("RegisterForm");
    var Indicator = document.getElementById("Indicate")

    function register() {
        RegForm.style.transform = 'translateX(0px)';
        LoginForm.style.transform = 'translateX(0px)';
        Indicator.style.transform = 'translateX(100px)';

    }

    function Login() {
        RegForm.style.transform = 'translateX(300px)';
        LoginForm.style.transform = 'translateX(300px)';
        Indicator.style.transform = 'translateX(0px)';

    }
</script>