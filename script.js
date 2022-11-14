let validationUsername = document.getElementById("validationUsername")
validationUsername.addEventListener("focusout", function(){
    removeClass(validationUsername)
    if(validationUsername.value==="") {
        validationUsername.classList.add("inputKo")
    } else {
        validationUsername.classList.add("inputOk")
    }
})


let validationEmail = document.getElementById("validationEmail")
let pErrorEmail = document.getElementById("errorEmail")
validationEmail.addEventListener("focusout", function(){
    removeClass(validationEmail)
    if(!validateEmail(validationEmail.value)) {
        validationEmail.classList.add("inputKo")
        pErrorEmail.style.display="block"
        pErrorEmail.classList.add("errorEmailClass")
    } else {
        validationEmail.classList.add("inputOk")
        pErrorEmail.style.display="none"
    }
})
function validateEmail(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) return true;
    else return false;   
}

let validationPassword = document.getElementById("validationPassword")
let char8min = document.getElementById("char8min")
let lletraMin = document.getElementById("lletraMin")
let lletraMaj = document.getElementById("lletraMaj") 
let num = document.getElementById("num")
let specialChar = document.getElementById("specialChar")
validationPassword.addEventListener("input", function(){
    removeClass(validationPassword)
    if(!validationPassword.value.length >= 8||!minuscOk(validationPassword.value)||!majuscOk(validationPassword.value)||!numOk(validationPassword.value)) {
        validationPassword.classList.add("inputKo")
    } else {
        validationPassword.classList.add("inputOk")
    }

    if(validationPassword.value.length >= 8) char8min.style.color = "green"
    else char8min.style.color = "red";
    if(minuscOk(validationPassword.value)) lletraMin.style.color = "green"
    else lletraMin.style.color = "red";
    if(majuscOk(validationPassword.value)) lletraMaj.style.color = "green"
    else lletraMaj.style.color = "red";
    if(numOk(validationPassword.value)) num.style.color = "green"
    else num.style.color = "red";
    if(specialCharOk(validationPassword.value)) specialChar.style.color = "green"
    else specialChar.style.color = "red";
})
function minuscOk(password) {
    if(/[a-z]/g.test(password)) return true;
    else return false;
}
function majuscOk(password) {
    if(/[A-Z]/g.test(password)) return true;
    else return false;
}
function numOk(password) {
    if(/[0-9]/g.test(password)) return true;
    else return false;
}
function specialCharOk(password) {
    if( /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) return true;
    else return false;
}


function removeClass(className) {
    let arrayClasses = Array.from(className.classList) 
    if(arrayClasses.indexOf("inputKo") != -1) arrayClasses.splice(arrayClasses.indexOf("inputKo"), 1)
    if(arrayClasses.indexOf("inputOk") != -1) arrayClasses.splice(arrayClasses.indexOf("inputOk"), 1)
    className.className = arrayClasses.join(" ")
}


function validateForm() {
    if (!comprobaFormCorrecte()) {
        alert("Falla alguna de les propietrats");
        return false;
    }
    return true
}
function comprobaFormCorrecte() {
    let resposta = true;
    let valeUser = Array.from(validationUsername.classList) 
    if(valeUser.indexOf("inputKo") != -1) resposta = false
    let valeEmail = Array.from(validationEmail.classList)
    if(valeEmail.indexOf("inputKo") != -1) resposta = false
    let valePassword = Array.from(validationPassword.classList)
    if(valePassword.indexOf("inputKo") != -1) resposta = false
    return resposta
} 