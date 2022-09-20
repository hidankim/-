const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const password = loginForm.password.value;

    switch(password)
    {
        case "f3nj22l":window.location.href="./inputpage/input.php?middle_1_1"; break;
        case "dkm31ef":window.location.href="./inputpage/input.php?middle_1_2"; break;
        case "ej332dk":window.location.href="./inputpage/input.php?middle_1_3"; break;
        case "rj32we3":window.location.href="./inputpage/input.php?middle_1_4"; break;
        case "3kgh2if":window.location.href="./inputpage/input.php?middle_2_1"; break;
        case "ei3jf0f":window.location.href="./inputpage/input.php?middle_2_2"; break;
        case "3jskw2t":window.location.href="./inputpage/input.php?middle_2_3"; break;
        case "dkrj429":window.location.href="./inputpage/input.php?middle_2_4"; break;
        case "kwris3l":window.location.href="./inputpage/input.php?middle_3_1"; break;
        case "dm4jflw":window.location.href="./inputpage/input.php?middle_3_2"; break;
        case "3j5jh3od":window.location.href="./inputpage/input.php?middle_3_3"; break;
        case "ej4bfk2":window.location.href="./inputpage/input.php?middle_3_4"; break;
        case "eo2p2ke":window.location.href="./inputpage/input.php?high_1_1"; break;
        case "3pdo12j":window.location.href="./inputpage/input.php?high_1_2"; break;
        case "ejfn399":window.location.href="./inputpage/input.php?high_1_3"; break;
        case "dkwj495":window.location.href="./inputpage/input.php?high_1_4"; break;
        case "e20dj3h":window.location.href="./inputpage/input.php?high_2_1"; break;
        case "wj2ndj4":window.location.href="./inputpage/input.php?high_2_2"; break;
        case "39djth3":window.location.href="./inputpage/input.php?high_2_3"; break;
        case "2kdjt5i":window.location.href="./inputpage/input.php?high_2_4"; break;
        case "ei3kw2j":window.location.href="./inputpage/input.php?high_3_1"; break;
        case "ej40d93":window.location.href="./inputpage/input.php?high_3_2"; break;
        case "2kejgh4":window.location.href="./inputpage/input.php?high_3_3"; break;
        case "3l10dpl":window.location.href="./inputpage/input.php?high_3_4"; break;
        default:alert("Wrong Password"); break;
    }
})