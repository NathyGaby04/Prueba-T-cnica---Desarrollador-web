
let form = document.getElementById('miFormulario');
let respuesta = document.getElementById('respuesta');

form.addEventListener('submit', function(event){
     event.preventDefault(); 

     const email = form.querySelector('input[name="email"]').value;
     const password = form.querySelector('input[name="password"]').value;


     if (validarEmail(email) && validarcontraseña(password)){

        let datos = new FormData(form);
     
        fetch('api.php', { 
                method: 'POST',
                body: datos
            })

            .then(res => res.json()) 
            .then(data => {
            console.log(data)
            if(data === 'Llena todos los campos'){
                    respuesta.innerHTML = `
                    <div role="alert">
                            Llena todos los campos
                        </div>
                    `
           }else{
            respuesta.innerHTML = `
                <div role="alert">
                        ${data}
                    </div>
                `
                window.location.href = 'read.php';
           }
        })       

        }else{
        respuesta.innerHTML = "Insertar todos los campos corectamente";
     }
     
    });

function validarEmail (email){
    const validacion = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\w{2,10})+$/;
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

