
export let renderTickets = () => {

    let deleteProducts = document.querySelectorAll(".delete-product");// se pone un punto al referirse a una clase



    deleteProducts.forEach(deleteProduct => {
        deleteProduct.addEventListener("click", (event) => {
            
            let sendPostRequest = async () => { // async - await

                // jason inicio
                let data = {}; // data es una variable que almacena el json
                data["route"] = 'deleteProduct';
                data["ticket_id"] = deleteProduct.dataset.ticketid; // el valor seria data-price de productos.php
    
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'DELETE',
                    body: JSON.stringify(data)
                }) // json fin
                .then(response => {
                
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