<html>
<head>
<style>
table.table-bordered.dataTable {
    border-collapse: separate !important;
}
.box-body > .table {
    margin-bottom: 0;
	font-size:11px;
	
}
table.dataTable {
    clear: both;
    margin-top: 6px !important;
    margin-bottom: 6px !important;
    max-width: none !important;
}
.table-bordered {
    border: 1px solid #f4f4f4;
}
.table-bordered {
    border: 1px solid #ddd;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
</style>
</head>
<body>
 <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
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
				<div class="col-md-4">
				  <?php  
                foreach ($perusahaan as $perusahaan):
                ?>
                <h4><b><?php echo $perusahaan->identityName; ?></b></h4><br/>
				<p><?php echo $perusahaan->identityAddress; ?></p>
				<p>T : <?php echo $perusahaan->identityPhone; ?></p>
				<p>E : <?php echo $perusahaan->identityEmail; ?></p>
			
				<?php  endforeach ?>
				</div>
				<div class="col-md-12">
				<hr/>
				<h4><b>FAKTUR PENJUALAN</b></h4>
				<br/>
				<table >
                      <tr>
					  <td>Nomor</td><td width="450px"><b><?php echo $nofak; ?> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tgltrx; ?></td>
					  <?php if($termin=="")
					  {
						?>
					
						<td>CASH</td><td>-</td>
					<?php
					 }
					  else
					  {
					  ?>
					  <td>Tempo</td><td><?php echo $termin; ?></td>
					  <?php }
					  ?>
					  </tr>
					  <tr>
					  <td>Pelanggan</td><td width="60%"><b><?php echo $member; ?></b></td><td>Sales</td><td><?php echo $sales; ?></td>
					  </tr>
						
                  </table>
				</div>
				
				<br/>
                  <table class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th width="300px" align="left">Nama Barang</th>
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
							<td><?php echo $lihat->detailbonus; ?></td>
							<td><?php echo $lihat->satuanName; ?></td>
							<?php
												  if($lihat->productDiscounttype=="1")
												  {
												  ?>
												<td><?php echo $lihat->discPercent ?> %<b> (diskon)</b></td>
												  <?php } 
												  else if($lihat->productDiscounttype=="2")
												  {
												  ?>
												<td>Rp. <?php echo number_format($lihat->discPercent) ?>
												<b style="color:#241CC3;background:#FEFF9C;padding:3px;border:solid thin #CACC36;">(Potongan)</b></td>
												  <?php } 
												  else
												  {?>
													<td></td>
												  <?php } ?>
							<td><?php echo number_format($lihat->detailSubtotal); ?></td>
                    	</tr>
						<?php endforeach; ?>
						
                    </tbody>
						<tr>
						<td colspan="5"></td>
						<td><b>TOTAL HARGA</b></td>
						<td><b><?php echo $total;?></b></td>
						</tr>
                    	
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section>
		</body>
		</html>