<div class="col-md-12">
	<div class="col-md-6">
		<div class="form-group has-warning">
			<input type="hidden" class="form-control" name="keybahan" id="keybahan" />
			<input type="hidden" class="form-control" name="bahanBarcode" id="bahanBarcode" />
			<input type="hidden" class="form-control" name="bahanBuyPrice" id="bahanBuyPrice" />
			<input type="hidden" class="form-control" name="nofak" value="<?php echo $trxid;?>">
			<input type="hidden" class="form-control" name="satuanbahan" id="satuanbahan">
			Kode Bahan - Nama Bahan :
			<input type="text" class="form-control" name="idbahan" id="idbahan" value="" onClick="this.value='';" autofocus />
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<p>Stok di gudang : <input class="form-control" type="text" name="stokgudangbahan" id="stokgudangbahan"  readonly/></p>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group has-warning">
			QTY :
			<input type="text" class="form-control" name="qtybahan" id="qtybahan" value="1" onClick="this.value='';"/>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group has-warning"><br/>
			<button type="submit" name="submit" class="btn btn-success" value="tambah_bahan" id="submittambahbahan">
				<i class="fa fa-plus"></i> Tambah</button>
			</div>
		</div>
	</div>

	<div class="col-md-12">

		<div class="box-body table-responsive no-padding">

			<table  class="table table-bordered table-hover dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Kode</th>
						<th>Nama Bahan</th>
						<th>Satuan</th>
						<th>Qty</th>
						<th>Harga </th>
						<th>Sub Total</th>
						<th>Aksi</th>
					</thead>
					<tbody>

						<?php $i = 0;
						foreach ($bahan_proyek as $key) {
							$i++;
 $trxDate = date('d-m-Y');
 $idproyek = $this->input->get('idproyek');
							?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $key->bahanBarcode ?></td>
								<td><?= $key->bahanName ?></td>
								<td><?= $key->bahanSat ?></td>
								<td><?= $key->detailQty ?></td>
								<td><?= $key->bahanBuyPrice ?></td>
								<td><?= $key->detailPrice ?></td>
								<td>
									<a href="<?php echo base_url(); ?>admin/hapus_trxbahan?bahanID=<?php echo $key->bahanID ?>&detailID=<?php echo $key->detailID ?>&nofak=<?php echo $trxid;?>&idproyek=<?= $idproyek;?>&detailQty=<?php echo $key->detailQty;?>&tgltrx=<?php echo $trxDate; ?>" onclick="javascript: return confirm('Anda akan menghapus item : <?php echo $key->bahanName; ?> ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<script type="text/javascript">
				$(function () {
					$("#idbahan").autocomplete({    
						minLength:0,
						delay:0,
						source:'<?php echo site_url('auto/get_bahan'); ?>',   
						select:function(event, ui){
							$('#kodebahan').val(ui.item.label);
							$('#keybahan').val(ui.item.idbahan);
							$('#satuanbahan').val(ui.item.satuanbahan);
							$('#stokgudangbahan').val(ui.item.stokbahan);
							$('#bahanBarcode').val(ui.item.bahanBarcode);
							$('#bahanBuyPrice').val(ui.item.bahanBuyPrice);
						}
					});
				});
			</script>