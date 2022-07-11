
export let renderVentas = () => {

    let cobraVentas = document.querySelectorAll(".cobra-venta");// se pone un punto al referirse a una clase

    cobraVentas.forEach(cobraVenta => {

        cobraVenta.addEventListener("click", (event) => {

            let sendPostRequest = async () => { // async - await

                // jason inicio

                let data = {}; // data es una variable que almacena el json
                data["route"] = 'cobraVenta';
                data["venta_id"] = cobraVenta.dataset.ventaid; 
                data["numero_ticket"] = cobraVenta.dataset.numticket;
                data["precio_base"] = cobraVenta.dataset.preciobase;
                data["precio_iva"] = cobraVenta.dataset.precioiva;
                data["precio_total"] = cobraVenta.dataset.preciototal;
                data["metodo_pago"] = cobraVenta.dataset.metodopago;
                data["mesa_id"] = cobraVenta.dataset.mesaid;
                data["fecha_emision"] = cobraVenta.dataset.fechaemision;
                data["hora_emision"] = cobraVenta.dataset.horaemision;
                data["activo"] = cobraVenta.dataset.activo;
                data["creado"] = cobraVenta.dataset.creado;
                data["actualizado"] = cobraVenta.dataset.actualizado;

                //
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'POST', // OJO!, ,preguntar a Carlos ----------------------------------
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