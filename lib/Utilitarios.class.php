<?php 


	class Utilitarios {
		
		public function generaCodigoDependencia($cod_depen){
			
		//$cod_depen = "01030408599";
		
		$cod_depen = str_split($cod_depen, 1);
		$codigo = "";
		$i = 1;
		foreach($cod_depen as $cod):
				
				if($i%2==0 and $i != count($cod_depen)){		
						$codigo.= $cod."-";
					
				}else{
					$codigo.= $cod;
				}			
				
			$i++;
		endforeach;
		return $codigo;
			
			
			
			
		}
		
		
		
		
		public function generaCarpetas($id_depen, $anio){
			
			$anio = 2015;
			$directorio_anio = $anio;
			$directorio_dependencia = $id_depen;
			//echo ("/web/uploads/documentos/".'marcos');
			if(!is_dir('../../../../web/uploads/documentos/'.$anio)){
				mkdir('../../../../web/uploads/documentos/'.$anio, 0775, true);//creo el directorio del anio
				
			}
			
			if(!is_dir('../../../../web/uploads/documentos/'.$anio.'/'.$id_depen)){
			mkdir('../../../../web/uploads/documentos/'.$anio.'/'.$id_depen, 0775, true);
							
			
			}				
			
			$DocumentosTiposDocumentos = new DocumentosTiposDocumentos();
			
			
			$tipos_documentos =  $DocumentosTiposDocumentos->getListTiposDocumentos();
			
				foreach ($tipos_documentos as $tipdoc):
						
						$id_tipdoc = $tipdoc['id_tipdoc'];
						if(!is_dir('../../../../web/uploads/documentos/'.$anio.'/'.$id_depen.'/'.$id_tipdoc)){
								mkdir('../../../../web/uploads/documentos/'.$anio.'/'.$id_depen.'/'.$id_tipdoc, 0775, true);
							
			
						}
				endforeach;
			//echo ($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/web/uploads/".$anio);
			
			
			
		}
		function formateaFecha($fecha, $formato){
			
		$date = date_create($fecha);
		$date =  date_format($date, $formato);	
			
			
		return $date;
		}
		
		
		public function generarPassword($size = 8){
		$str = "ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789";
		$cad = "";
		$cad = str_shuffle($str);
		$cad= substr($cad,0,$size);
		return $cad;
	    }
		public function cutString($string,$size){
				
			if(strlen($string)>$size){
					$string =  substr($string,0,$size)."...";	
			}
			
			return $string;
		}
		
	}
