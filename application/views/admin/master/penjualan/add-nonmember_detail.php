 
	<!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">
	<br/><br/><br/>
	<?php $trxDate = date('d-m-Y'); ?>

	<!-- form start -->
	<?php $attribute = Array ("id" => "formtrxid");?>
	<?php echo form_open('4d111-t1272/?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'',$attribute); ?>
	<!-- Main content -->
	<!-- left POS content-->
	<div class="col-md-9">

	<div class="hpanel hbgwhite">
	<div class="panel-body list">


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

	<div class="col-md-1">
	<div class="form-group has-warning"><br/>
	<button type="submit" name="submit" class="btn btn-success" value="tambah" id="submittambahproduk">
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
			<tbody>
			
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

	<!-- right POS content-->
	<div class="col-md-3">
	<div class="hpanel">
	<div class="panel-body list">
	<div class="col-md-12" style="height:450px;overflow:auto;">
	<p>No Fak : <b class="badge badge-info"><?php echo $trxid; ?></b></p>
		
	</div>
	<div class="col-md-12">
		<div class="col-md-12">
		<div class="form-group">
		<label>TOTAL</label>
		<input  type="text" class="form-control" name="total" value="<?php $total_harga = $total; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly style="background-color:#0a0a0a;color:#fff;font-size:17px;font-weight:bold;width:100%;"/>
		</div>
		</div>
		<div class="col-md-6">
		<a href="#"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="btnShow">
														<i class="fa fa-money"></i> Bayar Transaksi
														</a>
		</div>
		<div class="col-md-6">
		<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-danger btn-sm" id="canceltrx"><i class="fa fa-arrow-circle-left"></i> Batalkan</a>
		</div>
		</div>
	<!-- right POS content-->
	</div><!-- /.box-body -->
	</div>
	</div>

	<div class="box-body">

	</div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- form edit -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="color-line"></div>
				
			<div class="modal-body">
			  <h4 class="modal-title">BAYAR</h4>
<table border="0" cellpadding="12" cellspacing="12">
		<tr>
		<td colspan="2"><b>TOTAL</b>
		<input form="formtrxid" type="text" class="form-control" name="total" value="<?php $total_harga = $total; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly style="background-color:#0a0a0a;color:#fff;font-size:25px;font-weight:bold;"/>
		</td>
		</tr>
		<tr>
		<td><b>TOTAL BAYAR</b><input form="formtrxid" type="text" class="form-control" name="bayar" id="bayar" onClick="this.value='';" style="color:red;font-size:27px;font-weight:bold;" /></td>
		<td><b>KEMBALI </b><input form="formtrxid" type="text" class="form-control" name="kembali" id="kembali" style="color:blue;font-size:25px;font-weight:bold;" readonly /></td>
		</tr>
		<tr>
		<td colspan="2">Cash:
			<select name="banktipe" class="form-control" id="tipebank" form="formtrxid" >
				<option value="tunai" >Tunai</option>
				<option value="debit" > K. Debit</option>
				<option value="kredit" >K. Kredit</option>
			</select>
		</td>
		</tr>
		
		<tr>
		<td colspan="4">
		<div class="col-md-12" id="banktipe">
		Nomor : <input type="text"  name="bankno" class="form-control" form="formtrxid" >
            Bank : <select name="bankmember" class="form-control" id="bankmember" form="formtrxid" >
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
			<div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-success" value="selesaitrx" id="bayartrx" form="formtrxid">
			<i class="fa fa-save"></i> Bayar</button>
				<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-circle-left"></i> Batal</a>		
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      <button type="submit" name="submit" class="btn btn-primary" id="simpaneditpjl" value="edittrx">Simpan</button>
                              
			</div>
		</div>
	</div>
	</div>
	<!-- end form edit -->			

	</div>
	
	
		<!-- form edit -->
  	<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="color-line"></div>
				
			<div class="modal-body">
  		<div class="form-group">
  			<input type="hidden" name="kdproduk" id="productbarcode1" form="formtrxid">
			<input type="hidden" name="qtybef" id="qtybef" form="formtrxid">
  			<input type="hidden" name="nofak" value="<?php echo $trxid;?>" form="formtrxid">
  			<input type="hidden" name="ideditpro" id="ideditpro" form="formtrxid">
  			<label for="exampleInputEmail1">Nama Produk</label>
  			<input type="text" class="form-control" name="nampro" id="nampro" readonly/>
  		</div>
  		<div class="form-group">
  			<label for="exampleInputEmail1">Harga</label>
  			<input type="text" class="form-control" name="harpro" id="harpro" readonly/>
  		</div>
  		<div class="form-group">
  			<label for="exampleInputEmail1">Quantitas</label>
  			<input type="text" class="form-control" name="qtypro" id="qtypro" onClick="this.value='';" form="formtrxid" />
  		</div>
		<div class="col-md-12" id="verifikasi">
		<center><h3>Membutuhkan Verifikasi!</h3></center>
		<div class="col-md-5">
		<label for="exampleInputEmail1">Supervisor ID</label>
	    <input type="text" class="form-control" name="supid" id="supid" form="formtrxid" />
		</div>
		<div class="col-md-5">
		<label for="exampleInputEmail1">Password</label>
		<input type="password" class="form-control" name="suppass" form="formtrxid" />
		</div>
		<div class="col-md-2"><br/>
		<button type="submit" name="submit" class="btn btn-sm btn-info" id="verifikasihapitem" value="deltrxitem" form="formtrxid"><i class="fa fa-check-circle-o">
		</i> Verifikasi</button>
		
		</div>
		<hr/>
		</div>
  		
  		<button type="submit" name="submit" class="btn btn-sm btn-success" id="simpaneditpjl" value="edittrxitem" form="formtrxid"><i class="fa fa-save">
		</i> Simpan</button>
		<button type="submit" name="submit" class="btn  btn-sm btn-danger" id="hapustrxitem">Batal Transaksi Item</button>

  	</div>
	</div>
	</div>
	</div>
  	<!-- end form edit -->			
  	
	
	
	
	<script>
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


