<?php
/*
 *
 */

class ValidateBase
{
// propiedades

//Metodos

/*********************************************************************************
valida que la fecha este en el formato dd/mm/aaaa
*********************************************************************************/
 public function valida_fecha($nom_campo, $fecha, $fec_desde, $fec_hasta)
 {
     if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($fecha);

   $error = "";
   if (empty($fecha)||$fecha == ""){
     //$error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
   		$cadena = '^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)[0-9]{2}^';

	   if (preg_match($cadena,$fecha,$coincidencia,PREG_OFFSET_CAPTURE))
	   {
		  $error = "";
	   }
	   else {
		  $error = utf8_decode("- El campo ".$nom_campo." debe tener el siguiente formato: dd/mm/aaaa"."<br>");
	   }
	}

   if ($error == ""){
      if (substr($fecha,3,2) == '02'){
         if (substr($fecha,0,2) > '29'){
            $error = utf8_decode("- El día de la ".$nom_campo."debe ser menor a 30"."<br>");
		 }
	  }
   }

	if ($error == ""){
	   $fecha_t = substr($fecha,6,4).substr($fecha,3,2).substr($fecha,0,2);
	   $fec_desde_t = substr($fec_desde,6,4).substr($fec_desde,3,2).substr($fec_desde,0,2);
	   $fec_hasta_t = substr($fec_hasta,6,4).substr($fec_hasta,3,2).substr($fec_hasta,0,2);

   // evalua un rango de valores

	      if (($fec_desde != 0) and ($fec_hasta != 0)){
		     if (($fecha_t  < $fec_desde_t) or ($fecha_t  > $fec_hasta_t)){
               $error = utf8_decode("- El campo ".$nom_campo." se encuentra fuera del siguiente rango de valores, mínimo: ".$fec_desde." máximo: ".$fec_hasta."<br>");
			 }
		  }
		  elseif ($fec_desde != 0){
	          if ($fecha_t  < $fec_desde_t){
                 $error = utf8_decode("- El campo ".$nom_campo." no puede ser menor que ".$fec_desde."<br>");   		  	          }
		  }
		  elseif ($fec_hasta != 0){
	          if ($fecha_t  > $fec_hasta_t){
                 $error = utf8_decode("- El campo ".$nom_campo." no puede ser mayor que ".$fec_hasta."<br>");   		              }
		  }
   	}
   return $error;
 }


/*********************************************************************************
 valida campos numericos sin puntos ni comas
*********************************************************************************/
 public function valida_numero($nom_campo, $val_campo, $val_min, $val_max, $tamano_min,
                               $tamano_max)
 {

	
  
   if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
        
   }
   

   
   $this->valida_cadena_sql($val_campo);   
	
   $error = "";
   if ($val_campo == ""){
        // $error = ("- El campo ".$nom_campo." no puede estar en blanco"."<br>");

   }
   else{
      if (!is_numeric($val_campo)){
   	       $error = ("- El campo ".$nom_campo." debe ser un valor numérico"."<br>");
      }
      elseif ($val_campo == 0){
          $error = ("- El campo ".$nom_campo." no puede contener valor cero"."<br>");
      }
	  //
	  elseif ($val_campo < 0){
          $error = ("- El campo ".$nom_campo." no puede ser menor cero"."<br>");
      }
	  //
	  else{
		   // valida que sean solo numeros
		   $expresion_regular = utf8_encode('^[0-9]+$^');
		   if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
				 $error = "";
		   }
		   else{
			   $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener números enteros"."<br>");
		   }


           if ($error == ""){
			  // evalua un rango de valores
			  if (($val_min != 0) and ($val_max != 0)){
				 if (($val_campo  < $val_min) or ($val_campo  > $val_max)){
				   $error = utf8_decode("- El campo ".$nom_campo." se encuentra fuera del siguiente rango de valores, mínimo: ".$val_min." máximo: ".$val_max."<br>");
				 }
			  }
			  elseif ($val_min != 0){
				  if ($val_campo  < $val_min){
					 $error = utf8_decode("- El campo ".$nom_campo." no puede ser menor que ".$val_min."<br>");   		  	          }
			  }
			  elseif ($val_max != 0){
				  if ($val_campo  > $val_max){
					 $error = utf8_decode("- El campo ".$nom_campo." no puede ser mayor que ".$val_max."<br>");   		              }
			  }

			  // evalua la cantidad de caracteres del campo
			  $tamano_campo = strlen($val_campo);
			  if (($tamano_min != 0) and ($tamano_max != 0)){
				 if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
				 	if ($tamano_min==$tamano_max) {
						  $error = utf8_decode("- El campo ".$nom_campo." debe tener un tamaño de ".		$tamano_min." caracteres"."<br>");
						}
					else {
						  $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
				 	}
				}
			  }
			  elseif ($tamano_min != 0){
				  if ($tamano_campo  < $tamano_min){
			  $error = utf8_decode("- El campo ".$nom_campo." debe tener un mínimo de ".$tamano_min." caracteres"."<br>");   		  }
			  }
			  elseif ($tamano_max != 0){
				  if ($tamano_campo  > $tamano_max){
			$error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
			  }

		 }
	  }
   }
  return $error;
 }


