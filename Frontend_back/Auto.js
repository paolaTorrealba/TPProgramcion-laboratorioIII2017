"use strict";
var Clases;
(function (Clases) {
    var Auto = (function () {
        function Auto(marca, precio, color) {
            this.marca = marca;
            this.precio = precio;
            this.color = color;
        }
        Auto.prototype.ToJSON = function () {
            var dato = "{\"marca\" : \"" + this.marca + "\" , \"precio\" : " + this.precio + " , \"color\" : \"" + this.color + "\"}";
            return dato;
        };
        return Auto;
    }());
    Clases.Auto = Auto;
})(Clases || (Clases = {}));
