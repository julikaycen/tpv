/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/admin-form.js":
/*!*********************************!*\
  !*** ./assets/js/admin-form.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderAdminForm\": () => (/* binding */ renderAdminForm)\n/* harmony export */ });\nlet renderAdminForm = () => {\r\n\r\n    let adminForm = document.querySelector('.admin-form');\r\n    let createFormButton = document.querySelector('.create-form-button');\r\n    let sendFormButton = document.querySelector('.send-form-button'); // BOTON DE  CONFIRMAR, STORE\r\n    let createLayout = document.querySelector('.create-layout');\r\n    let tableContainer = document.querySelector('tbody');\r\n\r\n    if(createFormButton) { // resetea formulario\r\n        \r\n        createFormButton.addEventListener(\"click\", (event) => {\r\n            adminForm.reset(); // resetea formulario\r\n        });\r\n    }\r\n\r\n    if(sendFormButton) {\r\n\r\n        sendFormButton.addEventListener(\"click\", (event) => {\r\n\r\n            event.preventDefault(); // ENVIAR FORMULARIO MEDIANTE PARAMETROS POR LA URL, EVITAR QUE ROBEN DATOS\r\n                \r\n            let sendPostRequest = async () => {\r\n                \r\n                let data = {};\r\n                let formData = new FormData(adminForm); // RECOJE TODOS LOS DATOS DEL FORMULARIO, TIPO FORMDATA, OBJ DE JAVASCRIPT\r\n                formData.append(\"route\", adminForm.dataset.route);\r\n\r\n                formData.forEach(function(value, key){ // EL 1º SIEMPRE ES EL VALOR, 2º LA CLAVE\r\n                    data[key] = value;\r\n                });\r\n\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST',\r\n                    body: JSON.stringify(data)\r\n                })\r\n                .then(response => {\r\n                \r\n                    if (!response.ok) throw response;\r\n\r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n\r\n                    if(json.id == \"\") { // HECHO EN TICKETS, PLATO NUEVO\r\n\r\n                        let newElement = createLayout.cloneNode(true);\r\n                        newElement.classList.remove('d-none', 'create-layout');\r\n                        newElement.dataset.element = json.newElement.id; // DATASET \r\n                        // PARA ELIMINAR\r\n                        newElement.querySelector('.delete-table-button').dataset.id = json.newElement.id;\r\n\r\n                        Object.entries(json.newElement).forEach(([key, value]) => {\r\n                            if(newElement.querySelector(\".\" + key)){\r\n                                newElement.querySelector(\".\" + key).innerHTML = value;\r\n                            }\r\n                        });\r\n\r\n                        tableContainer.appendChild(newElement);\r\n\r\n                        document.dispatchEvent(new CustomEvent('renderAdminTable'));\r\n\r\n                    }else{\r\n\r\n                        let element = document.querySelector(\"[data-element='\" + json.id + \"']\");\r\n\r\n                        Object.entries(json.newElement).forEach(([key, value]) => {\r\n                            if(element.querySelector(\".\" + key)){\r\n                                element.querySelector(\".\" + key).innerHTML = value;\r\n                            }\r\n                        });\r\n\r\n                        document.dispatchEvent(new CustomEvent('renderAdminTable'));\r\n                    }\r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n\r\n            sendPostRequest();\r\n        }); \r\n    }\r\n    \r\n};\n\n//# sourceURL=webpack:///./assets/js/admin-form.js?");

/***/ }),

