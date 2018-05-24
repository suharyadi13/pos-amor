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

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header tr,td { border: none; text-align:left; padding:2px; }

table.sum {
border-collapse: collapse;
border-spacing: 0;
}
table.sum th { border: 1px solid #4f4f4f; text-align:right; padding:2px; }

table.trxapp {
border-spacing: 5;
}
table.trxapp td, th { padding:5px;text-align:center; }

.col-md-12{
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
                <div class="box-body table-responsive no-padding"
				
				<div class="col-md-12">
				<table width="200px" class="header">
				<tr>
					  <td width="120px;"><b><?php echo $idname; ?></b> </td></tr>
					  
					  <tr><td width="120px;"> <?php echo $idaddress; ?>, Telp : <?php echo $idphone; ?></td></td>
					  </tr>
				
				</table>
				</div>
				
				<br/><br/>
                  <table class="sum" width="200px">
                   
                    <tbody>
                      <?php  
                        foreach ($detail as $lihat):
                        ?>
                    	<tr>
							<td align="left"><?php echo $lihat->productName; ?></td>
							<td align="right"><?php echo $lihat->detailQty; ?></td>
							<td align="right"><?php echo number_format($lihat->detailSubtotal); ?></td>
                    	</tr>
						<?php endforeach; ?>
						<tr>
						<td></td>
						<td>Sub Total</td>
						<td><b><?php echo $totharga;?></b></td>
						</tr>
						<tr>
						<td></td>
						<td>PPN(10%)</td>
						<td><b><?php echo ($totharga*10)/100;?></b></td>
						</tr>
						<tr>
						<td></td>
						<td>Total</td>
						<td><b><?php echo $totharga+($totharga*10)/100;?></b></td>
						</tr>
                    </tbody>
                    	
                  </table>
                 <br/><br/>
				  <table class="sum" width="200px">
				 <b>Terima Kasih Atas Kunjungan Anda!</b>
				 <br/>
				 <hr/>
				 <?php echo strtoupper($this->session->userdata('admin_nama'));?>
				 </table>
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
