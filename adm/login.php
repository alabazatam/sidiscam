<?php include("../view_header.php"); print_r($_SESSION)?>
        	<div class="col-md-4 col-lg-4">
        	</div>
        	
            <div class="col-md-4 col-lg-4">
				 <div class="panel panel-info ">
				  <div class="panel-heading ">
				    <h3 class="panel-title">
				    <?php echo title; ?> <small> <?php echo version; ?></small>
				    <!--<img width='100' class="img-responsive img-hover img-thumbnail img-rounded" src="<?php echo full_url?>/web/images/fedcom1.png"/>-->
				    
				    </h3>
				  </div>
				  <div class="panel-body">
                                      <div align='center' class="visible-lg visible-md">
                                         <img src="<?php echo full_url;?>/web/img/Coseinca.png" class="img-responsive" width="150"> 
                                      </div>
                                      <div align='center' class="visible-sm visible-xs">
                                         <img src="<?php echo full_url;?>/web/img/Coseinca.png" class="img-responsive" width="100"> 
                                      </div>					
                                        <form name="" id="" novalidate action="<?php echo full_url;?>/adm/index.php" method="POST">
			                
                                         <input type="hidden" name="action" value="acceso"/>
			                    <div class="control-group form-group">
			                        <div class="controls">
			                            <label>Usuario:</label>
			                            <input  autocomplete="off" name='login' type="text" class="form-control" id="login" required data-validation-required-message="Please enter your login.">
			                            <p class="help-block"></p>
			                        </div>
			                    </div>
			                    <div class="control-group form-group">
			                        <div class="controls">
			                            <label>Clave:</label>
			                            <input autocomplete="off" name='password' type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password.">
			                        </div>
			                    </div>
			                    <!--<div class="control-group form-group">
			                        <div class="controls">
			                            <label>Imagen:</label>
			                           <div class="text-center">
			                           	
			                           	<img border="0" class='link_imagen img-responsive img-hover img-thumbnail img-rounded' src="<?php echo full_url;?>/web/securimage/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle" />
			                    		<a href="#" onclick="document.getElementById('image').src = '<?php echo full_url;?>/web/securimage/securimage_show.php?sid=' + Math.random(); return false"><img  width="30" src="<?php echo full_url.'/web/images/refresh.png'?>"></a>       	
			                           <hr>
			                           </div>
			 							
							
								                           
			                            <input  autocomplete="off" type="text" class="form-control" name='captcha' id="captcha" required data-validation-required-message="Please enter image text.">
			                        </div>
			                    </div>-->
			
			                    <button type="submit" class="btn btn-default"><span class="fa fa-sign-in fa-pull-left"> Conectar</span></button>
			                    <!-- For success/fail messages -->
			                    
			                    <?php if(isset($values['error']) and $values['error']!=''):?>
			                    	
			                    	<div id="" class="alert alert-danger"><?php echo $values['error'];?></div>
			                    <?php endif;?>
			                </form>
				  </div>
				</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--footer-->
                                        <div class="well well-sm">Desarrollado por: <?php echo development_by;?> - <?php echo version;?></div>
                                </div><!--fin footer-->                
            </div>
        	<div class="col-md-4 col-lg-4">
        	</div>

<?php include("../view_footer.php");?>		