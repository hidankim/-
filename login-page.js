const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const password = loginForm.password.value;

    if (password === "f3nj22l"||"dkm31ef"||"ej332dk"||"rj32we3"||"3kgh2if"||"ei3jf0f"||"3jskw2t"||"dkrj429"||"kwris3l"||"dm4jflw"||"3j5jh3od"||"ej4bfk2"||"eo2p2ke"||"3pdo12j"||"ejfn399"||"dkwj495"||"e20dj3h"||"wj2ndj4"||"39djth3"||"2kdjt5i"||"ei3kw2j"||"ej40d93"||"2kejgh4"||"3l10dpl") {
        window.location.href="./inputpage/input.php"+window.location.href;
    } else {
        loginErrorMsg.style.opacity = 1;
    }
})