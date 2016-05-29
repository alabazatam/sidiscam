<?php
		$ProductsType = new ProductsType();
?>			
			<a onclick="openProducts();" class="btn btn-default">Agregar producto <i class="fa fa-plus-circle"></i></a>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<table id="products_details" class="table-responsive table-bordered" width='100%'>
						<tr>
							<th>Producto</th>
							<th>Tipo</th>
							<th>Cases</th>
							<th>Packing</th>
							<th>Qty Kgs</th>
							<th>Rate ($)</th>
							<th>Amount ($)</th>
							<th>Acciones</th>
						</tr>
						<?php if(count($values['sales_products_detail'])>0):?>
							<?php foreach($values['sales_products_detail'] as $sales_products_details):?>
							<?php
									$Products = new Products();
									$products_data = $Products->getProductsById($sales_products_details);
							
							?>
						<tr id='products_list_<?php echo $sales_products_details['id'];?>'>
							<td>
							<input type='hidden' name='id_product[<?php echo $sales_products_details['id'];?>]' value='<?php echo $sales_products_details['id_product']?>'>
							<?php echo strtoupper($products_data['name']);?>
							</td>
							<td>
							<?php
									$ProductsType = new ProductsType();
									$products_type_list = $ProductsType ->getListProductsTypeByIdProduct($sales_products_details['id_product']);


							?>	
								<select name='id_product_type[<?php echo $sales_products_details['id']?>]' id='id_product_type_<?php echo $sales_products_details['id']?>' onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'id_product_type_<?php echo $sales_products_details['id'];?>','id_product_type')">
									<option value=''>...</option>
									<?php if(count($products_type_list)>0):?>
										<?php foreach($products_type_list as $list):?>
										<option value='<?php echo $list['id_product_type']?>'><?php echo $list['name']?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>


							</td>
							<td><input type='text' name='cases[<?php echo $sales_products_details['id']?>]' id='cases_<?php echo $sales_products_details['id']?>' size="2" autocomplete="off" value="<?php echo $sales_products_details['cases']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'cases_<?php echo $sales_products_details['id'];?>','cases')"></td>
							<td><input type='text' name='packing[<?php echo $sales_products_details['id']?>]' id='packing_<?php echo $sales_products_details['id']?>' size="2" autocomplete="off" value="<?php echo $sales_products_details['packing']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'packing_<?php echo $sales_products_details['id'];?>','packing')"></td>
							<td><input type='text' name='quantity[<?php echo $sales_products_details['id']?>]' id='quantity_<?php echo $sales_products_details['id']?>' size="2" autocomplete="off" value="<?php echo $sales_products_details['quantity']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'quantity_<?php echo $sales_products_details['id'];?>','quantity')"></td>
							<td><input type='text' name='rate[<?php echo $sales_products_details['id']?>]' id='rate_<?php echo $sales_products_details['id']?>' size="2" autocomplete="off" value="<?php echo $sales_products_details['rate']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'rate_<?php echo $sales_products_details['id'];?>','rate')"></td>
							<td><input type='text' name='amount[<?php echo $sales_products_details['id']?>]' id='amount_<?php echo $sales_products_details['id']?>' size="2" autocomplete="off" value="<?php echo $sales_products_details['amount']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'amount_<?php echo $sales_products_details['id'];?>','amount')"></td>
							<td><a onclick="deleteProductDetail(<?php echo $sales_products_details['id']?>)"  class="btn btn-danger">Eliminar</a></td>
						<tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
			</div>
			
<script>
function openProducts() {
		
	$.ajax({
		type: "GET",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "products_list"},
		success: function(html){
			$('.modal-body').html(html);
			$('.modal-title').html('Productos');
			$('#myModal').modal('show');
		}
	});

}
function addProducts(id_product) {
	$.ajax({
		type: "POST",
		url: '<?php echo full_url;?>/adm/ajax/index.php',
		data: { action: "add_product",id_sale: <?php echo $values['id_sale']?>,id_product: id_product},
		success: function(html){
		$('#products_details').append(html);
		$('#myModal').modal('toggle');
		}
	});

}

function deleteProductDetail(id) {
	
	if(confirm("¿Está seguro(a) de eliminar el registro?")){

		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "delete_product",id: id},
			success: function(){
				$("#products_list_" + id).remove(); 
			}
		});
		  		
	}else{
		return false;
	}

}

	function updateSalesProductsDetail(id, column_id,column_name)
	{
		var value = $("#" + column_id).val();
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id,column_name:column_name,value:value,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});		
		
	}



</script>