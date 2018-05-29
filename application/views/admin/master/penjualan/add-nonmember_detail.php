<style>
#btnNumpad{
	background-color: #2174c7;
    color: white;
    font-size: 1.5em;
    text-align: -webkit-center;
	margin:2px !important;
	cursor:pointer;
	
}	
</style> 
	<!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">
	<br/><br/><br/>
	<?php $trxDate = date('d-m-Y'); ?>

	<!-- form start -->
	<?php $attribute = Array ("id" => "formtrxid");?>
	<?php echo form_open("#",$attribute); ?>
	<!-- Main content -->
	<!-- left POS content-->
	<div class="col-md-9">

	<div class="hpanel hbgwhite">
	<div class="panel-body list" >
	<div class="col-md-9">
	<div class="form-group has-warning">
	<input type="hidden" class="form-control" name="kdproduk" id="kdproduk" />
	Kode Produk - Nama Produk :
	<input type="text" class="form-control" value="-" name="kodeproduk" id="kodebarang" value="" onfocus="this.value='';" autofocus />
	</div>
	</div>
	<div class="col-md-2">
	<div class="form-group has-warning">
	QTY :
	<input type="text" class="form-control" name="qty" id="qty" value="1" onClick="this.value='';"/>
	</div>
	</div>
	<input type="hidden" class="form-control" name="submit" id="submit" value="tambah" />
	<div class="col-md-1">
	<div class="form-group has-warning"><br/>
	<button type="submit" name="submit2" class="btn btn-success" value="tambah" id="submittambahproduk">
		<i class="fa fa-plus-square"></i></button>
	</div>
	</div>
	<div class="col-md-2">
	<div class="form-group">
	<input type="hidden" name="nofak" value="<?php echo $trxid;?>">
	</div>
	</div>
	<div class="col-md-2">
	<div class="form-group">
	<input class="form-control" type="hidden" name="tgltrx" value="<?php echo $trxDate; ?>" />
	</div>
	</div>
	  <?php 
	function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
	}
	?>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th width=80%><p class="text-success">ITEM</h4></th>
				<th width=5%><h4 class="font-extra-bold no-margins text-success"></h4></th>
				<th width=15%><p class="text-success">SUB TOTAL</h4></th>
			</thead>
			<tbody  id="tableItem">
			
				<?php  
				$no = 1;
				$total=0;
				foreach ($detail as $r):
					
					?>
				<tr class="gradeU">
					<td>
					<a href="#" data-toggle="modal" data-target="#myModaledit" id="btnShowitem" ideditpro="<?php echo $r->detailID ?>" nampro="<?php echo $r->productName; ?>" harpro="<?php echo $r->detailPrice; ?>" qtypro="<?php echo $r->detailQty; ?>" nofakedit="<?php echo $trxid;?>" kdproduk="<?php echo $r->productBarcode ?>">
					<p><?php echo $r->productName; ?></p>
					</a>
					</i>
					</b>
					
					</td><input type="hidden" class="form-control" name="harga" value=" <?php echo number_format($r->detailPrice) ?>" readonly />
					<td><b><?php echo $r->detailQty ?></b></td>
					
					<td><input type="text"  class='form-control' name="subtotal" value=" <?php echo number_format($r->detailSubtotal) ?>" readonly /></td>
					<input type="hidden" name="qtyremove" id="qtyremove">
						</tr>
						<?php 
						$total=$total+$r->detailSubtotal; ?>
					<?php endforeach ?>
			</tbody>
		</table>
	
	</div>	
	</div>
	</div>
	<!-- left POS content-->
	<?php echo form_close(); ?>
	
	<?php $attribute2 = Array ("id" => "formBayar");?>
	<?php echo form_open("#",$attribute2); ?>
	<!-- right POS content-->
	<div class="col-md-3">
	<div class="hpanel">
	<div class="panel-body list" style="padding:10px 5px !important;">
	<div class="col-md-12" style="height:450px;overflow:auto;">
	<p>No Fak : <b class="badge badge-info"><?php echo $trxid; ?></b></p>
	<input type="hidden" class="form-control" name="submit" id="submitBayar" value="selesaitrx" />
	<div class="col-md-12" id="ProsesSegment">
		<div class="formBayar">
				<table border="0" cellpadding="12" cellspacing="12">
						<tr>
						<td width="35%"><b><small>DISKON %</small></b><input form="formBayar" type="text" class="form-control" name="diskon" id="diskon" onClick="this.value='0'" value="0" style="color:red;font-size:27px;font-weight:bold;" /></td>
						<td align="right"><b>SUB TOTAL</b><input form="formBayar" type="text" class="form-control" name="subtotal" id="subtotal" value="<?php $total_harga = $total; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly style="background-color:#0a0a0a;color:#fff;font-size:25px;font-weight:bold;text-align:right" /></td>
						</tr>
						<tr>
						<td colspan="2">
						<b><small>   TOTAL</small></b><input form="formBayar" type="text" class="form-control" name="total" id="diskonTotal"  value="<?php echo number_format($total_harga); ?>" readonly style="background-color:#0a0a0a;color:#fff;font-size:25px;font-weight:bold;text-align:right" />
						</td>
						</tr>
						<tr>
						<td colspan="2"><b>TOTAL BAYAR</b><input form="formBayar" type="text" class="form-control" name="bayar" id="bayar" onClick="this.value='0';" value="0" style="color:red;font-size:27px;font-weight:bold;" /></td>
						</tr>
						<tr>
						<td colspan="2"><b>KEMBALI </b><input form="formBayar" type="text" class="form-control" name="kembali" id="kembali" style="color:blue;font-size:25px;font-weight:bold;" readonly /></td>
						</tr>
						<tr>
						<td colspan="2">
							<div class="grid">
								<?php 
								for($x=1;$x<10;$x++){
									echo '<div class="col-md-3" id="btnNumpad" class="btnNumpad" OnClick="hitung('.$x.')">'.$x.'</div>';
								}
								?>
								<div class="col-md-3" id="btnNumpad" class="btnNumpad" OnClick="hitung(0)">0</div>
								<div class="col-md-3" id="btnNumpad" class="btnNumpad" OnClick="hitung('00')">00</div>
							</div>
						</td>
						</tr>
						<tr>
						<td colspan="2">Cash:
						<input type="hidden" name="harga" id="hargaModal" value="">
							<select name="banktipe" class="form-control" id="tipebank" form="formBayar" >
								<option value="tunai" >Tunai</option>
								<option value="debit" > K. Debit</option>
								<option value="kredit" >K. Kredit</option>
							</select>
						</td>
						</tr>
						
						<tr>
						<td colspan="4">
						<div class="col-md-12" id="banktipe">
						Nomor : <input type="text"  name="bankno" class="form-control" form="formBayar" >
							Bank : <select name="bankmember" class="form-control" id="bankmember" form="formBayar" >
								<option value="">Pilih Bank</option>
								<?php
								foreach($bank as $data){ ?>
									<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>

								<?php } ?>
							</select>	
						</div>
							</td>
						</tr>
						</table>
					</div>
					<div class="FormBayarfooter">
					
					</div>
	
	</div>
	</div>
	<div class="col-md-12">
		<!--<div class="col-md-12">
		<div class="form-group">
		<label>TOTAL</label>
		<input  type="text" class="form-control" name="total" value="<?php $total_harga = $total; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly style="background-color:#0a0a0a;color:#fff;font-size:17px;font-weight:bold;width:100%;"/>
		</div>
		</div>
		<div class="col-md-6">
		<a href="#"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="btnShow">
														<i class="fa fa-money"></i> Bayar Transaksi
														</a>
		</div>-->
		<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-info btn-sm" value="selesaitrx" id="bayartrx" form="formBayar">
		<i class="fa fa-save"></i> Bayar</button>
		</div>
		<div class="col-md-4">
		<button type="button" name="submit" class="btn btn-primary" id="simpaneditpjl" value="edittrx">Simpan</button>
		</div>
		<div class="col-md-4">
		<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-danger btn-sm" id="canceltrx"><i class="fa fa-arrow-circle-left"></i> Batalkan</a>
		</div>
		</div>
	<!-- right POS content-->
	</div><!-- /.box-body -->
	</div>
	</div>

	<?php echo form_close(); ?>
	<div class="box-body">

	</div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- form edit -->
	
	<!-- end form edit -->			

	</div>
	
	
		<!-- form edit -->
  	<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<?php $attribute2 = Array ("id" => "formEdit");?>
	<?php echo form_open("#",$attribute2); ?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="color-line"></div>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>		
			<div class="modal-body">
  		<div class="form-group">
  			<input type="hidden" name="kdproduk" id="productbarcode1" form="formEdit">
			<input type="hidden" name="qtybef" id="qtybef" form="formEdit">
  			<input type="hidden" name="nofak" value="<?php echo $trxid;?>" form="formEdit">
  			<input type="hidden" name="ideditpro" id="ideditpro" form="formEdit">
  			<label for="exampleInputEmail1">Nama Produk</label>
  			<input type="text" class="form-control" name="nampro" id="nampro" readonly/>
  		</div>
  		<div class="form-group">
  			<label for="exampleInputEmail1">Harga</label>
  			<input type="text" class="form-control" name="harpro" id="harpro" readonly/>
  		</div>
  		<div class="form-group">
  			<label for="exampleInputEmail1">Quantitas</label>
  			<input type="text" class="form-control" name="qtypro" id="qtypro" onClick="this.value='';" form="formEdit" />
  		</div>
		<div class="col-md-12" id="verifikasi">
		<center><h3>Membutuhkan Verifikasi!</h3></center>
		<div class="col-md-5">
		<label for="exampleInputEmail1">Supervisor ID</label>
	    <input type="text" class="form-control" name="supid" id="supid" form="formEdit" />
		</div>
		<div class="col-md-5">
		<label for="exampleInputEmail1">Password</label>
		<input type="password" class="form-control" name="suppass" form="formEdit" />
		</div>
		<div class="col-md-2"><br/>
		<button type="button" name="submit" class="btn btn-sm btn-info" id="verifikasihapitem" value="deltrxitem" form="formEdit"><i class="fa fa-check-circle-o">
		</i> Verifikasi</button>
		</div>
		<hr/>
		</div>
		<input type="hidden" class="form-control" name="submit" id="submitEdit" value="edittrxitem" />
  		<button type="button" name="submit" class="btn btn-sm btn-success" id="simpanedit" value="edittrxitem" form="formEdit"><i class="fa fa-save">
		</i> Simpan</button>
		<button type="button" name="submit" class="btn  btn-sm btn-danger" id="hapustrxitem">Batal Transaksi Item</button>

  	</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	</div>
	<div id="print" style="display:none;"></div>
  	<!-- end form edit -->			
  	
	
	
	<script language="javascript" src="<?php echo site_url();?>assets/js/jQuery-print.js"></script>
	<script>
	var TotalHarga = "<?php echo $total_harga ?>";
	var TotalDiskon = "<?php echo $total_harga ?>";
	var kembali=0;
	$(document).ready(function(){
		$("#formtrxid").submit(function(){
			var DataForm = $("#formtrxid").serialize();
			
			if($("#kdproduk").val() ==""){	
				alert("Produk belum dipilih")
				return false;	
			}else{
				$("#submit").val("tambah");
				$.post("<?php echo '?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'' ?>",DataForm,function(result){
					loadDataItem(result);
				},"json")
				return false;	
			}
			$("#kdproduk").val("");
			return false;
		})
		$("#diskon").keyup(function(){
			var NilaiDiskon = parseInt($("#diskon").val()) * parseInt(TotalHarga) / 100;
			TotalDiskon = parseInt(TotalHarga)-parseInt(NilaiDiskon);
			$("#diskonTotal").val(TotalDiskon);
			$("#diskonTotal").number( true, 0 );
			hitung("");
		})	
		$("#bayartrx").click(function(){
			$("#submitBayar").val("selesaitrx");
			var DataForm = $("#formBayar").serialize();
			if(TotalHarga <=0){
				alert("Belum ada barang yang harus dibayar");
			}else{
				$.post("<?php echo '?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'' ?>",DataForm,function(result){
					$("#print").html(result);
					w=window.open();
					w.document.write($('#print').html());
					w.print();
					w.close();
					$('#print').html("")
					document.location.href =  "<?php  echo base_url('admin'); ?>"; 
				})
					
			}
			return false;	
		})
		$("#simpanedit").click(function(){
			$("#submitEdit").val("edittrxitem");
			var DataForm = $("#formEdit").serialize();
			if(TotalHarga <=0){
				alert("Belum ada barang yang dipilih");
			}else{
				$.post("<?php echo '?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'' ?>",DataForm,function(result){
					$('#myModaledit').modal('hide');
					loadDataItem(result);
				},"json")
			}
			return false;	
		})	
		$("#hapustrxitem").click(function(){
			$('#verifikasi').show();
			$('#supid').focus();
			return false;	
		});
		$("#verifikasihapitem").click(function(){
			$("#submitEdit").val("deltrxitem");
			var DataForm = $("#formEdit").serialize();
			$.post("<?php echo '?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'' ?>",DataForm,function(result){
				if(result.message !=""){
					alert(result.message);
				}else{
					$('#myModaledit').modal('hide');
					$('#verifikasi').hide();
					loadDataItem(result);
				}
			},"json")
			return false;	
		});
		$("#simpaneditpjl").click(function(){
				document.location.href =  "<?php  echo base_url('admin'); ?>"; 
		});
		
		
		
		function loadDataItem(result){
			if(result.detail.length >0 ){
				var AllItem = "";
				TotalHarga = 0;// reset nilai yang sudah diambil dengan PHP
				hargaModal = 0;
				for (var x=0;x<result.detail.length;x++){
					var data = result.detail[x];
					var item = '<tr class="gradeU"><td>';
					item += '<a href="#" data-toggle="modal" data-target="#myModaledit" id="btnShowitem" ideditpro="'+data.detailID +'" nampro="'+data.productName+'" harpro="'+data.detailPrice+'" qtypro="'+data.detailQty+'" nofakedit="<?php echo $trxid;?>" kdproduk="'+data.productBarcode +'">';
					item += '<p>'+data.productName+'</p>';
					item += '</a></i></b>';
					item += '</td><input type="hidden" class="form-control" name="harga" value=" '+data.detailPrice+'" readonly />';
					item += '<td><b>'+data.detailQty +'</b></td>';
					item += '<td><input type="text"  class="form-control" name="subtotal" value=" '+data.detailSubtotal+'" readonly /></td>';
					item += '<input type="hidden" name="qtyremove" id="qtyremove"></tr>';

					AllItem +=item;
					TotalHarga += parseInt(data.detailSubtotal);
					hargaModal += parseInt(data.detailPrice);
				}
				$("#tableItem").html(AllItem);
				$("#subtotal").val(TotalHarga);
				$("#subtotal").number( true, 0 );
				$("#hargaModal").val()
				$('#diskon').trigger('keyup');
				
			}
		}
	})
		
	
	 
	function hitung(val){
		var valNew = $("#bayar").val()+""+val;
		$("#bayar").val(parseInt(valNew));
		$("#bayar").number( true, 0 );
		kembali = parseInt(valNew) - parseInt(TotalDiskon)
		$("#kembali").val(kembali);
		$("#kembali").number( false, 0 );
	}
	
	window.onkeydown = function(e) {
    if ((e.which || e.keyCode) == 118) {
        $( "#btnShow" ).click();
		$('#bayar').focus();
		
    }
	else if ((e.which || e.keyCode) == 119) {
        $( "#btnShowitem" ).focus();
		
    }
	else if ((e.which || e.keyCode) == 115) {
        $( "#bayar" ).focus();
		
    }
	else if ((e.which || e.keyCode) == 113) {
		$("#bayartrx").focus();
		
    }
	}
	</script>
	
	
	
	

<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 


