export let renderIvas = () => {


    let storeIvas = document.querySelectorAll(".store-ivas"); // se pone un punto al referirse a una clase
        

    storeIvas.forEach(storeIva => {
        storeIva.addEventListener("click", (event) => {
            
            let sendPostRequest = async () => { // async - await

                // json inicio
                let data = {}; // data es una variable que almacena el json
                data["route"] = 'storeIva';
                data["id"] = storeIva.dataset.price; // el valor seria data-price de productos.php
                //data["table_id"] = storeIva.dataset.table;
    
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