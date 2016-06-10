<?php

	/*
	 * To change this license header, choose License Headers in Project Properties.
	 * To change this template file, choose Tools | Templates
	 * and open the template in the editor.
	 */

	/**
	 * Description of ClientsAddressDetail
	 *
	 * @author marcos
	 */
	class ClientsAddressDetail{
		
		public function __construct() 
		{
			
		}
		public function getClientsListAddressDetailByClient($id_client){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->where("id_client=?",$id_client);
			return $q; 				
			
		}		
		
		public function getClientsAddressDetailById($values){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail
			->select("*, DATE_FORMAT(date_created, '%d/%m/%Y %H:%i:%s') as date_created,DATE_FORMAT(date_updated, '%d/%m/%Y %H:%i:%s') as date_updated")
			->where("id_client=?",$values['id_client'])->fetch();
			return $q; 				
			
		}
		function deleteClientsAddressDetail($id){
			
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail("id", $id)->delete();
			
			
		}		
		function saveClientsAddressDetail($values){
			unset($values['action']);
			$values['date_created'] = new NotORM_Literal("NOW()");
			$values['date_updated'] = new NotORM_Literal("NOW()");
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail()->insert($values);
			$values['id'] = $ConnectionORM->getConnect()->ClientsAddressDetail()->insert_id();
			return $values['id'];	
			
		}
		function updateClientsAddressDetail($values){
			unset($values['action'],$values['PHPSESSID'],$values['column_id']);
			$values['date_updated'] = new NotORM_Literal("NOW()");
			$id = $values['id'];
			$column_name = $values['column_name'];
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail("id", $id)->update(array($column_name=>$values['value']));
			return $q;
			
		}
		public function getListClientsAddressDetail($values = null){
			$ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect()->clients_address_detail
			->select("*")
			->where("status=?",1)
			->order('name');
			return $q; 				
			
		}
	}
	