/*********************************************************************************
valida campos alfanumerico y los signos mas usados en un texto
*********************************************************************************/
 public function valida_alfa($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {

   $this->valida_cadena_sql($val_campo);
   $error = "";
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }
   if (empty($val_campo) or ($val_campo == "")){
       //$error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO
		        // utf8_decode - utf8_encode: ver fin de archivo
          $expresion_regular = utf8_encode('^[A-Za-z0-9()áéíóúÁÉÍÓÚüÜ: Ññ,.-]+$^');  

          if(preg_match($expresion_regular,$val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z, números del 0 al 9, y los signos ( ) : , . -"."<br>");  
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }

/*********************************************************************************
valida campos alfanumerico y los signos . , - se utiliza para nombres de avenidas
ciudades, barrios, etc
*********************************************************************************/
 public function valida_ubicacion($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO
		        // utf8_decode - utf8_encode: ver fin de archivo
           $expresion_regular = utf8_encode('^[A-Za-z0-9áéíóúÁÉÍÓÚüÜ Ññ,.-]+$^');  
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z, números del 0 al 9, y los signos , . -"."<br>");
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }




/*********************************************************************************
valida SOLO campos alfabeticos y espacios en blanco
*********************************************************************************/
 public function valida_alfabetico($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       //$error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  solo alfabetico
		        // utf8_decode - utf8_encode: ver fin de archivo
          $expresion_regular = utf8_encode('^[A-Za-záéíóúÁÉÍÓÚ ÑñüÜ]+$^');  
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
            $error = "- El campo ".$nom_campo." sólo puede contener letras de la A a la Z"."<br>";	          }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." 2 debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo."3 debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }

   }
  return $error;
 }



/*********************************************************************************
valida campos moneda
*********************************************************************************/
 public function valida_moneda($nom_campo, $val_campo, $val_min, $val_max, $tamano_min,
                               $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   //*********************
   /*
   	 $val_campo= str_replace('.','*', $val_campo);
	 $val_campo= str_replace(',','.', $val_campo);
	 $val_campo= str_replace('*','', $val_campo);
	*/
   //*********************
   if ($val_campo == ""){
         $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");

   }
   else{
      if (!is_numeric($val_campo)){

       $error = utf8_decode("- El campo ".$nom_campo." debe ser un valor numérico"."<br>");
      }

	  /* Comet�ntado por Dennys 18/05/2009
	  elseif ($val_campo == 0){
          $error = "- El campo ".$nom_campo." no puede contener valor cero"."<br>";

      }
	  */
	  else{

		  // evalua un rango de valores
	      //if (($val_min != 0) and ($val_max != 0)){ Comentada por Dennys 18/05/2009
		  if (($val_max != 0)){
		  //
		     if (($val_campo  < $val_min) or ($val_campo  > $val_max)){
               $error = utf8_decode("- El campo ".$nom_campo." se encuentra fuera del siguiente rango de valores, mínimo: ".$val_min." máximo: ".$val_max."<br>");
			 }
		  }
		  //elseif ($val_min != 0){ Comentada por Dennys 18/05/2009
	       //   if ($val_campo  < $val_min){ Comentada por Dennys 18/05/2009
		   elseif ($val_campo  < $val_min){
		   //
                 $error = utf8_decode("- El campo ".$nom_campo." no puede ser menor que ".$val_min."<br>");   		  	     //     }
		  }
		  elseif ($val_max != 0){
	          if ($val_campo  > $val_max){
                 $error = utf8_decode("- El campo ".$nom_campo." no puede ser mayor que ".$val_max."<br>");   		              }
		  }

		  // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mas de ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener menos de ".$tamano_max." caracteres"."<br>");   		  }
		  }

	  }
  }
  return $error;
 }


