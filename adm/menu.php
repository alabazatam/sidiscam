<?php
	$Menu = new Menu();
	$list_menu_padres = $Menu->getMenuPadres();

?>
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
        
		<?php if(count($list_menu_padres)>0):?>
			<?php foreach($list_menu_padres as $list_padre):?>
				<li class="dropdown">
					<a href="<?php echo $list_padre['link']?>" class="dropdown-toggle facebook_font" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="<?php echo $list_padre['icon_class']?>"></i> <?php echo $list_padre['description']?> <span class="caret"></span></a>	
						<?php $list_menu_hijos = $Menu->getMenuHijos($list_padre['id_menu']);?>
						<?php if(count($list_menu_hijos)>0):?>
							<ul class="dropdown-menu">
							<?php foreach($list_menu_hijos as $list_hijos):?>
							
								<li><a href="<?php echo full_url;?><?php echo $list_hijos['link']?>"><?php echo $list_hijos['description']?></a></li>

								<!--<li><a href="#">Productos</a></li>
								<li><a href="#">Clientes</a></li>
								<li><a href="#">Incoterms</a></li>
								<li><a href="#">Containers</a></li>-->
							
							 <?php endforeach;?>
							 </ul>
						 <?php endif;?>
				</li>
			<?php endforeach;?>
		<?php endif;?>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="facebook_font text-right" href="<?php echo full_url;?>/adm/index.php?action=logout"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>
<div class="col-sm-2 col-sm-offset-10"><small><strong>Usuario:</strong> <?php echo $_SESSION['login'];?></small></div>
