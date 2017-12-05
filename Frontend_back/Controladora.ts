/// <reference path="Auto.ts" />

namespace Clases
{
    export class Controladora
    {


     

     
        public static AgregarAuto():void
        {
            let marca:string = (<HTMLInputElement>document.getElementById("txtMarca")).value;
            let precio:number = Number((<HTMLInputElement>document.getElementById("txtPrecio")).value);
            let color:string = (<HTMLInputElement>document.getElementById("txtColor")).value;
            
            let autosString = localStorage.getItem("auto");
            let autosJSON:Array<JSON> = autosString == null ? [] : JSON.parse(autosString);

            let auto : Auto = new Auto(marca,precio,color);
            
            //Se agrega para la modificacion
            let index:string = (<HTMLInputElement>document.getElementById("hdnIdAuto")).value;
            if(index !== "")
            {
                let i:number = Number(index);
                console.log("Auto a modificar");
                console.log(autosJSON[i]);

                autosJSON.splice(i,1);
  
                localStorage.clear();                

            }

            autosJSON.push(JSON.parse(auto.ToJSON()));
            localStorage.setItem("auto", JSON.stringify(autosJSON));

            console.log("Auto guardado!!!");

            Controladora.LimpiarForm();

            (<HTMLInputElement>document.getElementById("txtMarca")).focus();
        }

        private static LimpiarForm() {
            (<HTMLInputElement>document.getElementById("txtMarca")).value = "";
            (<HTMLInputElement>document.getElementById("txtPrecio")).value = "";
            (<HTMLInputElement>document.getElementById("txtColor")).value = "Rojo";
            (<HTMLInputElement>document.getElementById("hdnIdAuto")).value = "";
        }

        public static MostrarAutos():void
        {
            console.log("Mostrar Autos");
            let autosString = localStorage.getItem("auto");
            if (autosString != null){
            let autosJSON : Array<any> = JSON.parse(autosString);

            let tabla:string = "<table class='table'><thead><tr><th>MARCA</th><th>PRECIO</th>";
            tabla += "<th>COLOR</th><th>ACCION</th></thead></tr>";

            if(autosJSON !== null){
                for(let i:number=0; i< autosJSON.length; i++)
                {
                    console.log(autosJSON[i]);
                    tabla += "<tr><td>"+autosJSON[i].marca+"</td><td>"+autosJSON[i].precio+
                        "</td><td>"+autosJSON[i].color+"</td><td>"+
                        "<input type='button' value='Eliminar' onclick='Clases.Controladora.EliminarAuto("+i+")' class='btn btn-danger'>"+
                        "<input type='button' class='btn btn-success' value='Modificar' onclick='Clases.Controladora.ModificarAuto("+i+")'> </td></tr>";
                }
            }
            tabla += "</table>";
            

            (<HTMLDivElement>document.getElementById("divTabla")).innerHTML = tabla;
        }
        }

        public static EliminarAuto(i:number):void
        {
            let autosString = localStorage.getItem("auto");
            if (autosString != null){
            let autosJSON:Array<JSON> = JSON.parse(autosString);
            
            console.log("Auto a eliminar");
            console.log(autosJSON[i]);
            
            autosJSON.splice(i,1);
            

            localStorage.clear();
            

            localStorage.setItem("auto", JSON.stringify(autosJSON));
            }
//            for(let i:number=0; i< autosJSON.length; i++)
//            {
//                console.log(autosJSON[i]);
//            }
            Controladora.MostrarAutos();
        }

        public static ModificarAuto(i:number):void
        {
            let autosString = localStorage.getItem("auto");
             if (autosString != null){
            let autosJSON = JSON.parse(autosString);
            console.log("Auto a modificar");
            console.log(autosJSON[i]);

            let marca:string = autosJSON[i].marca;
            let precio:number = Number(autosJSON[i].precio);
            let color:string = autosJSON[i].color;
                        
            (<HTMLInputElement>document.getElementById("txtMarca")).value = marca;
            (<HTMLInputElement>document.getElementById("txtPrecio")).value = precio.toString();
            (<HTMLInputElement>document.getElementById("txtColor")).value = color;

            (<HTMLInputElement>document.getElementById("hdnIdAuto")).value = i.toString();
             }
        }

        public static Modificar():void
        {
            let i:number = Number((<HTMLInputElement>document.getElementById("hdnIdAuto")).value);

            let marca:string = (<HTMLInputElement>document.getElementById("txtMarca")).value;
            let precio:number = Number((<HTMLInputElement>document.getElementById("txtPrecio")).value);
            let color:string = (<HTMLInputElement>document.getElementById("txtColor")).value;
            
            //let auto : Auto = new Auto(marca,precio,color);
            
            (<HTMLInputElement>document.getElementById("txtMarca")).value = marca;
            (<HTMLInputElement>document.getElementById("txtPreico")).value = precio.toString();
            (<HTMLInputElement>document.getElementById("txtColor")).value = color;

            (<HTMLInputElement>document.getElementById("hdnIdAuto")).value = i.toString();

        }
/* ********************************************************************************** */
        public static FiltrarAutosPorColor():void
        {
            console.log("Mostrar autos Filtrados");
            let autosString = localStorage.getItem("auto");
            if (autosString != null){
            let autosJSON:Array<any> = JSON.parse(autosString);

            let color:string = (<HTMLInputElement>document.getElementById("txtColor")).value;

            let tabla:string = "<table class='table'><thead><tr><th>MARCA</th><th>PRECIO</th>";
            tabla += "<th>COLOR</th></thead></tr>";

            if(autosJSON !== null){
                let filtrados:Array<any> = autosJSON.filter(function(obj){
                                                return obj.color == color;
                                            });
                for(let i:number=0; i< filtrados.length; i++)
                {
                    console.log(filtrados[i]);
                    tabla += "<tr><td>"+filtrados[i].marca+"</td><td>"+filtrados[i].precio+
                        "</td><td>"+filtrados[i].color+"</td></tr>";
                }
            }

            tabla += "</table>";

            (<HTMLDivElement>document.getElementById("divTabla")).innerHTML = tabla;
            }
        }


/* ********************************************************************************** */
        
    }
}