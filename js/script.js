document.addEventListener("DOMContentLoaded", ()=>{
    let registerButton  = document.querySelector(".registerButton");
    let password  = document.querySelector("#password");
    let password2  = document.querySelector("#password2");
    let warning  = document.querySelector(".warning");
    console.log(password);

    registerButton.addEventListener("click", (e)=>{
        // e.preventDefault();
        if (password.value != password2.value) {
            warning.innerHTML= " Пароли не совпадают";
            return;
        }

    })

})