/*********************************************************************************
valida email
*********************************************************************************/

 public function valida_email($nom_campo, $val_campo)
 {
     if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   global $checkmail;
   $this->valida_cadena_sql($val_campo);
   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
       $valida_email = $this->check_email_address($val_campo);
       if($valida_email==false){
          $error = utf8_decode("- El campo ".$nom_campo." no posee formato de correo electrónico, ejemplo: abc@micorreo.com"."<br>");
	   }
   }
  return $error;
 }


/*********************************************************************************
valida caracteres alfabeticos, numericos, sin signos ni espacios en blanco, ni caracteres especiales (acentos, �, etc). ejemplo: numero de pasaporte
*********************************************************************************/
 public function valida_pasaporte($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO
          $expresion_regular = utf8_encode('^[A-Za-z0-9]+$^');
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z, y números del 0 al 9"."<br>");
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }

/*********************************************************************************
valida caracteres alfabeticos, numericos y espacios en blanco, sin signos,
ejemplo descripciones de cargos, bancos, etc
*********************************************************************************/
 public function valida_descripcion($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO

          $expresion_regular = utf8_encode('^[A-Za-z0-9()áéíóúÁÉÍÓÚüÜ Ññ,.-]+$^');  		
//        $expresion_regular = utf8_encode('^[A-Za-záéíóúÁÉÍÓÚÑñüÜ 0-9.\-]+$');
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z, números del 0 al 9, y los signos ( ) , . -"."<br>"); 
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
			 if ($tamano_min==$tamano_max) {
					$error = utf8_decode("- El campo ".$nom_campo." debe tener un tamaño de ".		$tamano_min." caracteres"."<br>");
			}
			else {
						  $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 	}
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }

/*********************************************************************************
valida paginas web
*********************************************************************************/
 public function valida_paginaweb($url)
 {
 //fsockopen -> Abrir una conexi�n de sockets de dominio de Internet o Unix
 //resource fsockopen ( string destino, int puerto [, int errno [, string errstr [, float tiempo_espera]]])
   if(mb_detect_encoding($url)!='UTF-8'){
	$url = utf8_encode(@$url);
   }
 $this->valida_cadena_sql($url);
 $validar = @fsockopen($url, 80, $errno, $errstr, 15);
 if ($validar) {
    fclose($validar);
    $error = "";
 }
 else{
    $error = utf8_decode("- La página web que usted indica es inválida o no esta operativa actualmente"."<br>");
 }
 return $error;

 }

/*********************************************************************************
valida usuario
*********************************************************************************/

public function valida_usuario($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO
          $expresion_regular = utf8_encode('/^[A-Za-z0-9_]+$^/');
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z,  números del 0 al 9 y el signo _"."<br>");
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }

