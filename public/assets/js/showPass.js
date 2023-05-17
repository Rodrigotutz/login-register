let pass = document.querySelector(".pass")
let passRe = document.querySelector(".passRe")
let showPass = document.querySelector(".showPass")

showPass.addEventListener("click", () => {
    if(pass.type === "password") {
        pass.type = "text"
        passRe.type = "text"
    } else {
        pass.type = "password"
        passRe.type = "password"
    }
})