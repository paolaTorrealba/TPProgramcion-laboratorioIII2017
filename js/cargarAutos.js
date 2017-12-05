window.onload = function(){
    var funcionAjax = $.ajax({
    method : "GET",
  //  url : "../vendor/Auto/TraerTodosLosAutos"
  url: "http://localhost/TPProgramcion-laboratorioIII2017/auto/traerTodos"
});
  funcionAjax.then(function(dato){
     console.log(dato);
     var stringAutos = " ";
    // for(var i = 0; i < dato.autos.length; i++)
    for(var i = 0; i < dato.length; i++)
     {
         stringAutos += "<tr>";
         stringAutos += "<td>"+dato[i].id+"</td>";
         stringAutos += "<td>"+dato[i].patente+"</td>";
         stringAutos += "<td>"+dato[i].marca+"</td>";
         stringAutos += "<td>"+dato[i].color+"</td>";
         stringAutos += "<td><button class='btn btn-danger' onclick='BorrarAuto("+dato[i].id+")'>"+
         "<span class='glyphicon glyphicon-remove'></span>Borrar</button>";
         stringAutos += "<td><button class='btn btn-warning' onclick='ModificarAuto("+dato[i].id+")'>"+
         "<span class='glyphicon glyphicon-edit'></span>Modificar</button>";
         stringAutos += "</tr>";
     }
     document.getElementById("autos").innerHTML = stringAutos;
  },function(dato){
    alert("ERROR no se pudieron cargar los autos"+dato);   
  });
}