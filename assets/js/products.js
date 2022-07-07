// export ->  va a ser importado por alguien
export let renderProducts = () => {


    let addProducts = document.querySelectorAll(".add-product"); // se pone un punto al referirse a una clase
        

    addProducts.forEach(addProduct => {
        addProduct.addEventListener("click", (event) => {
            
            let sendPostRequest = async () => { // async - await

                // json inicio
                let data = {}; // data es una variable que almacena el json
                data["route"] = 'addProduct';
                data["price_id"] = addProduct.dataset.price; // el valor seria data-price de productos.php
                data["table_id"] = addProduct.dataset.table;
    
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

    
        

};