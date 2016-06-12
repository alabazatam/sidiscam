<?php
		$ProductsType = new ProductsType();
?>			
<br>
			<a onclick="openProducts();" class="btn btn-success">Agregar producto <i class="fa fa-plus-circle"></i></a>
<br><br><br>
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="table-responsive">
				<table id="products_details" class="table table-bordered" width='100%'>
						<tr>
							<th>Producto</th>
							<th>Tipo</th>
							<th>Cases</th>
							<th>Packing</th>
							<th>Qty Kgs</th>
							<th>Rate ($)</th>
							<th>Amount ($)</th>
							<th>Observación</th>
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
										<option value='<?php echo $list['id_product_type']?>' <?php if($list['id_product_type'] == @$sales_products_details['id_product_type']) echo "selected='selected'";?>><?php echo $list['name']?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>


							</td>
							<td><input type='number' min="0" name='cases[<?php echo $sales_products_details['id']?>]' id='cases_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['cases']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'cases_<?php echo $sales_products_details['id'];?>','cases')"></td>
							<td><input type='number' min="0" name='packing[<?php echo $sales_products_details['id']?>]' id='packing_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['packing']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'packing_<?php echo $sales_products_details['id'];?>','packing')"></td>
							<td><input type='text' min="0" readonly="readonly" name='quantity[<?php echo $sales_products_details['id']?>]' id='quantity_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['quantity']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'quantity_<?php echo $sales_products_details['id'];?>','quantity')"></td>
							<td><input type='number' step="0.01" min="0.00" name='rate[<?php echo $sales_products_details['id']?>]' id='rate_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['rate']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'rate_<?php echo $sales_products_details['id'];?>','rate')"></td>
							<td><input type='text' min="0"  step="0.01" readonly="readonly" name='amount[<?php echo $sales_products_details['id']?>]' id='amount_<?php echo $sales_products_details['id']?>' size="6" autocomplete="off" value="<?php echo $sales_products_details['amount']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'amount_<?php echo $sales_products_details['id'];?>','amount')"></td>
							<td><input type='text' min="0"  name='note[<?php echo $sales_products_details['id']?>]' id='note_<?php echo $sales_products_details['id']?>' size="20" autocomplete="off" value="<?php echo $sales_products_details['note']?>" onchange="updateSalesProductsDetail(<?php echo $sales_products_details['id'];?>,'note_<?php echo $sales_products_details['id'];?>','note')"></td>
							<td><a onclick="deleteProductDetail(<?php echo $sales_products_details['id']?>)"  class="btn btn-danger">Eliminar</a></td>
						<tr>
							<?php endforeach;?>
						<?php endif;?>
					
				</table>
				</div>
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
		var id_product_type = $("#id_product_type_" + id).val();
		var cases = $("#cases_" + id).val();
		var packing = $("#packing_" + id).val();
		var quantity = $("#quantity_" + id).val();
		var rate = $("#rate_" + id).val();
		var amount = $("#amount_" + id).val();
		
		
		quantity = parseFloat(cases).toFixed(2) * (parseFloat(packing).toFixed(2) * 1.8);
		amount = parseFloat(quantity).toFixed(2) * parseFloat(rate).toFixed(2);
		amount = parseFloat(amount).toFixed(2);
		$("#quantity_" + id).val(quantity);
		$("#amount_" + id).val(amount);
		
		var column_id_quantity = "quantity_" + id;
		var column_name_quantity = "quantity";
		var column_id_amount = "amount_" + id;
		var column_name_amount = "amount";
		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id,column_name:column_name,value:value,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});		
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id_quantity,column_name:column_name_quantity,value:quantity,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});	
		$.ajax({
			type: "POST",
			url: '<?php echo full_url;?>/adm/ajax/index.php',
			data: { action: "update_product",id: id,column_id:column_id_amount,column_name:column_name_amount,value:amount,id_sale:<?php echo $values['id_sale']?>},
			success: function(){
				// 
			}
		});
	}



</script>