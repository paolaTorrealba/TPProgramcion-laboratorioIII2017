"use strict";
/// <reference path="Auto.ts" />
var Clases;
(function (Clases) {
    var Controladora = (function () {
        function Controladora() {
        }
        Controladora.AgregarAuto = function () {
            var marca = document.getElementById("txtMarca").value;
            var precio = Number(document.getElementById("txtPrecio").value);
            var color = document.getElementById("txtColor").value;
            var autosString = localStorage.getItem("auto");
            var autosJSON = autosString == null ? [] : JSON.parse(autosString);
            var auto = new Clases.Auto(marca, precio, color);
            //Se agrega para la modificacion
            var index = document.getElementById("hdnIdAuto").value;
            if (index !== "") {
                var i = Number(index);
                console.log("Auto a modificar");
                console.log(autosJSON[i]);
                autosJSON.splice(i, 1);
                localStorage.clear();
            }
            autosJSON.push(JSON.parse(auto.ToJSON()));
            localStorage.setItem("auto", JSON.stringify(autosJSON));
            console.log("Auto guardado!!!");
            Controladora.LimpiarForm();
            document.getElementById("txtMarca").focus();
        };
        Controladora.LimpiarForm = function () {
            document.getElementById("txtMarca").value = "";
            document.getElementById("txtPrecio").value = "";
            document.getElementById("txtColor").value = "Rojo";
            document.getElementById("hdnIdAuto").value = "";
        };
        Controladora.MostrarAutos = function () {
            console.log("Mostrar Autos");
            var autosString = localStorage.getItem("auto");
            if (autosString != null) {
                var autosJSON = JSON.parse(autosString);
                var tabla = "<table class='table'><thead><tr><th>MARCA</th><th>PRECIO</th>";
                tabla += "<th>COLOR</th><th>ACCION</th></thead></tr>";
                if (autosJSON !== null) {
                    for (var i = 0; i < autosJSON.length; i++) {
                        console.log(autosJSON[i]);
                        tabla += "<tr><td>" + autosJSON[i].marca + "</td><td>" + autosJSON[i].precio +
                            "</td><td>" + autosJSON[i].color + "</td><td>" +
                            "<input type='button' value='Eliminar' onclick='Clases.Controladora.EliminarAuto(" + i + ")' class='btn btn-danger'>" +
                            "<input type='button' class='btn btn-success' value='Modificar' onclick='Clases.Controladora.ModificarAuto(" + i + ")'> </td></tr>";
                    }
                }
                tabla += "</table>";
                document.getElementById("divTabla").innerHTML = tabla;
            }
        };
        Controladora.EliminarAuto = function (i) {
            var autosString = localStorage.getItem("auto");
            if (autosString != null) {
                var autosJSON = JSON.parse(autosString);
                console.log("Auto a eliminar");
                console.log(autosJSON[i]);
                autosJSON.splice(i, 1);
                localStorage.clear();
                localStorage.setItem("auto", JSON.stringify(autosJSON));
            }
            //            for(let i:number=0; i< autosJSON.length; i++)
            //            {
            //                console.log(autosJSON[i]);
            //            }
            Controladora.MostrarAutos();
        };
        Controladora.ModificarAuto = function (i) {
            var autosString = localStorage.getItem("auto");
            if (autosString != null) {
                var autosJSON = JSON.parse(autosString);
                console.log("Auto a modificar");
                console.log(autosJSON[i]);
                var marca = autosJSON[i].marca;
                var precio = Number(autosJSON[i].precio);
                var color = autosJSON[i].color;
                document.getElementById("txtMarca").value = marca;
                document.getElementById("txtPrecio").value = precio.toString();
                document.getElementById("txtColor").value = color;
                document.getElementById("hdnIdAuto").value = i.toString();
            }
        };
        Controladora.Modificar = function () {
            var i = Number(document.getElementById("hdnIdAuto").value);
            var marca = document.getElementById("txtMarca").value;
            var precio = Number(document.getElementById("txtPrecio").value);
            var color = document.getElementById("txtColor").value;
            //let auto : Auto = new Auto(marca,precio,color);
            document.getElementById("txtMarca").value = marca;
            document.getElementById("txtPreico").value = precio.toString();
            document.getElementById("txtColor").value = color;
            document.getElementById("hdnIdAuto").value = i.toString();
        };
        /* ********************************************************************************** */
        Controladora.FiltrarAutosPorColor = function () {
            console.log("Mostrar autos Filtrados");
            var autosString = localStorage.getItem("auto");
            if (autosString != null) {
                var autosJSON = JSON.parse(autosString);
                var color_1 = document.getElementById("txtColor").value;
                var tabla = "<table class='table'><thead><tr><th>MARCA</th><th>PRECIO</th>";
                tabla += "<th>COLOR</th></thead></tr>";
                if (autosJSON !== null) {
                    var filtrados = autosJSON.filter(function (obj) {
                        return obj.color == color_1;
                    });
                    for (var i = 0; i < filtrados.length; i++) {
                        console.log(filtrados[i]);
                        tabla += "<tr><td>" + filtrados[i].marca + "</td><td>" + filtrados[i].precio +
                            "</td><td>" + filtrados[i].color + "</td></tr>";
                    }
                }
                tabla += "</table>";
                document.getElementById("divTabla").innerHTML = tabla;
            }
        };
        return Controladora;
    }());
    Clases.Controladora = Controladora;
})(Clases || (Clases = {}));
