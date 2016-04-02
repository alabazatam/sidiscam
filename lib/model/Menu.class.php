<?php
    class Menu 
    {
        
        function getMenu($id_app, $id_page,$id_menu_ref = 0)
        {
			
            $ConnectionORM = new ConnectionORM();
			$q = $ConnectionORM->getConnect('tugruero')->menu
                        ->select("*")
                        ->where('id_app=?',$id_app)
                        ->and('id_menuref =?',$id_menu_ref)
						->and('status=?',1)
                        ->order('orders');
			return $q;            
        }
    }