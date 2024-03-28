// <!-- -----------------------script menu-------------------------- -->

    var MenuItems  = document.getElementById('MenuItems');
    MenuItems.style.maxHeight = '0px'
    function menutoggle() {
        if(MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = '200px'
        }
        else {
            MenuItems.style.maxHeight = '0px'
        }
    }


// <!-- ----------------js product------------- -->

    var ProductImg = document.getElementById('ProductImg')
    var SmallImg = document.getElementsByClassName('smallimg')

    SmallImg[0].onclick=function() {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick=function() {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick=function() {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick=function() {
        ProductImg.src = SmallImg[3].src;
    }

    // <!-- ----------------login form------------- -->

    
var LoginForm = document.getElementById("loginForm");
var RegForm = document.getElementById("RegisterForm");
var Indicator  = document.getElementById("Indicate")
function register() {
    RegForm.style.transform ='translateX(0px)';
    LoginForm.style.transform ='translateX(0px)';
    Indicator.style.transform ='translateX(100px)';

}

function Login() {
    RegForm.style.transform ='translateX(300px)';
    LoginForm.style.transform ='translateX(300px)';
    Indicator.style.transform ='translateX(0px)';

}
