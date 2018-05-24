
	<!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">
	<?php $trxDate = date('d-m-Y'); ?>

	<!-- form start -->
	<?php $attribute = Array ("id" => "formtrxid");?>
	<?php echo form_open('4d111-t1272/?__fn='.$this->encryption->encode($trxid).'&tgltrx='.$this->encryption->encode($trxDate).'',$attribute); ?>
	<!-- Main content -->
	<section class="content">
	<!-- left POS content-->
	<div class="col-md-8">

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
	<div class="col-md-12" style="height:450px;overflow:auto;">
	<!--tab-->
	<div class="tabs-left">
            <ul class="nav nav-tabs">
			 <?php 
					foreach ($cat as $cat):
				?>
                <li class=""><a data-toggle="tab" href="<?php echo $cat->categoryID; ?>" aria-expanded="false"> <button type="button" class="btn btn-outline btn-success"><?php echo $cat->categoryName; ?></button></a></li>
             <?php endforeach ?>
			 </ul>
            <div class="tab-content ">
                <div id="tab-6" class="tab-pane active">
                    <div class="panel-body">
                       <?php 
	foreach ($prodamor as $prodamor):
	?>
	<div class="col-lg-4">
	<a href="<?php echo base_url(); ?>4d111-t127/?__fn=<?php echo $this->encryption->encode($trxid); ?>&__k_po=<?php echo $this->encryption->encode($prodamor->productBarcode); ?>&_t_l_x=<?php echo $this->encryption->encode($trxDate); ?>">

	<div class="hpanel plan-box">
	<?php
	$prodimage="";
	if(($prodamor->productImg=="")||($prodamor->productImg==null))
	{
		$prodimage="cake.png";
	}
	
	else
	{
		$prodimage=$prodamor->productImg;
	}
	?>
	<img src="<?php echo base_url(); ?>assets/prod_img/<?php echo $prodimage; ?>" width="100%">

	<h4 class="list-group-item-heading">
	   <?php echo limit_words($prodamor->productName,2); ?>
	</h4>
	</div>
	</a>
	<!-- small box -->
	</div>

	<?php endforeach ?>

                    </div>
                </div>
                <div id="tab-7" class="tab-pane">
                    <div class="panel-body">
                     Kategori Snack  
					</div>
                </div>
            </div>

    </div>
	<!-- akhir tab -->
	
	</div>
	</div>	
	</div>
	</div>
	<!-- left POS content-->

	<!-- right POS content-->
	<div class="col-md-4">
	<div class="hpanel">
	<div class="panel-body list">
	<div class="col-md-12" style="height:450px;overflow:auto;">
	<table class="table table-striped">
		<thead>
			<tr>
				<th width=600><p class="text-success">ITEM</h4></th>
				<th width=5><h4 class="font-extra-bold no-margins text-success"></h4></th>
				<th width=250><p class="text-success">SUB TOTAL</h4></th>
			</thead>
			<tbody>
				<?php  
				$no = 1;
				$total=0;
				foreach ($detail as $r):
					
					?>
				<tr class="gradeU">
					<td>
					<h5><?php echo $r->productName; ?></h5>
					</i>
					</b>
					
					</td><input type="hidden" class="form-control" name="harga" value=" <?php echo number_format($r->detailPrice) ?>" readonly />
					<td><b><?php echo $r->detailQty ?></b></td>
					
					<td><input type="text" class="form-control" name="subtotal" value=" <?php echo number_format($r->detailSubtotal) ?>" readonly /></td>
					<input type="hidden" name="qtyremove" id="qtyremove">
						</tr>
						<?php 
						$total=$total+$r->detailSubtotal; ?>
					<?php endforeach ?>
			</tbody>
		</table>
		
	</div>
	<div class="col-md-12" style="height:100px;overflow:auto;">
		<table border="0">
		<tr>
		<td><b>TOTAL</b>
		<input type="text" class="form-control" name="total" value="<?php $total_harga = $total; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly style="background-color:#0a0a0a;color:#fff;font-size:17px;font-weight:bold;"/>
		</td>
		<td width="80"><br/>
		<a href="#"  class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal" id="btnShow">
														<i class="fa fa-money"></i>
														</a>
		</td>
		<td><br/>
		<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-danger btn-circle"><i class="fa fa-arrow-circle-left"></i></a>
		</td>
		</tr>
		</table>
		</div>
	<!-- right POS content-->
	</div><!-- /.box-body -->
	</div>
	</div>

	<div class="box-body">

	</div><!-- /.box-body -->
	</div><!-- /.box -->
	</section><!-- /.content -->

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
			<select name="banktipe" class="form-control" id="tipebank">
				<option value="tunai" >Tunai</option>
				<option value="debit" > K. Debit</option>
				<option value="kredit" >K. Kredit</option>
			</select>
		</td>
		</tr>
		
		<tr>
		<td colspan="4">
		<div class="col-md-12" id="banktipe">
		Nomor : <input type="text"  name="bankno" class="form-control"> Bank : <select name="banktipe" class="form-control" id="tipebank">
				<option value="tunai" >Tunai</option>
				<option value="debit" > K. Debit</option>
				<option value="kredit" >K. Kredit</option>
			</select>	</div>
			</td>
		</tr>
		</table>
	</div>
			<div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-success" value="selesaitrx" id="bayartrx" form="formtrxid">
			<i class="fa fa-save"></i> Bayar</button>
				<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-danger btn-sm"><i class="fa fa-arrow-circle-left"></i> Batal</a>		
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      <button type="submit" name="submit" class="btn btn-primary" id="simpaneditpjl" value="edittrx">Simpan</button>
                              
			</div>
		</div>
	</div>
	</div>
	<!-- end form edit -->			

	</div>