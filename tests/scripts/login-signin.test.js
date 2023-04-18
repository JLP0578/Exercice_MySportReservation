let LoginDOM = `
<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" action="process_login.php" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="login">Login</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required value="test@example.com" type="text" class="form-control" id="login_email" name="email" placeholder="you@exemple.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required value="General*2000" type="password" class="form-control" id="login_password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="login_csrf_token" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
            <button type="submit" class="form-control btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>`;

let SignDOM = `
<div class="d-flex flex-row flex-wrap justify-content-center m-3 card p-4">
    <form method="POST" action="process_signup.php" class="d-flex flex-column flex-wrap justify-content-between">
        <h2 class="type_form" data-type_name="sign-in" >Sign-in</h2>
        <div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-vcard"></i></span>
                </div>
                <input required type="text" value="Username123" class="form-control" id="signin_username" name="username" placeholder="Username" pattern="^[a-zA-Z0-9]$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                </div>
                <input required type="text" value="test@example.com" class="form-control" id="signin_email" name="email" placeholder="you@exemple.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" value="General*2000" class="form-control" id="signin_password" name="password" placeholder="Password" pattern=".{8,}" title="8 or more characters">
            </div>
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                </div>
                <input required type="password" value="General*2000" class="form-control" id="signin_re_password" name="re_password" placeholder="Confirm password" pattern=".{8,}" title="8 or more characters">
            </div>
        </div>
        <div class="input-group input-group-sm mb-2">
            <input required type="hidden" id="signin_csrf_token" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <button type="submit" class="form-control btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>`;

let BothDOM = `
<div class="d-flex flex-row flex-wrap justify-content-center m-3">
    ${LoginDOM}
    ${SignDOM}
</div>`;


// QUnit.module("[Login-Signin]: BothDOM", function() {
//     QUnit.test('isLoginOrAndSign()', function(assert) {
//         isLoginOrAndSign();
//         assert.false(isLogin, 'le formulaire login est pas présent');
//         assert.false(isSign, 'le formulaire sign-in est pas présent');
        
//         let container = document.getElementById('container');
//         container.innerHTML = BothDOM;

//         isLoginOrAndSign();
//         assert.true(isLogin, 'le formulaire login est présent');
//         assert.true(isSign, 'le formulaire sign-in est présent');

        
//     });
//     QUnit.test('loginProcess()', function(assert) {
//         let container = document.getElementById('container');
//         container.innerHTML = BothDOM;

//         isLogin = true;
//         assert.true(loginProcess(),' return true');

//         isLogin = false;
//         assert.false(loginProcess(),' return false');
//     });
//     QUnit.test('signinProcess()', function(assert) {
//         let container = document.getElementById('container');
//         container.innerHTML = BothDOM;

//         isSign = true;
//         assert.true(signinProcess(),' return true');

//         isSign = false;
//         assert.false(signinProcess(),' return false');
//     });
// });

QUnit.module("[Login-Signin]: Verify inputs", function() {
    QUnit.test("verifyUserName()", function(assert) {
        // Tester avec un nom d'utilisateur valide
        assert.ok(verifyUserName("username"), "Le nom d'utilisateur 'username' est valide.");
        assert.ok(verifyUserName("username123"), "Le nom d'utilisateur 'username123' est valide.");
        assert.ok(verifyUserName("Username"), "Le nom d'utilisateur 'Username' est valide.");
        assert.ok(verifyUserName("Username123"), "Le nom d'utilisateur 'Username123' est valide.");

        // Tester avec un nom d'utilisateur invalide
        assert.notOk(verifyUserName("username$%"), "Le nom d'utilisateur 'username$%' est invalide.");
        assert.notOk(verifyUserName("username#$^&"), "Le nom d'utilisateur 'username#$^&' est invalide.");
        assert.notOk(verifyUserName("usernameabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$"), "Le nom d'utilisateur est trop long.");
    });
    QUnit.test("verifyEmail()", function(assert) {
        // Tester avec une adresse email valide
        assert.ok(verifyEmail("test@example.com"), "L'adresse email test@example.com est valide.");
        
        // Tester avec une adresse email invalide
        assert.notOk(verifyEmail("test"), "L'adresse email 'test' est invalide.");
        assert.notOk(verifyEmail("test@"), "L'adresse email 'test@' est invalide.");
        assert.notOk(verifyEmail("test@example"), "L'adresse email 'test@example' est invalide.");
        assert.notOk(verifyEmail("test@example."), "L'adresse email 'test@example.' est invalide.");
        assert.notOk(verifyEmail("test@@example.com"), "L'adresse email 'test@@example.com' est invalide.");
    });
    QUnit.test("verifyPassword()", function(assert) {
        // Tester avec un nom d'utilisateur valide
        assert.ok(verifyPassword("General*2000"), "Le mot de passe 'General*2000' est valide.");
        assert.ok(verifyPassword("dD-8kK+2"), "Le mot de passe 'dD-8kK+2' est valide.");
        assert.ok(verifyPassword("Password123*"), "Le mot de passe 'Password123*' est valide.");
        assert.ok(verifyPassword("Password456*"), "Le mot de passe 'Password456*' est valide.");
        assert.ok(verifyPassword("Password789*"), "Le mot de passe 'Password789*' est valide.");
        assert.ok(verifyPassword("Password4dmin*"), "Le mot de passe 'Password4dmin*' est valide.");

        // Tester avec un mot de passe invalide
        assert.notOk(verifyPassword("mdp"), "Le mot de passe 'mdp' est invalide.");
        assert.notOk(verifyPassword("password"), "Le mot de passe 'password' est invalide.");
        assert.notOk(verifyPassword("Password"), "Le mot de passe 'Password' est invalide.");
        assert.notOk(verifyPassword("password123"), "Le mot de passe 'password123' est invalide.");
        assert.notOk(verifyPassword("password$%"), "Le mot de passe 'password$%' est invalide.");
        assert.notOk(verifyPassword("password#$^&"), "Le mot de passe 'password#$^&' est invalide.");
        assert.notOk(verifyPassword("passwordabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$"), "Le mot de passe est trop long.");
    });
});