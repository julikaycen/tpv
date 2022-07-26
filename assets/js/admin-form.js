export let renderAdminForm = () => {

    let adminForm = document.querySelector('.admin-form');
    let createFormButton = document.querySelector('.create-form-button');
    let sendFormButton = document.querySelector('.send-form-button'); // BOTON DE  CONFIRMAR, STORE
    let createLayout = document.querySelector('.create-layout');
    let tableContainer = document.querySelector('tbody');

    if(createFormButton) { // resetea formulario
        
        createFormButton.addEventListener("click", (event) => {
            adminForm.reset(); // resetea formulario
        });
    }

    if(sendFormButton) {

        sendFormButton.addEventListener("click", (event) => {

            event.preventDefault(); // ENVIAR FORMULARIO MEDIANTE PARAMETROS POR LA URL, EVITAR QUE ROBEN DATOS
                
            let sendPostRequest = async () => {
                
                let data = {};
                let formData = new FormData(adminForm); // RECOJE TODOS LOS DATOS DEL FORMULARIO, TIPO FORMDATA, OBJ DE JAVASCRIPT
                formData.append("route", adminForm.dataset.route);

                formData.forEach(function(value, key){ // EL 1º SIEMPRE ES EL VALOR, 2º LA CLAVE
                    data[key] = value;
                });

                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'POST',
                    body: JSON.stringify(data)
                })
                .then(response => {
                
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    if(json.id == "") { // HECHO EN TICKETS, PLATO NUEVO

                        let newElement = createLayout.cloneNode(true);
                        newElement.classList.remove('d-none', 'create-layout');
                        newElement.dataset.element = json.newElement.id; // DATASET 
                        // PARA ELIMINAR
                        newElement.querySelector('.delete-table-button').dataset.id = json.newElement.id;

                        Object.entries(json.newElement).forEach(([key, value]) => {
                            if(newElement.querySelector("." + key)){
                                newElement.querySelector("." + key).innerHTML = value;
                            }
                        });

                        tableContainer.appendChild(newElement);

                        document.dispatchEvent(new CustomEvent('renderAdminTable'));

                    }else{

                        let element = document.querySelector("[data-element='" + json.id + "']");

                        Object.entries(json.newElement).forEach(([key, value]) => {
                            if(element.querySelector("." + key)){
                                element.querySelector("." + key).innerHTML = value;
                            }
                        });

                        document.dispatchEvent(new CustomEvent('renderAdminTable'));
                    }
                })
                .catch ( error =>  {
                    console.log(error);
                });
            };

            sendPostRequest();
        }); 
    }
    
};