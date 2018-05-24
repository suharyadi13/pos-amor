<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h3>
			<?php echo $title; ?>
		</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-dashboard"></i> Edit</a></li>
			<li><a href="<?php echo base_url(); ?>admin/perusahaan"> <?php echo $title; ?></a></li>
			<li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
          -->
      </ol>
  </section>
  
  <?php 
  $idproyek = $this->input->get('idproyek');
  $trxDate = date('d-m-Y'); ?>

  <!-- Main content -->
  <section class="content">
  	<div class="box box-info">
  		<div class="box-header with-border">
  		</div>
  		<div class="box-body">
  			
  			
  			
  			<!-- form start -->
  			<?php $attribute = Array ("id" => "formtrxid");?>
  			<?php echo form_open('admin/addtpj_memberdetailproyek/?nofak='.$trxid.'&idproyek='.$idproyek.'&tgltrx='.$trxDate.'',$attribute); ?>
  			<div class="col-md-2">
  				<div class="form-group">
  					<input type="hidden" name="nofak" value="<?php echo $trxid;?>">
  					<b>No Faktur :</b>
  					<input type="text" class="form-control" name="nofak" value="<?php echo $trxid;?>" readonly>
  				</div>
  			</div>
  			<div class="col-md-2">
  				<div class="form-group">
  					<p>Tanggal : <input class="form-control" type="text" name="tgltrx" value="<?php echo $trxDate; ?>"  readonly/></p>
  				</div>
  			</div>
  			
  			
  			<div class="col-md-12" id="warningstok">
  				<H4 style="color:red;"><B><i class="fa fa-warning"></i> KUANTITAS BARANG MELEBIHI STOK DI GUDANG !!</B></H4>
  			</div>
  			
  			<div class="col-md-12">
  				<div class="col-md-6">
  					<div class="form-group has-warning">
  						<input type="hidden" class="form-control" name="kdproduk" id="kdproduk" />
  						Kode Produk - Nama Produk :
  						<input type="text" class="form-control" name="kodeproduk" id="kodebarang" value="-" onClick="this.value='';" autofocus />
  					</div>
  				</div>
  				<div class="col-md-2">
  					<div class="form-group">
  						<p>Stok di gudang : <input class="form-control" type="text" name="stokproduk" id="stokproduk"  readonly/></p>
  					</div>
  				</div>
  				<div class="col-md-2">
  					<div class="form-group has-warning">
  						QTY :
  						<input type="text" class="form-control" name="qty" id="qty" value="1" onClick="this.value='';"/>
  					</div>
  				</div>
  				
  				<div class="col-md-2">
  					<div class="form-group has-warning"><br/>
  						<button type="submit" name="submit" class="btn btn-success" value="tambah" id="submittambahproduk">
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
  									<th>Nama Produk</th>
  									<th>Satuan</th>
  									<th>Qty</th>
  									<th>Bonus</th>
  									<th>Harga </th>
  									<th>Disc/Pot</th>
  									<th>Sub Total</th>
  									<th>Aksi</th>
  								</thead>
  								<tbody>
  									<?php  
  									$no = 1;
  									$total=0;
  									foreach ($detail as $r):
  										
  										?>
  									<tr class="gradeU">
  										<td><?php echo $no++ ?></td>
  										<td><?php echo $r->productBarcode ?></td>
  										<td><?php echo $r->productName ?></td>
  										<td><input type="text" class="form-control" name="satuan" value="<?php echo $r->satuanName ?>" readonly /></td>
  										<td><?php echo $r->detailQty ?></td>
  										<td><?php echo $r->detailbonus ?></td>
  										<td><input type="text" class="form-control" name="harga" value=" <?php echo number_format($r->detailPrice) ?>" readonly /></td>
  										<?php
  										if($r->productDiscounttype=="1")
  										{
  											?>
  											<td><b><?php echo $r->discPercent ?> %</b></td>
  											<?php } 
  											else if($r->productDiscounttype=="2")
  											{
  												?>
  												<td>- <b>Rp. <?php echo number_format($r->discPercent) ?></b></td>
  												<?php } 
  												else
  													{?>
  												<td></td>
  												<?php } ?>
  												
  												<td><input type="text" class="form-control" name="subtotal" value=" <?php echo number_format($r->detailSubtotal) ?>" readonly /></td>
  												<td>
  													<div class="btn-group" role="group">
  														<a href="#" class="btnShow btn btn-info btn-sm" id="btnShow" ideditpro="<?php echo $r->detailID ?>"nampro="<?php echo $r->productName; ?>" harpro="<?php echo $r->detailPrice; ?>" qtypro="<?php echo $r->detailQty; ?>" bonus="<?php echo $r->detailbonus; ?>" nofakedit="<?php echo $trxid;?>" productbarcode="<?php echo $r->productBarcode ?>"><i class="fa fa-edit"></i> Edit</a>
  														<input type="hidden" name="qtyremove" id="qtyremove">
  														<a href="<?php echo base_url(); ?>admin/hapus_trxpjpry?idtrxpj=<?php echo $r->detailID ?>&productBarcode=<?php echo $r->productBarcode; ?>&qtyremove=<?php echo $r->detailQty ?>&nofak=<?php echo $trxid;?>&idproyek=<?php echo $idproyek;?>&tgltrx=<?php echo $trxDate; ?>" onclick="javascript: return confirm('Anda akan menghapus item : <?php echo $r->productName; ?> ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
  													</div>
  												</td>
  											</tr>
  											<?php 
  											$total=$total+$r->detailSubtotal; ?>
  										<?php endforeach ?>
  										<tr class="gradeA">
  											<div class="col-md-2">
  												<div class="form-groupb has-warningb">
  													<b>TOTAL ITEM</b><input type="text" class="form-control" name="total_item" value="<?php echo number_format($total, 0, '.', ',');?>" id="total_item"  readonly/>
  												</div>
  											</div>
  											<div class="col-md-2">
  												<div class="form-groupb has-warningb">
  													<b>PPN</b><input type="text" class="form-control" name="ppn" value="<?php $ppn = $total*0.1; echo number_format($ppn , 0, '.', ',');?>" id="ppn"  readonly/>
  												</div>
  											</div>
  											<div class="col-md-2">
  												<div class="form-groupb has-warningb">
  													<b>TOTAL HARGA</b><input type="text" class="form-control" name="total" value="<?php $total_harga = $total + $ppn; echo number_format($total_harga, 0, '.', ',');?>" id="total"  readonly/>
  												</div>
  											</div>
  											<div class="col-md-2">
  												<div class="form-groupb has-warningb">
  													<b>TOTAL BAYAR</b><input type="text" class="form-control" name="bayar" id="bayar" value="0" onClick="this.value='';" />
  												</div>
  											</div>
  											<div class="col-md-2">
  												<div class="form-groupb has-warningb">
  													<b>KEMBALI/SISA </b><input type="text" class="form-control" name="kembali" id="kembali" readonly />
  												</div>
  											</div>
  											
  											
  										</td>
  									</tr>
  									
  								</tbody>
  							</table>
  							
  							
  						</div><!-- /.box-body -->
  					</div>
  				</div>
  			</div><!-- /.box -->
  			
  			<div class="box box-info">
  				
  				<div class="nav-tabs-custom">
  					<ul class="nav nav-tabs">
  						<li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Data Proyek Dan Pengiriman</a></li>
  						<li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Data Penggunaan Bahan</a></li>
  						
  						
  					</ul>
  					<div class="tab-content">
  						<div class="tab-pane" id="tab_1">
  							
  							 <?php $this->load->view('admin/master/penjualan/use_matter'); ?>
  							
  							
  						</div><!-- /.tab-pane -->
  						<div class="tab-pane active" id="tab_2">
  							
  							<?php  
  							foreach ($proyek as $data):
  								?>
  							<div class="col-md-4">
  								<div class="form-group">
  									No PO :
  									<input type="text" class="form-control" name="nopo"/>
  								</div>
  								<div class="form-group">
  									Tujuan Pengiriman :
  									<input type="text"  class="form-control" name="namamember" value="<?php echo $data->proyekFullName; ?>" />
  								</div>
  								<div class="form-group">
  									Alamat Pengiriman :
  									<input type="text" class="form-control" name="alamatkirim" value="<?php echo $data->proyekAddress; ?>" />
  								</div>
  								<div class="form-group">
  									No telp Tujuan Pengiriman :
  									<input type="text" class="form-control" name="telpkirim" value="<?php echo $data->proyekPhone; ?>" />
  								</div>
  								
  							</div>
  							<?php 
  							endforeach ?>
  							<div class="col-md-4">
  								<div class="form-group">
  									<div class="col-md-6">
  										Sales :
  										<input type="text" class="form-control" name="salestrp"/>
  									</div>
  									<div class="col-md-6">
  										Driver :
  										<input type="text" class="form-control" name="driver" />
  									</div>
  									
  									<div class="form-group">
  										<br/><br/>
  										Zona :
  										<input type="text" class="form-control" name="zona" value="<?php echo $data->proyekzone; ?>" />
  									</div>
  								</div>
  								<div class="col-md-12">
  									<div class="form-group has-warning">
  										Cara Bayar :
  										<select name="tipebayar" class="form-control" id="tipebayar">
  											<option value="1" >Cash</option>
  											<option value="2" >Termin</option>
  										</select>
  										<div class="col-md-12" id="termindate">
  											<div class="form-group has-warning">
  												Jatuh Tempo :
  												<input type="text" id="terminpjdate" name="terminpjdate" class="form-control">
  											</div>
  										</div>
  									</div>
  								</div>
  								
  							</div>
  							
  							<div class="col-md-4">
  								<div class="form-group">
  									Jenis Kendaraan :
  									<input type="text" class="form-control" name="jeniskend"/><br/>
  									No Polisi :
  									<input type="text" class="form-control" name="nopol" /><br/>
  									
  									<div class="col-md-12" id="bankmet">
  										<div class="form-group has-warning">
  											Jenis Pembayaran :
  											<select name="banktipe" class="form-control" id="tipebank">
  												<option value="tunai" >Tunai</option>
  												<option value="debit" >Kartu Debit</option>
  												<option value="kredit" >Kartu Kredit</option>
  												<option value="giro" >Giro</option>
  											</select>
  											<div class="col-md-12" id="banktipe">
  												Nomor :
  												<input type="text"  name="bankno" class="form-control">
  											</div>
  										</div>
  									</div>
  								</div>
  								
  							</div>
  							
  							
  						</div><!-- /.tab-pane -->
  					</div><!-- /.tab-content -->
  				</div>
  				
  				
  				
  				
  				
  				
  				<div class="col-md-12">
  					<div class="col-md-1">
  						<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $trxid;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $trxid; ?> ?')" class="btn btn-warning btn-sm"><i class="fa fa-arrow-circle-left"></i> Batal</a>

  						

  					</div>
  					<div class="col-md-2">
  						<button type="submit" name="submit" class="btn btn-success" value="selesaitrx">
  							<i class="fa fa-save"></i> Simpan</button>
  						</div>
  					</div>
  					<?php echo form_close(); ?>
  					<div class="box-body">
  						
  					</div><!-- /.box-body -->
  				</div><!-- /.box -->
  			</section><!-- /.content -->
  			
  			<!-- form edit -->
  			<div id="dialog" style="display: none" align = "center">
  				<!-- form start -->
  				<?php echo form_open('admin/addtpj_memberdetailproyek/?nofak='.$trxid.'&idproyek='.$idproyek.'&tgltrx='.$trxDate.''); ?>
  				<div class="form-group">
  					<input type="hidden" name="productbarcode" id="productbarcode">
  					<input type="hidden" name="nofak" value="<?php echo $trxid;?>">
  					<input type="hidden" name="editproyekid" value="<?php echo $idproyek;?>">
  					<input type="hidden" name="ideditpro" id="ideditpro">
  					<label for="exampleInputEmail1">Nama Produk</label>
  					<input type="text" class="form-control" name="nampro" id="nampro" disabled/>
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Harga</label>
  					<input type="text" class="form-control" name="harpro" id="harpro" disabled/>
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Quantitas</label>
  					<input type="text" class="form-control" name="qtypro" id="qtypro"  />
  				</div>
  				<div class="form-group">
  					<label for="exampleInputEmail1">Bonus</label>
  					<input type="text" class="form-control" name="bonus" id="bonus" />
  				</div>
  				
  				
  				
  				<button type="submit" name="submit" class="btn btn-success" id="simpaneditpjl" value="edittrx"><i class="fa fa-save"></i> Simpan</button>
  				
  				<?php echo form_close(); ?>
  			</div>
  			<!-- end form edit -->			
  			
  			
  			<script>
  				
  			</script>
  		</div>
  		
