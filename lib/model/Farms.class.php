<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of Farms
	 *
	 * @author marcos
	 */
	class Farms {
		
		public function __construct() 
		{
			
		}
		public function getFarmsList($values)
		{	
			$columns = array();
			$columns[0] = 'id_farm';
			$columns[1] = 'name';
			$columns[2] = 'status';
			$columns[3] = 'date_created';
			$columns[4] = 'date_updated';
			$column_order = $columns[0];
			$where = '1 = 1';
			$order = 'asc';
			$limit = $values['length'];
			$offset = $values['start'];
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(name) like upper('%$str%')";
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
			$q = $ConnectionORM->getConnect()->farms
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y') as date_updated")
			->order("$column_order $order")
			->where("$where")
			->limit($limit,$offset);
			return $q; 			
		}
		public function getCountFarmsList($values)
		{	
			$where = '1 = 1';
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(name) like upper('%$str%') ";
			}
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->farms
			->select("count(*) as cuenta")->where("$where")->fetch();
			return $q['cuenta']; 			
		}
		public function getFarmsById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->farms
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->where("id_farm=?",$values['id_farm'])->fetch();
                        return $q; 				
			
		}
		function deleteFarms($id_farm){
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->farms("id_farm", $id_farm)->delete();
			
			
		}		
		function saveFarms($values){
			unset($values['action']);
                        $values['date_created'] = new NotORM_Literal("NOW()");
                        $values['date_updated'] = new NotORM_Literal("NOW()");
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->farms()->insert($values);
			$values['id_farm'] = $ConnectionORM->getConnect()->farms()->insert_id();
			return $values;	
			
		}
		function updateFarms($values){
			unset($values['action']);
			$id_farm = $values['id_farm'];
                        $values['date_updated'] = new NotORM_Literal("NOW()");
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->farms("id_farm", $id_farm)->update($values);
			return $q;
			
		}
	}
	