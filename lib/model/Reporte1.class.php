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
	class Reporte1{
		
		public function __construct() 
		{
			
		}
		public function getDataList($values)
		{	
			$columns = array();
			$columns[0] = 'sales.id_sale';
			$columns[1] = 'client_name';
			$columns[2] = 'number';
			$columns[3] = 'KGS';
			$columns[4] = 'destino';
            $columns[5] = 'naviera';
			$column_order = $columns[0];
			$where = " sales.status = 0";
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where.= ""
                    . " OR upper(clients.name) like upper('%".$str."%')"
					. " OR upper(number) like upper('%".$str."%')"
					. " OR upper(clients_address_detail.state) like upper('%".$str."%')"
					. " OR upper(shipping_lines.name) like upper('%".$str."%')";
			}
			
			if(isset($values['columns'][0]['search']['value']) and $values['columns'][0]['search']['value']!='')
			{
				$where.=" AND sales.id_sale = ".$values['columns'][0]['search']['value']."";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][1]['search']['value']) and $values['columns'][1]['search']['value']!='')
			{
				$where.=" AND upper(clients.name) like ('%".$values['columns'][1]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][2]['search']['value']) and $values['columns'][2]['search']['value']!='')
			{
				$where.=" AND upper(number) like ('%".$values['columns'][2]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}			
			if(isset($values['columns'][3]['search']['value']) and $values['columns'][3]['search']['value']!='')
			{
				//$where.=" AND SUM(quantity) = '".$values['columns'][3]['search']['value']."'";
				//echo $values['columns'][0]['search']['value'];die;
			}	
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(clients_address_detail.state) like ('%".$values['columns'][4]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
			}
			if(isset($values['columns'][4]['search']['value']) and $values['columns'][4]['search']['value']!='')
			{
				$where.=" AND upper(shipping_lines.name) like ('%".$values['columns'][4]['search']['value']."%')";
				//echo $values['columns'][0]['search']['value'];die;
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
			$q = $ConnectionORM->getConnect()->sales_products_detail
			->select("SUM(quantity) AS KGS,sales_products_detail.id_sale,sales_products_detail.number,"
			. "shipping_lines.name AS naviera,clients_address_detail.state AS destino, clients.name AS client_name")
			->join('sales','LEFT JOIN sales ON sales.id_sale = sales_products_detail.id_sale')
			->join('shipping_lines','LEFT JOIN shipping_lines ON shipping_lines.id_shipping_lines = sales.id_shipping_lines')
			->join('clients','LEFT JOIN clients ON clients.id_client = sales.id_client')
			->join('clients_address_detail','LEFT JOIN clients_address_detail ON clients_address_detail.id = sales.id_client_address')
            ->order("$column_order $order")
			->where("$where")
			->group('sales_products_detail.id_sale,sales_products_detail.number, sales_products_detail.precinto')
			->limit($limit,$offset);
			//echo $q;die;
			return $q; 			
		}
		public function getCountDataList($values)
		{	
			$where = " sales.status = 0";
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where.=" ";
			}
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales_products_detail
			->select("count(*) as cuenta")
			->join('sales','LEFT JOIN sales ON sales.id_sale = sales_products_detail.id_sale')
			->join('shipping_lines','LEFT JOIN shipping_lines ON shipping_lines.id_shipping_lines = sales.id_shipping_lines')
			->join('clients','LEFT JOIN clients ON clients.id_client = sales.id_client')
			->join('clients_address_detail','LEFT JOIN clients_address_detail ON clients_address_detail.id = sales.id_client_address')
			->where("$where")
			->group('sales_products_detail.id_sale,sales_products_detail.number, sales_products_detail.precinto')
			->fetch();
			return $q['cuenta']; 			
		}

	}
	