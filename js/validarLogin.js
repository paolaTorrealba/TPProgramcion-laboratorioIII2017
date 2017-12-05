function EnviarDatos()
{

   // var empleadosString = localStorage.getItem("empleados");          
   // var empleadosJSON = empleadosString == null ? [] : JSON.parse(empleadosString);
    var funcionAjax = $.ajax({
    url : "http://localhost/TPProgramcion-laboratorioIII2017/usuario/traerUno",
    method: "GET",
    data: {mail: $("#mail").val(), clave: $("#clave").val()}
   // method: "POST",
    //data: {mail: $("#mail").val(), clave: $("#clave").val(),tipo:$('input[name=tipo]:checked').val(),horaLogin:$("#horaLogin").val()}
    });
    funcionAjax.then(function(empleado){       
      //if(dato.status == "200" && dato.rol == "administrador")
      if(empleado.rol == "administrador")
      {
      //console.log(dato);
        alert("Es administrador");
        // empleadosJSON.push(JSON.parse(dato.ToJSON())); //Push (JS) agrega elementos al array
        // localStorage.setItem("empleados", JSON.stringify(empleadosJSON));
      window.location.replace("Frontend/estacionamientoAdministrador.html");
      }
     // else if(dato.status == "200" && dato.tipo == "empleado")
     else if(empleado.rol == "operador")
     {
          alert("Es operador");
   //  empleadosJSON.push(JSON.parse(dato.ToJSON()));
      // localStorage.setItem("hora",dato.hora);
    //  localStorage.setItem("hora",dato.rol);
    // localStorage.setItem("empleados",empleadosJSON);
       if(empleado.id == false)
       {

         console.log("ERROR usuario no existe");
       }
       else
       {
           localStorage.setItem("idEmpleado",dato.id);
       }
       alert("El mail y la clave estan en la base de datos");
       window.location.replace("Frontend/estacionamientoEmpleado.html");
    }
  else
  {
      alert("ERROR. Revise su tipo de usuario, su mail y su contraseña!");
  }
    },function(empleado){
    if(dato.status == 400)
     alert("ERROR"+dato);
    });
}