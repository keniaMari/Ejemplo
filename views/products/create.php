<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<title>Crear producto</title>
</head>
<body>
  <?php include "../Parciales/header.php"; ?>
  <main>
  	<form>
  		<input type="text" id="nombre" placeholder="Nombre">
  		<input type="number" id="precio" placeholder="Precio">
  		<textarea id="descripcion" placeholder="Descripcion"></textarea>
      <select>
        <option value=""></option>
      </select>
  		<button type="button" onclick="save();"> Registrar Producto</button>
  	</form>
  </main>
</body>
</html>

<script>
	function save(){
  		var xhr = new XMLHttpRequest();
  		var url = 'http://localhost/mvc/controllers/ProductsController.php';
  		xhr.open('POST',url,true);

  		var data = new FormData();
  		var nombre = document.querySelector('#nombre').value;
  		var precio = document.querySelector('#precio').value;
  		var descripcion = document.querySelector('#descripcion').value;


  		data.append('name', nombre);
  		data.append('price', precio);
  		data.append('description', descripcion);
  		data.append('action', "create");

  		xhr.addEventListener('loadend',function(){
  			alert("Operació realizada con exito");
  		});
  		xhr.send(data);
  }
  function consultarCategorias(){
    
  }
</script>