
function IngresarAuto()
{
    var funcionAjax = $.ajax({
    //url : "../vendor/index.php/"
    url : "http://localhost/TPProgramcion-laboratorioIII2017/auto/alta",
    method : 'POST',
    data : {patente:$("#patente").val(),marca:$("#marca").val(),color:$("#color").val()}
});
  funcionAjax.then(function (dato)
{
    console.log(dato);
    if(dato.status == 200)
    {
      console.log(dato);
      alert("El auto fue ingresado correctamente!");
     // window.location.replace("../enlaces/grillaAutos.html");
    }
    else
    {
      alert("ERROR. el auto no pudo ser ingresado "+dato.status);
    }
}, function (dato)
{
        alert("ERROR. Hubo un error en el ingreso del auto al estacionamiento"+dato);
});
}

function BorrarAuto(id)
{
  var funcionAjax = $.ajax({
   // url : '../vendor/Auto/BorrarAuto/'+id,
   // method : "DELETE"
     url : "http://localhost/TPProgramcion-laboratorioIII2017/auto/baja",
     method: "POST",
     data : {id:id}

   
  });
  funcionAjax.then(function(dato){
    if(dato.status == 200)
    {
      alert("El auto fue borrado!");
      location.reload();
    }
    else
    {
      alert("El auto no pudo ser borrado "+dato.status);
    }
  },function(dato){
    alert("ERROR. no se puede borrar el auto "+dato);
  });
}

function ModificarAuto(id)
  {
    localStorage.setItem("idAuto",id);
    window.location.replace("../Frontend/modificarAuto.html");
  }

