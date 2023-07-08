<?php
        include_once "conexion.php";
        $sentencia = $bd -> query("select * from pozo");
        $pozo = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PDVSA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="assets/img-logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
	<section class="hero-section">
		<div class="hero-slider">
			<div class="hero-slide-item set-bg" data-setbg="assets/3.jpg">
				<div class="slide-inner">
					<div class="slide-content">
					<h2>PDVSA</h2>
					</div>	
				</div>
			</div>	
			<div class="hero-slide-item set-bg" data-setbg="assets/2.jpg">
				<div class="slide-inner">
					<div class="slide-content">
					<h2>Explotación <br>Producción</h2>
					</div>	
				</div>
			</div-->	
		</div>
	</section>

	<section class="intro-section pt100 pb50">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 intro-text mb-5 mb-lg-0">
					<h2 class="sp-title">SOMOS   <span>PDVSA</span></h2>
					<p>Empleamos tecnologias de punta por esfuerzo propio y junto a nuestros socios para maximizar el valor economico a largo plazo de las reservas de hidrocarburos en el territorio venezolano, bajo estrictas medidas de seguridad que permitan salvaguardar el personal, las instalaciones y el medio ambiente. La exploracion es uno de los procesos vitales de la industria petrolera, siendo el primer eslabon de la cadena, por lo cual se convierte en la base fundamental para que exista PDVSA. Su mision es la incorporacion de recursos de hidrocarburos, de acuerdo a los lineamientos de la corporación para asegurar la continuidad del negocio con las mejores practicas en terminos de esquemas de negocios, procesos, productividad, medio ambiente y seguridad industrial en las operaciones. </p>
				</div>
				<div class="col-lg-5 pt-4">
					<img src="assets/E4.jpg" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="cta-section pt100 pb50">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 pl-lg-0 offset-lg-5 cta-content">
					<h2 class="sp-title"><span>Corazón Petrolero</span></h2>
					<video src="assets/CorazonPetrolero.mp4" width=490  height=390 controls poster="vistaprevia.jpg"></video>
				</div>
			</div>
		</div>
	</section>

    <div class="container">
			<div class="row">
				<div class="col-lg-7 intro-text mb-5 mb-lg-0">
					<h2 class="sp-title">Registro de   <span>Pozos Petroleros</span></h2>
				</div>
		</div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                    <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                        }
                    ?>

                    <?php 

                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
                     ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado</strong> Se agregaro nuevo Pozo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                        }
                    ?>   

                    <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                        }
                    ?>   

                    <?php 
                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                        }
                    ?> 


                <div class="card">
                    <div class="card-header">
                        Lista de Pozos:
                    </div>
                    <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del pozo</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach($pozo as $dato){  
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->id_pozo;?></td>
                                <td><?php echo $dato->nombre;?></td>
                                <td><a class="text-warning" href="agregar.php?id_pozo=<?php echo $dato->id_pozo; ?>"><i class="bi bi-file-earmark-plus"></i></a></td>
                                <td><a class="text-success" href="editar.php?id_pozo=<?php echo $dato->id_pozo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_pozo=<?php echo $dato->id_pozo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    Ingrese el nombre del Pozo:
                  </div> 

                  <form action="registrar.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" name="txtpozo" class="form-control" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn-2" value="Registrar">
                    </div>
                  </form>
                </div>
            </div>

        </div>
    </div>


    <footer class="footer-section">
		<div class="finalbarra" style=" background: transparent;">
			<div class="custom">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<div class="copyright">
					<div class="copy-img">
						<img src="assets/gb1.png" alt=""/>
						<img src="assets/pie-logo.png" alt=""/>
					</div>
				</div>
			</div>
		</div>
	</footer>
    <script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.owl-filter.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>
</html>