
<nav class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="<?php echo full_url;?>/adm/index.php?action=bienvenida"><img src="<?php echo full_url;?>/web/img/Coseinca_fondo_blanco.png" class="img-responsive" width="50"></a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dollar"></i> Ventas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i> Maestros <span class="caret"></span></a>
          <ul class="dropdown-menu" class="facebook_font">
			 <li><a href="<?php echo full_url;?>/adm/clients/index.php">Clientes</a></li>
            <li><a href="<?php echo full_url;?>/adm/farms/index.php">Granjas</a></li>
			<li><a href="<?php echo full_url;?>/adm/plants/index.php">Plantas procesadoras</a></li>
			
			<li><a href="<?php echo full_url;?>/adm/regions/index.php">Regiones</a></li>
			<li><a href="<?php echo full_url;?>/adm/country/index.php">Paises</a></li>
			<li><a href="<?php echo full_url;?>/adm/states/index.php">Estados</a></li>

			<li><a href="<?php echo full_url;?>/adm/shipping_lines/index.php">Lineas Navieras</a></li>
			<li><a href="<?php echo full_url;?>/adm/ports/index.php">Puertos</a></li>
			<li><a href="<?php echo full_url;?>/adm/products/index.php">Productos</a></li>
			<li><a href="<?php echo full_url;?>/adm/products_type/index.php">Tipo de productos</a></li>
			<li><a href="<?php echo full_url;?>/adm/bank/index.php">Cuentas bancarias</a></li>
			<li><a href="<?php echo full_url;?>/adm/incoterms/index.php">Incoterms</a></li>
			<li><a href="<?php echo full_url;?>/adm/brokers/index.php">Brokers</a></li>
			<li><a href="<?php echo full_url;?>/adm/company/index.php">Compañias empacadoras</a></li>


            <!--<li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> Informes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart "></i> Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i> Administración de usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo full_url;?>/adm/users/index.php">Usuarios</a></li>
            <!--<li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo full_url;?>/adm/users/index.php?action=change_pass_view">Cambio de clave</a></li>
          </ul>
        </li>
        <li><a class="facebook_font" href="<?php echo full_url;?>/adm/index.php?action=logout"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>
<div class="col-sm-2 col-sm-offset-10"><small><strong>Usuario:</strong> <?php echo $_SESSION['login'];?></small></div>