/*********************************************************************************
valida alfabetico sin caracteres especiales
*********************************************************************************/
public function valida_alfac($nom_campo, $val_campo, $tamano_min, $tamano_max)
 {
      if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }

   $this->valida_cadena_sql($val_campo);

   $error = "";
   if (empty($val_campo) or ($val_campo == "")){
       $error = utf8_decode("- El campo ".$nom_campo." no puede estar en blanco"."<br>");
   }
   else{
          // valida los caracteres validos para un texto  ALFANUMERICO
          $expresion_regular = utf8_encode('^[A-Z]+$^');
          if(preg_match($expresion_regular, $val_campo,$coincidencia,PREG_OFFSET_CAPTURE)){
	         $error = "";
	      }
	      else{
              $error = utf8_decode("- El campo ".$nom_campo." sólo puede contener letras de la A a la Z sin caracteres especiales"."<br>"); 
	      }

          // evalua la cantidad de caracteres del campo
          $tamano_campo = strlen($val_campo);
   	      if (($tamano_min != 0) and ($tamano_max != 0)){
		     if (($tamano_campo < $tamano_min) or ($tamano_campo  > $tamano_max)){
      $error = utf8_decode("- El campo ".$nom_campo." debe tener entre un mínimo de ".$tamano_min." y un máximo de ".$tamano_max." caracteres"."<br>");
			 }
		  }
		  elseif ($tamano_min != 0){
	          if ($tamano_campo  < $tamano_min){
          $error = utf8_decode("- El campo ".$nom_campo." debe tener mínimo ".$tamano_min." caracteres"."<br>");   		  }
		  }
		  elseif ($tamano_max != 0){
	          if ($tamano_campo  > $tamano_max){
        $error = utf8_decode("- El campo ".$nom_campo." debe tener un máximo de ".$tamano_max." caracteres"."<br>");   		  }
		  }


   }
  return $error;
 }

/*********************************************************************************
retorna el codigo de la dependencia dependiendo del nivel que se desee extraer
*********************************************************************************/
public function codigo_depen($cod_depen, $niv_depen)
 {
         if(mb_detect_encoding($nom_campo)!='UTF-8'){
	$nom_campo = utf8_encode($nom_campo);
   }
      if ($niv_depen == 1){
		 $cod_depen = substr($cod_depen,0,2);
	  }
	  elseif ($niv_depen == 2){
		 $cod_depen = substr($cod_depen,0,5);
	  }
	  elseif ($niv_depen == 3){
		 $cod_depen = substr($cod_depen,0,8);
	  }
	  elseif ($niv_depen == 4){
		 $cod_depen = substr($cod_depen,0,11);
	  }
	  elseif ($niv_depen == 5){
		 $cod_depen = substr($cod_depen,0,14);
	  }
	  elseif ($niv_depen > 6){
		$cod_depen = 'error';
	  }

  return $cod_depen;
 }

 /********************************************************************************* 
Valida si la cadena posee palabras no permitidas
*********************************************************************************/  
public function valida_cadena_sql($valor)
 {
 	global $sql;
	
	$id_complementario = 0; 
	if(isset($_SESSION['id_decla'])){	
	  $id_complementario = $_SESSION['id_decla']; 
	}

	$pal_reservada = array("UNION SELECT ",'UNION ALL ',"ALL_USER ", "describe ","DESC ", "all_user ", "dba_user ", "SELECT ","*","FROM", 
";","'\'",'|',"ASCII","UPDATE ","join ",'insert',"'","truncate ","delete ","drop ","begin ",'"'," alter " , " ALTER ", " EXEC "," exec ", " EXECUTE "," execute ");
	
	$resultado = 0;

	foreach ($pal_reservada as $pal_reservada_1) {
		if(stristr( strtoupper($valor), strtoupper($pal_reservada_1))){
			$resultado = 1;
		} 
		else {
			$resultado = 0;
		} 

		
		if ($resultado == 1) {
			$evalua = $sql->evalua_posible_ataque('POS','POST_MAIL');
			//Inserta en Monitor_Errores
			$sesion = 1;  
			$campos = array("ID_ERR", "FEC_ERR", "USU_TRAN", "ID_DECLA", "PRO_ORIGEN", "DES_ERR", 
							 "TIP_ERR"); 
			$tabla = ("MONITOR_ERRORES");	
			$id_ente = @$_SESSION['id_ente'];
			$id_datpers = $_SESSION['id_datpers'];
			$valores = array("SQ_ERROR.nextval", "SYSDATE", "$id_datpers",
							  "'$id_complementario'", "'valida_formato.class.php'", 
							  "'POSIBLE ATAQUE -  Forma de ataque: POST. IP: ".$_SERVER['REMOTE_ADDR'].". Programa afectado: ".$_SERVER['PHP_SELF']." '", "'SIS'");
			$reg = $sql->insertar_bd($sesion, $campos, $tabla, $valores);
			
			echo "<script language='javascript'>"; 
			echo "location='../Clases/Pantalla_error.php?var_error=17'"; 
			echo "</script>"; 
			die;
		}
	}
 } 

