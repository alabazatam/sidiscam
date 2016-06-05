<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of Ports
	 *
	 * @author marcos
	 */
	class Ports {
		
		public function __construct() 
		{
			
		}
		public function getPortsList($values)
		{	
			$columns = array();
			$columns[0] = 'id_port';
			$columns[1] = 'ports.name';
			$columns[2] = 'ports.abr';
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
				$where = "upper(ports.name) like upper('%$str%')"
					. "or upper(status.name) like upper('%$str%')"
					. "or upper(ports.abr) like upper('%$str%')"
					. "or cast(id_port as char(100)) =  '$str' ";
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
			$q = $ConnectionORM->getConnect()->ports
			->select("*,ports.name as name, DATE_FORMAT(ports.date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(ports.date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->order("$column_order $order")
			->join("status","LEFT JOIN status on status.id_status = ports.status")
			->where("$where")
			->limit($limit,$offset);
			return $q; 			
		}
		public function getCountPortsList($values)
		{	
			$where = '1 = 1';
			if(isset($values['search']['value']) and $values['search']['value'] !='')
			{	
				$str = $values['search']['value'];
				$where = "upper(ports.name) like upper('%$str%')"
					. "or upper(status.name) like upper('%$str%')"
					. "or upper(ports.abr) like upper('%$str%')"
					. "or cast(id_port as char(100)) =  '$str' ";
			}
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports
			->select("count(*) as cuenta")
			->join("status","LEFT JOIN status on status.id_status = ports.status")
			->where("$where")->fetch();
			return $q['cuenta']; 			
		}
		public function getPortsById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->where("id_port=?",$values['id_port'])->fetch();
                        return $q; 				
			
		}
		function deletePorts($id_port){
			unset($values['action']);
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports("id_port", $id_port)->delete();
			
			
		}		
		function savePorts($values){
			unset($values['action'],$values['PHPSESSID']);
                        $values['date_created'] = new NotORM_Literal("NOW()");
                        $values['date_updated'] = new NotORM_Literal("NOW()");
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports()->insert($values);
			$values['id_port'] = $ConnectionORM->getConnect()->ports()->insert_id();
			return $values;	
			
		}
		function updatePorts($values){
			unset($values['action'],$values['PHPSESSID']);
                        unset($values['date_created']);
			$id_port = $values['id_port'];
                        $values['date_updated'] = new NotORM_Literal("NOW()");
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports("id_port", $id_port)->update($values);
			return $q;
			
		}
		public function getListPorts($values = null){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports
			->select("*")
			->where("status=?",1)
			->order('name');
			return $q; 				
			
		}
		public function getListPortsByCountry($values = null){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports
			->select("*")
			->where("ports.status=?",1)
			->join("sales","LEFT JOIN sales on sales.id_port_in = ports.id_port")
			->and('id_country=?',$values['id_country'])
			->order('name');
			
			
			return $q; 				
			
		}
		public function getListPortsBySale($values = null){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->ports
			->select("*,sales.id_port_in, sales.id_port_out")
			->join("sales","INNER JOIN sales on sales.id_port_".$values['type']." = ports.id_port" )
			->where("ports.status=?",1)
			->and('id_country=?',$values['id_country'])
			->and('id_sale=?',$values['id_sale'])
			->order('name')
			->fetch();
			return $q; 				
			
		}
	}
	