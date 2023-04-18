/* RegExp */
let regexp_username = /^([A-Za-z0-9]){4,20}$/;
let regexp_email = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
let regexp_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,50}$/;

/* Boolean */

let isOk_login_email;
let isOk_login_password;

let isOk_signin_username;
let isOk_signin_email;
let isOk_signin_password;
let isOk_signin_re_password;

/* ElementsByClassName */
let type_forms;

/* ElementById */
let login_email;
let login_password;
let login_submit;

let signin_username;
let signin_email;
let signin_password;
let signin_re_password;
let signin_submit;

window.addEventListener("DOMContentLoaded", () => {
    console.info("DOM fully loaded and parsed, start JS");

    isLoginOrAndSign();

});

function isLoginOrAndSign(){
    type_forms = _cn('type_form');
    for (let index = 0; index < type_forms.length; index++) {
        const type_name = type_forms[index].dataset.type_name;

        if(type_name == "login") {
            login_email = _id('login_email');
            login_password = _id('login_password');
            login_submit = _id('login_submit');

            login_submit.classList.add("disabled");
            login_submit.disabled = true;

            login_email.addEventListener('change', (event) => {
                isOk_login_email = verifyEmail(login_email.value);
                fieldStyle(isOk_login_email, event.target, type_name, login_submit);
            });
            login_password.addEventListener('change', (event) => {
                isOk_login_password = verifyPassword(login_password.value);
                fieldStyle(isOk_login_password, event.target, type_name, login_submit);
            });
        }

        if(type_name == "sign-in") {
            signin_username = _id('signin_username');
            signin_email = _id('signin_email');
            signin_password = _id('signin_password');
            signin_re_password = _id('signin_re_password');
            signin_submit = _id('signin_submit');

            signin_submit.classList.add("disabled");
            signin_submit.disabled = true;

            signin_username.addEventListener('change', (event) => {
                isOk_signin_username = verifyUserName(signin_username.value);
                fieldStyle(isOk_signin_username, event.target, type_name, signin_submit);
            });
            signin_email.addEventListener('change', (event) => {
                isOk_signin_email = verifyEmail(signin_email.value);
                fieldStyle(isOk_signin_email, event.target, type_name, signin_submit);
            });
            signin_password.addEventListener('change', (event) => {
                isOk_signin_password = verifyPassword(signin_password.value);
                fieldStyle(isOk_signin_password, event.target, type_name, signin_submit);
            });
            signin_re_password.addEventListener('change', (event) => {
                isOk_signin_re_password = verifyRe_Password(signin_password.value, signin_re_password.value);
                fieldStyle(isOk_signin_re_password, event.target, type_name, signin_submit);
            });
        }
    }
}

function fieldStyle(boolean,input, type_name, submit) {
    if(boolean) {
        input.classList.add('is-valid');
        input.classList.remove('is-invalid');
    } else {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
    if(type_name == "login") {
        let boolean = (login_email && login_password);
        buttonStyle(boolean, submit);
    }
    if(type_name == "sign-in") {
        let boolean = (isOk_signin_username && isOk_signin_email && isOk_signin_password && isOk_signin_re_password);
        buttonStyle(boolean, submit)
    }
}

function buttonStyle(boolean, button) {
    if(boolean) {
        button.classList.remove("disabled");
        button.disabled = false;
    } else {
        button.classList.add("disabled");
        button.disabled = true;
    }
}

function verifyUserName(usernameValue) {
    return regexp_username.test(usernameValue);
}

function verifyEmail(emailValue){
    return regexp_email.test(emailValue);
}

function verifyPassword(passwordValue) {
    return regexp_password.test(passwordValue);

}
function verifyRe_Password($password, $re_password) {
    return ($password === $re_password);
}