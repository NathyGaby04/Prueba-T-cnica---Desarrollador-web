const username = document.querySelector("#username")
const email = document.querySelector("#email")
const password= document.querySelector("#password")
const btnsubmit = document.querySelector("#submit")

let mensaje = "";
btnsubmit.addEventListener("click", async function(event) {
    event.preventDefault()
    if(username.value == ""){
        username.classList.add("errorField")
    }else{
        username.classList.remove("errorField")
    }

    if(email.value == "" || validarEmail(email.value)==false){
        email.classList.add("errorField")
        alert("El campo está vacio o no es valido el email") 
    }else{
        email.classList.remove("errorField")
    }

    if(password.value == "" || validarcontraseña(password.value)==false){
        password.classList.add("errorField")
        alert("Contraseña no valida")
    }else{
        password.classList.remove("errorField")
    }
    let user = new User(username);
    let email = new Email(email);
    let password = new Password(password);
    fetch(`,/api.php`,{
        method: "POST",
        body:user.email.Password.toString(),
    })
    .then(res => res.json());
    .then
})


function validarEmail (email){
    const validacion = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\w{2,10})+$/
    const result = validacion.test(email);
    console.log(result);
    return result;
}  

function validarcontraseña (contraseña)
{
    const validacion = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*]).{8,}$/;
    const result = validacion.test(contraseña);
    console.log(result);
    return result;
    
}

const datos = {
user: username.value,
correo: email.value,
contraseña: password.value,
}

const opciones = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(datos)
}

try{
    const response = await fetch(`http://localhost/api-flight/auth`,opciones)
    const json = await response.json()
    if (json?.token){
        window.location(home.html)
    }
} catch{
    mensaje = "Datos no validos"
}
