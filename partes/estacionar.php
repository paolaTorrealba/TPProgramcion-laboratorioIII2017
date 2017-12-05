
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/estacionar.css" rel="stylesheet">
    <div class="container">

      <form class="form-estacionar" onsubmit="GuardarCD();return false">
        <h2 class="form-estacionar-heading">CD</h2>
       
        <input type="text"   id="patente"  class="form-control"  required="" autofocus="">
        <input type="text"   id="marca"   class="form-control"  required="" autofocus="">
        <input type="text"   id="color"   class="form-control"  required="" autofocus="">
        
        
       
        <input type="number"   class="form-control" placeholder="año" required="" autofocus="">
       <input readonly   type="hidden"    id="idCD" class="form-control" >
       
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->

  
   

    