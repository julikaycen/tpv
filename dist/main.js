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

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _products_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./products.js */ \"./assets/js/products.js\");\n/* harmony import */ var _tickets_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./tickets.js */ \"./assets/js/tickets.js\");\n/* harmony import */ var _ventas_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ventas.js */ \"./assets/js/ventas.js\");\n\r\n\r\n\r\n\r\n\r\n\r\n(0,_products_js__WEBPACK_IMPORTED_MODULE_0__.renderProducts)();\r\n(0,_tickets_js__WEBPACK_IMPORTED_MODULE_1__.renderTickets)();\r\n(0,_ventas_js__WEBPACK_IMPORTED_MODULE_2__.renderVentas)();\n\n//# sourceURL=webpack:///./assets/js/app.js?");

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

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"renderVentas\": () => (/* binding */ renderVentas)\n/* harmony export */ });\n\r\nlet renderVentas = () => {\r\n\r\n    let cobraVentas = document.querySelectorAll(\".cobra-venta\");// se pone un punto al referirse a una clase\r\n\r\n    cobraVentas.forEach(cobraVenta => {\r\n\r\n        cobraVenta.addEventListener(\"click\", (event) => {\r\n\r\n            let sendPostRequest = async () => { // async - await\r\n\r\n                // jason inicio\r\n\r\n                let data = {}; // data es una variable que almacena el json\r\n                data[\"route\"] = 'cobraVenta';\r\n                data[\"venta_id\"] = cobraVenta.dataset.ventaid; \r\n                data[\"numero_ticket\"] = cobraVenta.dataset.numticket;\r\n                data[\"precio_base\"] = cobraVenta.dataset.preciobase;\r\n                data[\"precio_iva\"] = cobraVenta.dataset.precioiva;\r\n                data[\"precio_total\"] = cobraVenta.dataset.preciototal;\r\n                data[\"metodo_pago\"] = cobraVenta.dataset.metodopago;\r\n                data[\"mesa_id\"] = cobraVenta.dataset.mesaid;\r\n                data[\"fecha_emision\"] = cobraVenta.dataset.fechaemision;\r\n                data[\"hora_emision\"] = cobraVenta.dataset.horaemision;\r\n                data[\"activo\"] = cobraVenta.dataset.activo;\r\n                data[\"creado\"] = cobraVenta.dataset.creado;\r\n                data[\"actualizado\"] = cobraVenta.dataset.actualizado;\r\n\r\n                //\r\n                let response = await fetch('web.php', {\r\n                    headers: {\r\n                        'Accept': 'application/json',\r\n                    },\r\n                    method: 'POST', // OJO!, ,preguntar a Carlos ----------------------------------\r\n                    body: JSON.stringify(data)\r\n                }) // json fin\r\n                .then(response => {\r\n                    location.reload(true);\r\n                    if (!response.ok) throw response;\r\n                    \r\n                    return response.json();\r\n                })\r\n                .then(json => {\r\n    \r\n                })\r\n                .catch ( error =>  {\r\n                    console.log(error);\r\n                });\r\n            };\r\n    \r\n            sendPostRequest();\r\n        }); \r\n    });\r\n}\n\n//# sourceURL=webpack:///./assets/js/ventas.js?");

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