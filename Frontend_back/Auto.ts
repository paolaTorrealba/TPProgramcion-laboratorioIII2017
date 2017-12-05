namespace Clases{

    export /**
     * Auto
     */
    class Auto {

        public marca:string;
        public precio:number;
        public color:string;


        public constructor(marca:string, precio:number, color:string) {
            this.marca = marca;
            this.precio = precio;
            this.color = color;
        }

        public ToJSON():string
        {
            let dato : string = `{"marca" : "${this.marca}" , "precio" : ${this.precio} , "color" : "${this.color}"}`;
            return dato;        
        }
        
    }

}