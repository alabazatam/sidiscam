<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of Sales
	 *
	 * @author marcos
	 */
	class Sales{
		
		public function __construct() 
		{
			
		}
		public function getSalesList($values)
		{	
			$columns = array();
			$columns[0] = 'id_sale';
			$columns[1] = 'clients.name';
			$columns[2] = 'sales.date_sale';
			$columns[3] = 'country.name';
			$columns[4] = 'ports.name';
			$columns[5] = 'shipping_lines.name';
			$columns[6] = 'sales.status';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = ""
                                        . "upper(status.name) like upper('%$str%') "
										. " or upper(clients.name) like upper('%$str%') "
										. "or cast(id_sale as char(100)) =  '$str' "
										. "or upper(ports.name) like upper('%$str%')"
										. "or upper(country.name) like upper('%$str%')"
										. "or upper(shipping_lines.name) like upper('%$str%')"
										. " or date_format(date_sale,'%d/%m/%Y') = '".$str."'"	;			
					;
			}
			if(isset($values['order'][0]['column']) and $values['order'][0]['column']!='0')
			{
				$column_order = $columns[$values['order'][0]['column']];
			}
			if(isset($values['order'][0]['dir']) and $values['order'][0]['dir']!='0')
			{
				$order = $values['order'][0]['dir'];//asc o desc
			}
			//echo $column_order;die;
                        $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales()
			->select("sales.*,shipping_lines.name as name_shipping_lines,country.name as country_name,ports.name as port_name,clients.name as client_name,type_destiny.name as type_destiny_name,DATE_FORMAT(sales.date_sale, '%d/%m/%Y') as date_sale,DATE_FORMAT(sales.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(sales.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->join("status","LEFT JOIN status on status.id_status = sales.status")
			->join("clients","LEFT JOIN clients on clients.id_client = sales.id_client")
			->join("ports","LEFT JOIN ports on ports.id_port = sales.id_port_in")
			->join("country","LEFT JOIN country on country.id_country = sales.id_country_in")
			->join("shipping_lines","LEFT JOIN shipping_lines on shipping_lines.id_shipping_lines = sales.id_shipping_lines")
			->join("type_destiny","LEFT JOIN type_destiny on type_destiny.id_type_destiny = sales.id_type_destiny")	
                        ->where("$where")
                        ->order("$column_order $order")
			->limit($limit,$offset);
			return $q; 			
		}
		public function getCountSalesList($values)
		{	
			$where = '1 = 1';
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = ""
                                        . "upper(status.name) like upper('%$str%') "
										. " or upper(clients.name) like upper('%$str%') "
										. "or upper(ports.name) like upper('%$str%')"
										. "or upper(country.name) like upper('%$str%')"
										. "or upper(shipping_lines.name) like upper('%$str%')"
										. "or cast(id_sale as char(100)) =  '$str' "
										. " or date_format(date_sale,'%d/%m/%Y') = '".$str."'"	;
										
			}
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("count(*) as cuenta")
			->join("status","LEFT JOIN status on status.id_status = sales.status")
			->join("clients","LEFT JOIN clients on clients.id_client = sales.id_client")
			->join("ports","LEFT JOIN ports on ports.id_port = sales.id_port_in")
			->join("country","LEFT JOIN country on country.id_country = sales.id_country_in")	
			->join("type_destiny","LEFT JOIN type_destiny on type_destiny.id_type_destiny = sales.id_type_destiny")
			->join("shipping_lines","LEFT JOIN shipping_lines on shipping_lines.id_shipping_lines = sales.id_shipping_lines")
			->where("$where")->fetch();
			return $q['cuenta']; 			
		}
		public function getSalesById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("*,DATE_FORMAT(date_estimate_in, '%d/%m/%Y') as date_estimate_in,DATE_FORMAT(date_out, '%d/%m/%Y') as date_out,DATE_FORMAT(date_sale, '%d/%m/%Y') as date_sale, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->where("id_sale=?",$values['id_sale'])->fetch();
			return $q; 				
			
		}
		function deleteSales($id){
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales("id", $id)->delete();
			
			
		}		
		function saveSales($values){
			unset($values['action'],
				$values['PHPSESSID'],
                                $values['id_sale'],
                                $values['id_shipping_lines'],
				$values['id_product'],
				$values['id_farms'],
				$values['id_plants'],
				$values['id_containers'],
				$values['id_product_type'],
				$values['cases'],
				$values['amount'],
				$values['rate'],
				$values['quantity'],
				$values['packing'],
				$values['id_plant'],
				$values['id_farm'],
				$values['number'],
				$values['note']
				
				);
			$Utilitarios = new Utilitarios();
			$values['date_sale'] = $Utilitarios->formatFechaInput($values['date_sale']);
			
			$values['date_created'] = new NotORM_Literal("NOW()");
			$values['date_updated'] = new NotORM_Literal("NOW()");
			
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales()->insert($values);
			$values['id_sale'] = $ConnectionORM->getConnect()->Sales()->insert_id();
			return $values;	
			
		}
		function updateSales($values){
			unset($values['action'],
				$values['PHPSESSID'],
				$values['date_created'],
				$values['id_product'],
				$values['id_farms'],
				$values['id_plants'],
				$values['id_containers'],
				$values['id_product_type'],
				$values['cases'],
				$values['amount'],
				$values['rate'],
				$values['quantity'],
				$values['packing'],
				$values['id_plant'],
				$values['id_farm'],
				$values['id_container'],
				$values['number'],				
				$values['note']
				
				);	
			//echo $values['date_sale'];die;
			$values['date_updated'] = new NotORM_Literal("NOW()");
			
			$Utilitarios = new Utilitarios();
			$values['date_sale'] = $Utilitarios->formatFechaInput($values['date_sale']);
			$values['date_out'] = $Utilitarios->formatFechaInput($values['date_out']);	
			$values['date_estimate_in'] = $Utilitarios->formatFechaInput($values['date_estimate_in']);	
			
			//echo $values['date_sale'];die;
			$id_sale = $values['id_sale'];
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales("id_sale", $id_sale)->update($values);
			return $q;
			
		}
		public function getListSales($values = null){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("*")
			->where("status=?",1)
			->order('name');
			return $q; 				
			
		}
		public function getSalesInvoiceById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("*,clients.name client_name,DATE_FORMAT(sales.date_estimate_in, '%d/%m/%Y') as date_estimate_in,DATE_FORMAT(sales.date_out, '%d/%m/%Y') as date_out,DATE_FORMAT(date_sale, '%d/%m/%Y') as date_sale, DATE_FORMAT(sales.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(sales.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
                        ->join("clients","LEFT JOIN clients on clients.id_client = sales.id_client")
                        ->where("id_sale=?",$values['id_sale'])->fetch();
                        return $q; 
                        
			
		}
	}
	