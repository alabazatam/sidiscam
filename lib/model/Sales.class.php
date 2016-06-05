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
			$columns[1] = 'id_type_destiny';
			$columns[2] = 'date_sale';
			$columns[3] = 'status';
			$columns[4] = 'date_created';
			$columns[5] = 'date_updated';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = ""
                                        . "upper(status.name) like upper('%$str%') ";
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
			->select("sales.*,DATE_FORMAT(sales.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(sales.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->join("status","LEFT JOIN status on status.id_status = sales.status")
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
                                        . "upper(status.name) like upper('%$str%') ";
										
			}
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("count(*) as cuenta")
			->join("status","LEFT JOIN status on status.id_status = sales.status")
			->where("$where")->fetch();
			return $q['cuenta']; 			
		}
		public function getSalesById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->sales
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
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
			$values['date_updated'] = new NotORM_Literal("NOW()");
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
	}
	