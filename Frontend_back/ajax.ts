
export class Ajax {
  public mensaje : string = "hola";
  xhr: XMLHttpRequest;

  constructor() {

  }

  get = (ruta: string, success: Function, params:string, error?: Function) => {
    
    let parametros:string = params.length > 0 ? params : "";
    ruta = params.length > 0 ? ruta + "?" + parametros : ruta;

    this.xhr = new XMLHttpRequest();
    this.xhr.open('GET', ruta);
    this.xhr.send(null);

    this.xhr.onreadystatechange = () => {
      var DONE = 4; // readyState 4 means the request is done.
      var OK = 200; // status 200 is a successful return.
      if (this.xhr.readyState === DONE) {
        if (this.xhr.status === OK) {
          success(this.xhr.responseText);
        } else {
          if (error)
            error(this.xhr.status);
        }
      }
    };
  }

  post = (ruta: string, success: Function, params:string, error?: Function) => {

    let parametros:string = params.length > 0 ? params : "";

    this.xhr = new XMLHttpRequest();
    this.xhr.open('POST', ruta, true);
    this.xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    this.xhr.send(parametros);

    this.xhr.onreadystatechange = () => {
      var DONE = 4; // readyState 4 means the request is done.
      var OK = 200; // status 200 is a successful return.
      if (this.xhr.readyState === DONE) {
        if (this.xhr.status === OK) {
          success(this.xhr.responseText);
        } else {
          if (error)
            error(this.xhr.status);
        }
      }
    };
  }  
}
