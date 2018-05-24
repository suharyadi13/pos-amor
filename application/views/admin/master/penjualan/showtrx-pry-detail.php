 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
          Detail Transaksi dengan No Faktur : <?php echo $nofak; ?>
          </h4>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          	<div class="row">          	
          	<div class="col-xs-12">
			<a href="<?php echo base_url(); ?>admin/showtrxpjpryk" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-backward"></i> Kembali</a>
			<a href="<?php echo base_url(); ?>admin/updatetpj_pry_koreksi?invoiceID=<?php echo $nofak ?>" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-wrench"></i> Koreksi</a>
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
				  
                  </h3>
                  <div class="box-tools">
                  	<!--
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    -->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
					   
                 <div class="nav-tabs-custom">
  					<ul class="nav nav-tabs">
  						<li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Data Pembelian</a></li>
  						<li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Data Penggunaan Bahan</a></li>
  						
  						
  					</ul>
  					<div class="tab-content">
  						<div class="tab-pane" id="tab_1">
  							
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
					</thead>
					<tbody>

						<?php $i = 0;
						$total=0;
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
								<td><?= @number_format($key->bahanBuyPrice) ?></td>
								<td><?= @number_format($key->detailPrice) ?></td>
							</tr>
							<?php
							$total=$total+$key->detailPrice;
							} 
							
							?>
						</tbody>
						<tr>
						<td colspan="5"></td><td><b>TOTAL</b></td><td width=200><input  type="text" class="form-control" name="totharga" value="<?php echo @number_format($total);?>" style="font-weight:bold; font-size:1.3em;" readonly></td>
						</tr>
					</table>
  													
  							
  						</div><!-- /.tab-pane -->
  						<div class="tab-pane active" id="tab_2">
  							
  							 <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<th width="30%">Nama Barang</th>
                        <th>Harga</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Satuan</th>
						<th>Diskon</th>
						<th>Jumlah</th>
                    </thead>
                    <tbody>
                      	<?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $lihat->productName; ?></td>
							<td><?php echo number_format($lihat->detailPrice); ?></td>
							<td><?php echo $lihat->detailQty; ?></td>
							<td><?php echo @$lihat->detailbonus; ?></td>
							<td><?php echo $lihat->satuanName; ?></td>
							<input type="hidden" name="diskontype" value="<?php echo $lihat->productDiscounttype;?>">
							<input type="hidden" name="diskonpercent" value="<?php echo $lihat->discPercent;?>">
							<?php
												  if($lihat->productDiscounttype=="1")
												  {
												  ?>
												<td><?php echo $lihat->discPercent ?> %<b> </b></td>
												  <?php } 
												  else if($lihat->productDiscounttype=="2")
												  {
												  ?>
												<td>- Rp. <?php echo number_format($lihat->discPercent) ?>
												</td>
												  <?php } 
												  else
												  {?>
													<td></td>
												  <?php } ?>
							<td><?php echo @number_format($lihat->detailSubtotal); ?></td>
                    	</tr>
						<?php endforeach; ?>
						
                    </tbody>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<?php  
                        foreach ($trx as $lihat):
                        ?>
						<td colspan="2"><b>TOTAL HARGA</b></td>
						<td width=200><input  type="text" class="form-control" name="totharga" value="<?php echo @number_format($lihat->trxTotal);?>" style="font-weight:bold; font-size:1.3em;" disabled></td>
						</tr>
						<?php if(($lihat->trxTotal)<($total))
						{
							?>
							<tr><i style="color:red;font-weight:bolder;"><i class="fa fa-fw fa-warning"></i>Biaya Penggunaan Bahan Melebihi Penjualan</i></tr>
						<?php } else {?>
						<tr></tr>
						<?php } ?>
			
                    	<?php endforeach; ?>
                  </table>
  							
  							
  						</div><!-- /.tab-pane -->
  					</div><!-- /.tab-content -->
  				</div>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        
		
		 <?php echo form_close(); ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
