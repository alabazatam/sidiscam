<?php

    class InvoicesPDF 
    {
        
        function generate1($values)
        {
            $id_sale = $values['id_sale'];
            //echo $id_sale;die;
            $Sales = new Sales();
			$Utilitarios = new Utilitarios();
            $sale_data = $Sales ->getSalesInvoiceById($values);
            $sale_date =  $sale_data['date_sale'];
            $id_country_out = $sale_data['id_country_out'];
            $id_port_out = $sale_data['id_port_out'];
            $date_out = $sale_data['date_out'];
            $id_country_in = $sale_data['id_country_in'];
            $id_port_in = $sale_data['id_port_in'];
            $date_estimate_in = $sale_data['date_estimate_in'];
			$date_out = $sale_data['date_out'];
            $client_name = $sale_data['client_name'];
			$client_address = $sale_data['client_address'];
			$plant_name =  $sale_data['plant_name'];
			$plant_rif =  $sale_data['plant_rif'];
			$plant_address =  $sale_data['plant_address'];
			$plant_country =  $sale_data['plant_country'];
			$products_detail = $Sales->getSalesProductsDetail($values);
			$bank_name = $sale_data['bank_name'];
			$aba = $sale_data['aba'];
			$swit = $sale_data['swit'];
			$account = $sale_data['account'];
            
            ob_clean();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator("Marcos De Andrade");
            $pdf->SetAuthor('Marcos De Andrade');
            $pdf->SetTitle('Factura');
            $pdf->SetSubject('Factura');
            $pdf->SetKeywords('Factura, invoice, Coseinca');
            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('freeserif', '', 8);

            // add a page
            $pdf->AddPage();

            // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
            // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

            // create some HTML content
            $class_td = "border-bottom: 0px #ffffff !important;border-top: 0px !important; border-right: 0px; border-left: 0px";
            $html ='
            <table border="0" width="100%">
                <tr>
                    <td style="width:50%"></td>
                    <td>
                        <table border="1">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Invoice Date</td>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Proforma Invoice #</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">'.$sale_date.'</td>
                                <td style="text-align:center;">'.$id_sale.'</td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
            <div></div>
            <table width="100%" border="0">
                <tr>
                    <td style="width:40%">
                        <table border="1" width="100%">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Bill To</td>
                            </tr>
                            <tr>
                                <td>
									<strong>'.strtoupper($client_name).'</strong><br>
									<strong>'.strtoupper($client_address).'</strong>
								
								</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%"></td>
                    <td style="width:40%">
                        <table border="1" width="100%">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Processing Plant</td>
                            </tr>';
            
                $html.='
                            <tr>
                                <td>'.strtoupper($plant_name).'</td>
                            </tr>';
                $html.='
                            <tr>
                                <td>'.strtoupper($plant_rif).'</td>
                            </tr>'; 
                $html.='
                            <tr>
                                <td>'.strtoupper($plant_address).'</td>
                            </tr>'; 
                $html.='
                            <tr>
                                <td>'.strtoupper($plant_country).'</td>
                            </tr>';
        $html.='
                        </table>
                    </td>
                </tr>
            </table>
			<br>
            ';
		//lista de productos
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->ln();
		$total_amount = 0;
		$total_quantity = 0;
		$total_cases = 0;
		$html ='<table width="100%" border="1">'
			. '<tr style="background-color: #CCC;">'
				. '<th style="text-align: center;" width="10%"><strong>Container #</strong></th>'
				. '<th style="text-align: center;" width="40%"><strong>Item</strong></th>'
				. '<th style="text-align: center;" width="10%"><strong>Cases</strong></th>'
				. '<th style="text-align: center;" width="10%"><strong>Packing</strong></th>'
				. '<th style="text-align: center;" width="10%"><strong>Qty Kgs</strong></th>'
				. '<th style="text-align: center;" width="10%"><strong>Rate ($)</strong></th>'
				. '<th style="text-align: center;" width="10%"><strong>Amount ($)</strong></th>'
			. '</tr>';
		
		foreach($products_detail as $products)
		{
		$total_amount+= $products['amount'];
		$total_cases+= $products['cases'];
		$total_quantity+= $products['quantity'];
		$html.='<tr>'
				. '<td>'.$products['number'].'</td>'
				. '<td>'.$products['product_name']." ".$products['product_type_name'].'</td>'
				. '<td style="text-align: right;">'.$products['cases'].'</td>'
				. '<td style="text-align: center;">'.$products['packing'].'</td>'
				. '<td style="text-align: right;">'.$products['quantity'].'</td>'
				. '<td style="text-align: right;">$&nbsp;&nbsp;&nbsp;'.$products['rate'].'</td>'
				. '<td style="text-align: right;">$&nbsp;&nbsp;&nbsp;'.$products['amount'].'</td>'
			. '</tr>';			
		}
		$html.='<tr>'
				. '<td>&nbsp;</td>'
				. '<td><strong>Feltrina 01-2015 <br> SNT 497</strong></td>'
				. '<td style="text-align: right;"><strong>'.$total_cases.'</strong></td>'
				. '<td>&nbsp;</td>'
				. '<td style="text-align: center;"><strong>Kgr. <br>'.$total_quantity.'</strong></td>'
				. '<td style="text-align: center;"><strong>INCOTERMS <br> CFR</strong></td>'
				. '<td style="text-align: right;"><strong>$&nbsp;&nbsp;&nbsp;'.$total_amount.'</strong></td>'
			. '</tr>';					
		
		$html.= '</table>';
		$pdf->ln();
		$pdf->writeHTML($html, true, false, true, false, '');
		//fin lista de productos
		//cuentas bancarios y otros
		$html = '<table border="0" width="100%">'
			. '<tr>'
			. '<td><strong>Carga #5</strong></td>'
			. '<td>&nbsp;</td>'
			. '<td>&nbsp;</td>'
			. '<td style="text-align: right;"><strong>Make All Checks payable to:</strong></td>'
			. '</tr>'
			. '<tr>'
			. '<td>&nbsp;</td>'
			. '<td>&nbsp;</td>'
			. '<td style="text-align: right;"><strong>Beneficiary:</strong></td>'
			. '<td style="text-align: left;"><strong>Coseinca Trading Corp.</strong></td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;"><strong>Destination:</strong></td>'
			. '<td style="text-align: left;"><strong>Haiphong Viet Nam:</strong></td>'
			. '<td style="text-align: right;"><strong>Address:</strong></td>'
			. '<td style="text-align: left;">9955 NW, 116th Way, Suite 8, Miami FL 33178</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;" colspan="2"><strong>Product Packed in Venezuela</strong></td>'
			. '<td style="text-align: right;" colspan="2">&nbsp;</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;" colspan=""><strong>Container No:</strong></td>'
			. '<td style="text-align: left;" colspan=""><strong>SUDU-813 053-0</strong></td>'
			. '<td style="text-align: right;" colspan="2">&nbsp;</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;" colspan=""><strong>Shipping Line:</strong></td>'
			. '<td style="text-align: left;" colspan=""><strong>Linea naviera</strong></td>'
			. '<td style="text-align: right;" colspan="2">&nbsp;</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;" colspan=""><strong>Precinto#:</strong></td>'
			. '<td style="text-align: left;" colspan=""><strong>Precinto</strong></td>'
			. '<td style="text-align: right;"><strong>Bank:</strong></td>'
			. '<td style="text-align: left;">'.$bank_name.'</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;"><strong>ETD:</strong></td>'
			. '<td style="text-align: left;"><strong>'.$date_out.'</strong></td>'
			. '<td style="text-align: right;"><strong>ABA#:</strong></td>'
			. '<td style="text-align: left;">'.$aba.'</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;"><strong>ETA:</strong></td>'
			. '<td style="text-align: left;"><strong>'.$date_estimate_in.'</strong></td>'
			. '<td style="text-align: right;"><strong>Account#:</strong></td>'
			. '<td style="text-align: left;">'.$account.'</td>'
			. '</tr>'
			. '<tr>'
			. '<td style="text-align: left;" colspan="2"></td>'
			. '<td style="text-align: right;"><strong>Swift#:</strong></td>'
			. '<td style="text-align: left;">'.$swit.'</td>'
			. '</tr>'
			. '</table>';
			$pdf->ln();
			$pdf->writeHTML($html, true, false, true, false, '');
			
			//terminos de negociacion
			$html = '<table width="50%" style="background-color: #ccc; border: 1 1 1 1;">'
				. '<tr>'
				. '<td style="text-align: left;"><strong>Payment:</strong></td>'
				. '<td style="text-align: left;"><strong>40 000 usd anticipated against proforma Sold 10 days before arrival to destination port</strong></td>'
				. '</tr>'
				. '</table>';
			
			$pdf->ln();
			$pdf->writeHTML($html, true, false, true, false, '');			
			
			//fin terminos de negociacion
			
			//otros datos
			$html = '<table width="100%" border="0" >'
				. '<tr>'
				. '<th style="text-align: center; background-color: #ccc;"><strong>Phone#</strong></th>'
				. '<th style="text-align: center; background-color: #ccc; "><strong>Fax#</strong></th>'
				. '<th style="text-align: center; background-color: #ccc;"><strong>E-mail</strong></th>'
				. '<th style="text-align: center;"></th>'
				. '<th style="text-align: center;"></th>'								
				. '</tr>'
				. '<tr>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"></td>'
				. '<td style="text-align: right; background-color: #ccc;"><strong>Balance due $ &nbsp;&nbsp;&nbsp;&nbsp;'.$total_amount.'</strong></td>'								
				. '</tr>'
				. '</table>';
			
			$pdf->ln();
			$pdf->ln();
			$pdf->writeHTML($html, true, false, true, false, '');			
			
			//fin otros datos	

			
			//BL data
			$html = '<table width="80%" >'
				. '<tr>'
				. '<td style="text-align: left;"><strong>BL datas:</strong></td>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '</tr>'
				. '<tr>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"><strong>CONSIGNEE:</strong></td>'
				. '<td style="text-align: left;"><strong>GOLDEN STAR TRADING AND SHIPPING INVESTMENT JOINT STOCK COMPANY</strong></td>'
				. '</tr>'
				. '<tr>'
				. '<td style="text-align: left;"><strong></strong></td>'
				. '<td style="text-align: left;"><strong>NOTIFY:</strong></td>'
				. '<td style="text-align: left;"><strong>GOLDEN STAR TRADING AND SHIPPING INVESTMENT JOINT STOCK COMPANY</strong></td>'
				. '</tr>'
				. '</table>';
			
			$pdf->ln();
			$pdf->writeHTML($html, true, false, true, false, '');			
			
			//fin otros datos	
            // output the HTML content
            //$pdf->writeHTML($html, true, false, true, false, '');
            // reset pointer to the last page
            $pdf->lastPage();
            
            // ---------------------------------------------------------

            //Close and output PDF document
            $pdf->Output('factura.pdf', 'I');

            
            return $pdf;
        }
        
        
        
        
        
        
        
    }