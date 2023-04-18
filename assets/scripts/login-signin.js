/* Boolean */
let isLogin;
let isSign;

let isOk_login_email;
let isOk_login_password;
let isOk_login_csrf_token;

let isOk_signin_username;
let isOk_signin_email;
let isOk_signin_password;
let isOk_signin_re_password;
let isOk_signin_csrf_token;

/* ElementsByClassName */
let type_forms;

/* ElementById */
let login_email;
let login_password;
let login_csrf_token;

let signin_username;
let signin_email;
let signin_password;
let signin_re_password;
let signin_csrf_token;

window.addEventListener("DOMContentLoaded", () => {
    console.info("DOM fully loaded and parsed, start JS");

    isSign = false;
    isLogin = false;

    isLoginOrAndSign();

    loginProcess();
    signinProcess();
});

function isLoginOrAndSign(){
    type_forms = _cn('type_form');
    for (let index = 0; index < type_forms.length; index++) {
        let type_form = type_forms[index];

        if(type_form.dataset.type_name == "sign-in") {
            isSign = true;

        }
        if(type_form.dataset.type_name == "login") {
            isLogin = true;
        }
    }
}

function loginProcess() {
    if(isLogin === true) {
        login_email = _id('login_email');
        login_password = _id('login_password');
        login_csrf_token = _id('login_csrf_token');
        
        isOk_login_email = verifyEmail(login_email.value);
        isOk_login_password = verifyPassword(login_password.value);
        isOk_login_csrf_token = verifyCRSF_Token();
    }
}

function signinProcess() {
    if(isSign === true) {
        signin_username = _id('signin_username');
        signin_email = _id('signin_email');
        signin_password = _id('signin_password');
        signin_re_password = _id('signin_re_password');
        signin_csrf_token = _id('signin_csrf_token');

        isOk_signin_username = verifyUserName();
        isOk_signin_email = verifyEmail(signin_email.value);
        isOk_signin_password = verifyPassword(signin_password.value);
        isOk_signin_re_password = verifyRe_Password(signin_password.value, signin_re_password.value);
        isOk_signin_csrf_token = verifyCRSF_Token();

    }
}
function verifyUserName() {

}

function verifyEmail(emailValue){
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue));
}

function verifyPassword(passwordValue) {
    return (/^+.{8,}+$/.test(passwordValue))

}
function verifyRe_Password($password, $re_password) {
    return ($password === $re_password);
}

function verifyCRSF_Token() {

}