/***/ "./assets/js/admin-table.js":
/*!**********************************!*\
  !*** ./assets/js/admin-table.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderAdminTable\": () => (/* binding */ renderAdminTable)\n/* harmony export */ });\nlet renderAdminTable = () => {\r\n\r\n    let deleteTableButtons = document.querySelectorAll('.delete-table-button');\r\n    let deleteTableModal = document.querySelector('.delete-table-modal');\r\n    let editButtons = document.querySelectorAll('.edit-table-button');\r\n\r\n    document.addEventListener(\"renderAdminTable\",( event =>{\r\n        renderAdminTable();\r\n    }), {once: true});\r\n\r\n    deleteTableButtons.forEach(deleteTableButton => { // BOTONES ROJOS DE LA DERECHA\r\n\r\n        deleteTableButton.addEventListener(\"click\", (event) => {\r\n                \r\n            deleteTableModal.dataset.id = deleteTableButton.dataset.id;\r\n            \r\n        }); \r\n    });\r\n\r\n    if(deleteTableModal) {\r\n        \r\n        deleteTableModal.addEventListener(\"click\", (event) => {\r\n\r\n            let sendPostRequest = async () => {\r\n                        \r\n                let data = {};\r\n                data[\"route\"] = deleteTableModal.dataset.route;\r\n                data[\"id\"] = deleteTableModal.dataset.id;\r\n\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'DELETE',\r\n                    body: JSON.stringify(data)\r\n                })\r\n                .then(response => {\r\n                \r\n                    if (!response.ok) throw response;\r\n\r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n\r\n                    document.querySelector(\"[data-element='\" + json.id + \"']\").remove();\r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n\r\n            sendPostRequest();\r\n\r\n        });\r\n    }\r\n\r\n    editButtons.forEach(editButton => {\r\n\r\n        editButton.addEventListener(\"click\", (event) => {\r\n                \r\n            let sendPostRequest = async () => {\r\n                        \r\n                let data = {};\r\n                data[\"route\"] = editButton.dataset.route;\r\n                data[\"id\"] = editButton.dataset.id;\r\n\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST',\r\n                    body: JSON.stringify(data)\r\n                })\r\n                .then(response => {\r\n                \r\n                    if (!response.ok) throw response;\r\n\r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n  \r\n                    Object.entries(json.element).forEach(([key, value]) => {\r\n                        \r\n                        if(document.getElementsByName(key).length > 0){\r\n                            document.getElementsByName(key)[0].value = value;\r\n                        }\r\n                    });\r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n\r\n            sendPostRequest();\r\n            \r\n        }); \r\n    });\r\n};\n\n//# sourceURL=webpack:///./assets/js/admin-table.js?");

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _products_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./products.js */ \"./assets/js/products.js\");\n/* harmony import */ var _tickets_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./tickets.js */ \"./assets/js/tickets.js\");\n/* harmony import */ var _ventas_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ventas.js */ \"./assets/js/ventas.js\");\n/* harmony import */ var _ivas_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./ivas.js */ \"./assets/js/ivas.js\");\n/* harmony import */ var _admin_form_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./admin-form.js */ \"./assets/js/admin-form.js\");\n/* harmony import */ var _admin_table_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./admin-table.js */ \"./assets/js/admin-table.js\");\n\r\n\r\n\r\n\r\n\r\n//\r\n\r\n\r\n\r\n(0,_products_js__WEBPACK_IMPORTED_MODULE_0__.renderProducts)();\r\n(0,_tickets_js__WEBPACK_IMPORTED_MODULE_1__.renderTickets)();\r\n(0,_ventas_js__WEBPACK_IMPORTED_MODULE_2__.renderVentas)();\r\n(0,_ivas_js__WEBPACK_IMPORTED_MODULE_3__.renderIvas)();\r\n//\r\n(0,_admin_form_js__WEBPACK_IMPORTED_MODULE_4__.renderAdminForm)();\r\n(0,_admin_table_js__WEBPACK_IMPORTED_MODULE_5__.renderAdminTable)();\n\n//# sourceURL=webpack:///./assets/js/app.js?");

/***/ }),

