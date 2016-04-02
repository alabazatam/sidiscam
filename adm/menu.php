<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="<?php echo full_url;?>/web/img/Coseinca.png" class="img-responsive" width="50"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class=""><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dollar  fa-pull-left fa-border"></i> Ventas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart  fa-pull-left fa-border"></i> Maestros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo full_url;?>/adm/farms/index.php">Granjas</a></li>
            <!--<li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o  fa-pull-left fa-border"></i> Informes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart  fa-pull-left fa-border"></i> Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Granjas</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Incoterms</a></li>
            <li><a href="#">Containers</a></li>-->
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-pull-left fa-border"></i> Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Cambio de clave</a></li>
          </ul>
        </li>
        <li><a href="<?php echo full_url;?>/adm/index.php?action=logout"><i class="fa fa-sign-out  fa-pull-left fa-border"></i>Cerrar sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "">
    <div class="well well-sm visible-lg visible-md">Datos de usuario</div>    
</div>