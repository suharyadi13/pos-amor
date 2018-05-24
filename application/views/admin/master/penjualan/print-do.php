<!-- Content Wrapper. Contains page content -->
<style>
.content-wrapper
{
	font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
	font-size:11px;
}
p {
	line-height:1;
}

table.sum {
border-collapse: collapse;
border-spacing: 0;
}
table.sum td, th { border: 1px solid #4f4f4f; text-align:left; padding:5px; }

table.trxapp {
border-spacing: 10;
}
table.trxapp td, th { padding:5px;text-align:center; }

.col-md-12{
	border-top:1px solid black;
}
</style>     
	 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         
          <ol class="breadcrumb">
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
				  
                  </h3>
                  <div class="box-tools">
                  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
				<div class="col-md-4">
				
                <h4 style="font-size:1.6em"><b><?php echo $idname; ?></b></h4>
				<p style="width:350px"><?php echo $idaddress; ?><br/>
				 T : <?php echo $idphone; ?><br/>
				 E : <?php echo $idmail; ?>
				</p>
				</div>
				<div class="col-md-12">
				<center><h4 style="font-size:1.6em"><b>SURAT JALAN</b></h4><br/><br/>
				<?php echo $nofak; ?> </center><br/>
				
				<p>YTH Bag. Pembelian<br/>
				<?php echo $trxfullname; ?><br/>
				<?php echo $trxaddres; ?>
				
				</div>
				<table width="40%">
				<tr><td width="40px" >Kendaraan </td><td>:</td><td align="left"><?php echo $trxcartype; ?></td></tr>
				<tr><td>No Kendaraan </td><td>:</td><td><?php echo $trxcarno; ?></td></tr>
				<tr><td>Sales </td><td>:</td><td><?php echo $sales; ?></td></tr>
				<br/><br/>
				</table>
				  Harap diterima barang – barang seperti tersebut di bawah ini :
                  <table class="sum" width="100%">
                    <thead>
                      <tr>
						<th width="300px" align="left">Nama Barang</th>
						<th align="left">Qty</th>
						<th align="left">Keterangan</th>
                    </thead>
                    <tbody>
                      <?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $lihat->productName; ?></td>
							<td><?php echo $lihat->detailQty; ?></td>
							<td></td>
                    	</tr>
						<?php endforeach; ?>
                    </tbody>
						
                    	
                  </table>
                  <br/><br/>
				  <table border="0" width="100%" valign="top" class="trxapp">
				  <tr>
				  <td width="200px">Penerima, </td><td></td><td ></td><td></td><td width="200px">Pengirim,</td>
                      <tr >
					  <td height="50" valign="bottom"><?php echo $trxfullname;?></td><td></td><td ></td><td ></td>
					  <td height="50" valign="bottom"><?php echo $idname;?></td>
					  </tr>
					  <tr>
					  <td style="border-top:solid black thin;" width="200px">Bag. Pembelian</td><td></td>
					  <td></td><td></td>
					  <td width="200px" style="border-top:solid black thin;">Bag. Penjualan</td>
					 </tr>
					 </table>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