/***/ "./assets/js/ivas.js":
/*!***************************!*\
  !*** ./assets/js/ivas.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderIvas\": () => (/* binding */ renderIvas)\n/* harmony export */ });\nlet renderIvas = () => {\r\n\r\n\r\n    let storeIvas = document.querySelectorAll(\".store-ivas\"); // se pone un punto al referirse a una clase\r\n        \r\n\r\n    storeIvas.forEach(storeIva => {\r\n        storeIva.addEventListener(\"click\", (event) => {\r\n            \r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // json inicio\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'storeIva';\r\n                data[\"id\"] = storeIva.dataset.price; // el valor seria data-price de productos.php\r\n                //data[\"table_id\"] = storeIva.dataset.table;\r\n    \r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST',\r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n\r\n    \r\n        \r\n\r\n};\n\n//# sourceURL=webpack:///./assets/js/ivas.js?");

/***/ }),

/***/ "./assets/js/products.js":
/*!*******************************!*\
  !*** ./assets/js/products.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderProducts\": () => (/* binding */ renderProducts)\n/* harmony export */ });\n// export ->  va a ser importado por alguien\r\nlet renderProducts = () => {\r\n\r\n\r\n    let addProducts = document.querySelectorAll(\".add-product\"); // se pone un punto al referirse a una clase\r\n        \r\n\r\n    addProducts.forEach(addProduct => {\r\n        addProduct.addEventListener(\"click\", (event) => {\r\n            \r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // json inicio\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'addProduct';\r\n                data[\"price_id\"] = addProduct.dataset.price; // el valor seria data-price de productos.php\r\n                data[\"table_id\"] = addProduct.dataset.table;\r\n    \r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST',\r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n\r\n    \r\n        \r\n\r\n};\n\n//# sourceURL=webpack:///./assets/js/products.js?");

/***/ }),

/***/ "./assets/js/tickets.js":
/*!******************************!*\
  !*** ./assets/js/tickets.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderTickets\": () => (/* binding */ renderTickets)\n/* harmony export */ });\n\r\nlet renderTickets = () => {\r\n\r\n    let deleteProducts = document.querySelectorAll(\".delete-product\");// se pone un punto al referirse a una clase\r\n\r\n    deleteProducts.forEach(deleteProduct => {\r\n\r\n        deleteProduct.addEventListener(\"click\", (event) => {\r\n\r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // jason inicio\r\n\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'deleteProduct';\r\n                data[\"id\"] = deleteProduct.dataset.ticketid; \r\n                data[\"table_id\"] = deleteProduct.dataset.table; \r\n                \r\n                //\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'DELETE',\r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n                    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n\r\n    let deleteAlls = document.querySelectorAll(\".delete-all\");// se pone un punto al referirse a una clase\r\n\r\n    deleteAlls.forEach(deleteAll => {\r\n\r\n        deleteAll.addEventListener(\"click\", (event) => {\r\n\r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // jason inicio\r\n\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'deleteAll';\r\n                //data[\"id\"] = deleteAll.dataset.ticketid; \r\n                data[\"table_id\"] = deleteAll.dataset.table; \r\n                //\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'DELETE',\r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n                    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n\r\n}\n\n//# sourceURL=webpack:///./assets/js/tickets.js?");

/***/ }),

/***/ "./assets/js/ventas.js":
/*!*****************************!*\
  !*** ./assets/js/ventas.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderVentas\": () => (/* binding */ renderVentas)\n/* harmony export */ });\n\r\nlet renderVentas = () => {\r\n\r\n    let cobraVentas = document.querySelectorAll(\".cobra-venta\");// se pone un punto al referirse a una clase\r\n\r\n    cobraVentas.forEach(cobraVenta => {\r\n\r\n        cobraVenta.addEventListener(\"click\", (event) => {\r\n\r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // jason inicio\r\n\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'cobraVenta';\r\n                data[\"metodo_pago\"] = cobraVenta.dataset.metodopago;\r\n                data[\"mesa_id\"] = cobraVenta.dataset.mesaid;\r\n                \r\n                //\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST', \r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n                    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n}\n\n//# sourceURL=webpack:///./assets/js/ventas.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/js/app.js");
/******/ 	
/******/ })()
;