function check_email_address($email) {
           if(mb_detect_encoding($email)!='UTF-8'){
	$nom_campo = utf8_encode($email);
   }
        // En primer lugar, comprobamos que hay un símbolo de @, y que las longitudes en lo correcto
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            // Enviar inválida porque el número equivocado de caracteres en una sección, o el número equivocado de @ símbolos.
            return false;
        }
        // Dividir en secciones para hacer la vida más fácil
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                return false;
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Compruebe si el dominio es IP. Si no, debe ser el nombre de dominio válido
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // No hay suficientes partes para dominio
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    return false;
                }
            }
        }

        return true;
    }


/***********************************************************************
utilizacion del juego de caracteres utf-8
tomado de: http://www.desarrolloweb.com/articulos/convertir-caracteres-utf-8-con-php.html
***********************************************************************

 Funciones PHP para convertir caracteres UTF-8 y que se vean bien los acentos y otras letras del alfabeto latino. Funci�n decode UTF8 PHP.

24/9/08 - En ocasiones los textos de la p�gina web pueden contener caracteres raros en lugar de acentos u otras letras propias del idioma espa�ol, como la � o las letras con di�resis y de otros idiomas latinos. Esto suele ocurrir en casos en que la base de datos trabaje en un juego de caracteres distinto que la p�gina, o que los datos est�n mal cargados en la misma. Generalmente estos errores surgen por un tratamiento inadecuado del juego de caracteres UTF-8, que no est�n procesados como UTF-8, sino como si fueran ISO-8859-1. Con PHP podemos decodificar esos caracteres para que a la hora de mostrar los textos en la p�gina aparezcan correctamente. Para ello existen una funciones que vamos a comentar en este art�culo de DesarrolloWeb.com.

Cuando vemos incorrectamente un texto nos pueden aparecer textos como estos:

Solución útil y apañada a UTF-8

Este texto tiene caracteres codificados en UTF8, que debemos decodificar para que aparezcan correctamente los acentos y dem�s s�mbolos del alfabeto latino.

Decodificar una cadena UTF-8 con PHP - decode utf8 php

Existe una funci�n de PHP que realiza el trabajo de conversi�n de los caracteres UTF8 a sus correspondientes c�digos reales.

La funci�n se llama utf8_decode() y lo que hace es convertir una cadena que realmente utiliza ISO-8859-1 pero que tiene caracteres codificados a con UTF-8. La conversi�n genera el string en ISO-8859-1 pero con un s�lo byte para todos los caracteres, con lo que se ver�n correctamente.

Se utiliza as�:

utf8_decode("Solución útil y apañada a UTF-8");

Devolver� una cadena el texto correctamente escrito:

Soluci�n �til y apa�ada a UTF-8

Codificar una cadena al juego de caracteres UTF-8 - encode utf8 php

Existe una funci�n para hacer justo el paso contrario, que vamos a ver tambi�n en desarrollo web .com. Es decir, partiendo de una cadena en el juego de caracteres ISO-8859-1, obtener la correspondiente traducci�n a UTF-8.

Esto lo podemos necesitar, por ejemplo, si nuestra base de datos est� definida con UTF-8 y tenemos entrada de datos ISO-8859-1.

El uso es bien simple:

echo utf8_encode("Ma�anas de programaci�n PHP");

Y devolver� el correspondiente string convertido a UTF-8, que si lo mostramos en una p�gina que utiliza el juego de caracteres ISO-8859-1, se ver�a de esta manera:

Mañanas de programación PHP

*******************************************************/
}

?>
