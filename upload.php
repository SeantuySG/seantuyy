<?php
$koneksi = mysqli_connect("localhost","root","","sap");
require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
?>
<?php
	if (isset($_POST["submit"])){
		$target = basename($_FILES['data']['name']);
		move_uploaded_file($_FILES['data']['tmp_name'], $target);
		chmod($_FILES['data']['name'],0777);
		$data = new Spreadsheet_Excel_Reader($_FILES['data']['name'],false);
		/*foreach ($data as $key) {
			echo $key;
		}
		var_dump($data);
		die;*/
		$jumlah_baris = $data->rowcount($sheet_index=0);
		$berhasil = 0;
		for($i=2; $i<=$jumlah_baris; $i++){
			$temp = explode('.', $_FILES['data']['name']);

			$id = $temp[0];
			$pr_number = $data->val($i, 2);
			$item_no_pr = $data->val($i, 3);
			$acct_assign_cat = $data->val($i, 4);
			$requirement_track_no = $data->val($i, 5);
			$short_text = $data->val($i, 6);
			$wbs_element = $data->val($i, 7);
			$wbs_dsc = $data->val($i, 8);
			$pr_date = $data->val($i, 9);
			$gl_account = $data->val($i, 10);
			$cost_center = $data->val($i, 11);
			$profit_center = $data->val($i, 12);
			$pr_quantity = $data->val($i, 13);
			$pr_unit = $data->val($i, 14);
			$doc_total_amount_pr = $data->val($i, 15);
			$doc_currency = $data->val($i, 16);
			$po_number = $data->val($i, 17);
			$item_no_po = $data->val($i, 18);
			$vendor = $data->val($i, 19);
			$name_vendor = $data->val($i, 20);
			$po_date = $data->val($i, 21);
			$delivery_date = $data->val($i, 22);
			$po_quantity = $data->val($i, 23);
			$po_unit = $data->val($i, 24);
			$doc_total_amount_po = $data->val($i, 25);
			$no_gr = $data->val($i, 26);
			$item_gr_doc = $data->val($i, 27);
			$posting_date_gr = $data->val($i, 28);
			$doc_date_gr = $data->val($i, 29);
			$quan_gr = $data->val($i, 30);
			$doc_amount_gr = $data->val($i, 31);
			$local_amount_gr = $data->val($i, 32);
			$no_ir = $data->val($i, 33);
			$item_ir_doc = $data->val($i, 34);
			$posting_date_ir = $data->val($i, 35);
			$doc_date_ir = $data->val($i, 36);
			$quan_ir = $data->val($i, 37);
			$doc_amount_ir = $data->val($i, 38);
			$local_amount_ir = $data->val($i, 39);
			$id_project = $data->val($i, 40);
			$dsc_project = $data->val($i, 41);
			$contract_number = $data->val($i, 42);
			$contract_date = $data->val($i, 43);

			/*$query = "INSERT INTO data VALUES (
					'$id','$pr_number','$item_no_pr','$acct_assign_cat','$requirement_track_no',
					'$short_text','$wbs_element','$wbs_dsc','$pr_date,$gl_account','$cost_center',
					'$profit_center','$pr_quantity','$pr_unit','$doc_total_amount_pr','$doc_currency',
					'$po_number','$item_no_po','$vendor','$name_vendor','$po_date',
					'$delivery_date','$po_quantity','$po_unit','$doc_total_amount_po','$no_gr',
					'$item_gr_doc','$posting_date_gr','$doc_date_gr','$quan_gr','$doc_amount_gr',
					'$local_amount_gr','$no_ir','$item_ir_doc','$posting_date_ir','$doc_date_ir',
					'$quan_ir','$doc_amount_ir','$local_amount_ir','$id_project,'$dsc_project',
					'$contract_number','$contract_date')";*/

			if(/*$id != "" && $pr_number != "" && $item_no_pr != "" && $acct_assign_cat != "" && $requirement_track_no != "" && $short_text != "" && $wbs_element != "" && $wbs_dsc != "" && $pr_date != "" && $gl_account != "" && $cost_center != "" && $profit_center != "" && $pr_quantity != "" && $pr_unit != "" && 
				$doc_total_amount_pr != "" && $doc_currency != "" && $po_number != "" && $item_no_po != "" && $vendor != "" && 	$name_vendor != "" && $po_date != "" && $delivery_date != "" && $po_quantity != "" && $po_unit != "" && $doc_total_amount_po != "" && $no_gr != "" && $item_gr_doc != "" && $posting_date_gr != "" && $doc_date_gr != "" && $quan_gr != "" && $doc_amount_gr != "" && $local_amount_gr != "" && $no_ir != "" && $item_ir_doc != "" && $posting_date_ir != "" && $doc_date_ir != "" && $quan_ir != "" && $doc_amount_ir != "" && $local_amount_ir != "" && $id_project != "" && $dsc_project != "" && $contract_number != "" && $contract_date != ""*/true){ 				
			}
			mysqli_query($koneksi,
				"INSERT INTO data VALUES (
					'','5pr_number','5item_no_pr','5acct_assign_cat','5requirement_track_no',
					'5short_text','5wbs_element','5wbs_dsc','5pr_date,5gl_account','5cost_center',
					'5profit_center','5pr_quantity','5pr_unit','5doc_total_amount_pr','5doc_currency',
					'5po_number','5item_no_po','5vendor','5name_vendor','5po_date',
					'5delivery_date','5po_quantity','5po_unit','5doc_total_amount_po','5no_gr',
					'5item_gr_doc','5posting_date_gr','5doc_date_gr','5quan_gr','5doc_amount_gr',
					'5local_amount_gr','5no_ir','5item_ir_doc','5posting_date_ir','5doc_date_ir',
					'5quan_ir','5doc_amount_ir','5local_amount_ir','5id_project,'5dsc_project',
					'5contract_number','5contract_date')"
			);
			$berhasil++;

		}
		echo $jumlah_baris."berhasil ".$berhasil;
	}else{
		echo "<script> 
					alert('Anda belum memilih file!'); 
					</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Excel</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="data">
		<button type="submit" name="submit">upload</button>
	</form>

</body>
</html>