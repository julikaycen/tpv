
export let renderTickets = () => {

    let deleteProducts = document.querySelectorAll(".delete-product");// se pone un punto al referirse a una clase

    deleteProducts.forEach(deleteProduct => {

        deleteProduct.addEventListener("click", (event) => {

            let sendPostRequest = async () => { // async - await

                // jason inicio

                let data = {}; // data es una variable que almacena el json
                data["route"] = 'deleteProduct';
                data["id"] = deleteProduct.dataset.ticketid; 
                data["table_id"] = deleteProduct.dataset.table; 
                
                //
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'DELETE',
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

    let deleteAlls = document.querySelectorAll(".delete-all");// se pone un punto al referirse a una clase

    deleteAlls.forEach(deleteAll => {

        deleteAll.addEventListener("click", (event) => {

            let sendPostRequest = async () => { // async - await

                // jason inicio

                let data = {}; // data es una variable que almacena el json
                data["route"] = 'deleteAll';
                //data["id"] = deleteAll.dataset.ticketid; 
                data["table_id"] = deleteAll.dataset.table; 
                //
                let response = await fetch('web.php', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'DELETE',
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