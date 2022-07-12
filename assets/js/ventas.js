
export let renderVentas = () => {

    let cobraVentas = document.querySelectorAll(".cobra-venta");// se pone un punto al referirse a una clase

    cobraVentas.forEach(cobraVenta => {

        cobraVenta.addEventListener("click", (event) => {

            let sendPostRequest = async () => { // async - await

                // jason inicio

                let data = {}; // data es una variable que almacena el json
                data["route"] = 'cobraVenta';
                data["metodo_pago"] = cobraVenta.dataset.metodopago;
                data["mesa_id"] = cobraVenta.dataset.mesaid;

                //
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'POST', 
                    body: JSON.stringify(data)
                }) // json fin
                .then(response => {
                    location.reload(true);
                    if (!response.ok) throw response;
                    
                    return response.json();
                })
                .then(json => {
    
                })
                .catch ( error =>  {
                    console.log(error);
                });
            };
    
            sendPostRequest();
        }); 
    });
}