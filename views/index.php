<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>MAIN</title>
  </head>
  <body>

  	<main>
  		<button type="button" onclick="getProducts()">Hacer Petición</button>
      <table id="product-list" class="table">
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Descripcion</th>
      </table>
  		<!--<div class="container">
  			
  			<div class="row">

  				<?php
					foreach ($products as $product) {
				?>

  				<article class="card col-xs-12 col-sm-12 col-md-4 col-lg-3">
  					
  					<header>
  				
  						<img src="./img/pizza-pepperoni.jpg" class="card col-xs-12 col-sm-12 col-md-12 col-lg-12">
		  				<h4><?php echo $product ["nombre"]; ?></h4>
		  				<small><?php echo $product["precio"]; ?></small>

		  			</header>

		  			<div class="card-body">
		  				<p><?php echo $product["descripcion"]; ?></p>
		  			</div>

  				</article>
  				<?php
					}

  				?>
  				
  			</div>

  		</div>-->

  	</main>

  	<script type="text/javascript">
  		function getProducts(){
  			var xhr = new XMLHttpRequest();
  			var url = 'http://localhost/mvc/controllers/ProductsController.php';
  			xhr.open('GET',url,true);
  			xhr.addEventListener('error',function(e){
  				console.log('Un error ocurrio',e);
  			});
  			xhr.addEventListener('loadend',function(){
  				//console.log('xhr.readyState:',xhr.responseText);
          products = eval(xhr.responseText);
          products.forEach(function(product){
            idColumn = document.createElement("td");
            nombreColumn = document.createElement("td");
            precioColumn = document.createElement("td");
            descripcionColumn = document.createElement("td");
            row = document.createElement("tr");

            idColumn.innerHTML=product.id;
            nombreColumn.innerHTML=product.nombre;
            precioColumn.innerHTML=product.precio;
            descripcionColumn.innerHTML=product.descripcion;

            // Agregar hijos a la fila
            row.appendChild(idColumn);
            row.appendChild(nombreColumn);
            row.appendChild(precioColumn);
            row.appendChild(descripcionColumn);

            document.querySelector("#product-list").appendChild(row);
          });
  			});
  			xhr.send();
  		}
  	</script>
	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
