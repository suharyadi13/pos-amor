<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <!-- Main content -->
        <section class="content">
          <?php $butstat="";
				$teksstat="";
				if($trxstat==1)
				{
				$butstat="disabled";
				$teksstat="<h3 class='no-margins font-bold text-warning'>Anda Sudah Menutup Transaksi Hari ini</h3>";
				}
				else
				{
				$butstat="";
				}

		  ?>
        
				
          <div class="row">
		   <div class="col-md-12">
		   
		  <div class="col-md-4">
				  <?php echo form_open('4d111-t1272/?__fn='.$this->encryption->encode($trxid).''); ?>
					<div class="box box-solid bg-light-blue-gradient">
                <div class="info-box-content">
				  <?php if ($this->session->userdata('gender')=="2") { ?>
				  <img src="<?php echo base_url(); ?>assets/img/cas.png">
				  <?php } else { ?>
				   <img src="<?php echo base_url(); ?>assets/img/cas2.png">
				    <?php } ?>
				<button type="button" class="btn btn-block btn-outline btn-default"><h3 class="no-margins font-extra-bold text-success"><?php echo strtoupper($this->session->userdata('admin_nama'));?></h3></button>
                  <span class="progress-description">
				  <center>
				  <button class="btn btn-outline btn-success" type="submit" name="submit"  value="newtrx" id="newtrx" <?php echo $butstat; ?> autofocus>PELANGGAN SELANJUTNYA >></button><br/>
				  <?php echo $teksstat; ?>
                  </center>
				  </span>
                </div><!-- /.info-box-content -->
              </div>
			  <?php echo form_close(); ?>
				</div>
			
			<div class="col-md-8">
			<div class="col-lg-4">
                <div class="hpanel">
                    <div class="panel-body text-center h-200">
                        <i class="pe-7s-graph1 fa-4x"></i>
						<br/>
                        <h3 class="no-margins font-extra-bold text-success">RP. <?php foreach($total as $data): 
						echo number_format($data->total); 
						endforeach ?> </h3>

                    </div>
                    <div class="panel-footer">
                        <b class="no-margins font-extra-bold text-success">TOTAL PENJUALAN ANDA</b>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-icon pull-right">
                            <i class="pe-7s-share fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                             <h1 class="no-margins font-extra-bold text-warning"><?php echo $trxuser_tot; ?></h1>
                 
                        </div>
                    </div>
                    <div class="panel-footer">
                        <b class="no-margins font-extra-bold text-warning"> TOTAL PELANGGAN DILAYANI</b>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-4">
                <div class="hpanel stats">
                    <div class="panel-body h-200">
                        <div class="stats-icon pull-right">
                            <i class="pe-7s-monitor fa-4x"></i>
                        </div>
                        <div class="m-t-xl">
                             <h1 class="no-margins font-extra-bold text-info"><?php foreach($trx_tot_prod as $data): 
						echo number_format($data->totalqty); 
						endforeach ?> </h1>
                  
                        </div>
                    </div>
                    <div class="panel-footer">
                        <b class="no-margins font-extra-bold text-info">TOTAL PRODUK TERJUAL</b>
                    </div>
                </div>
            </div>
			
			
				<div class="col-lg-4">
                <div class="hpanel stats">
                    <div class="panel-body h-100">
                        <div class="m-t-xl">
                            <h1 class="no-margins font-extra-bold text-danger"><?php echo $trxtoday_tot; ?></h1>
                  
                        </div>
                    </div>
                    <div class="panel-footer">
                        <b class="no-margins font-extra-bold text-danger">PELANGGAN HARI INI</b>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-8">
               
		   <div class="hpanel panel-collapse">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div><CENTER>
                 <h4 class="text-warning">Anda Memiliki <b><?php echo $trxunclose_tot; ?></b> Transaksi Yang Belum Selesai</h4>
						</CENTER>
            </div>
            <div class="panel-body">
			<table class="table table-striped">
		<thead>
			<tr>
				<th><h4><p class="text-success">No</h4></th>
				<th><h4><p class="text-success">Invoice</h4></th>
				<th><h4><p class="text-success">Aksi</h4></th>
			</thead>
			<tbody>
				<?php  
				foreach ($detailunclose as $r):
					
					?>
				<tr class="gradeU">
					<td></td>
					<td><?php echo $r->invoiceID; ?></td>
					<td>
					<a href="<?php echo base_url(); ?>admin/addtpj_nonmemberdetail?120vac=<?php echo $this->encryption->encode($r->invoiceID);?>" onclick="javascript: return confirm('Anda akan meneruskan transaksi dengan nomor faktur : <?php echo $r->invoiceID; ?> ?')" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
					<a href="<?php echo base_url(); ?>admin/batal_trxpj?nofak=<?php echo $r->invoiceID;?>" onclick="javascript: return confirm('Anda akan membatalkan transaksi dengan nomor faktur : <?php echo $r->invoiceID; ?> ?')" class="btn btn-danger btn-circle"><i class="fa fa-arrow-circle-left"></i></a>
					</td>
					<?php endforeach ?>
			</tbody>
		</table>
            </div>
        </div>
            </div>
			
			
			
			<div class="col-lg-12">
        <div class="hpanel hyellow">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div><CENTER>
                 <h4 class="font-extra-bold no-margins text-success">
                           TOMBOL PINTAS
                        </h4>
						</CENTER>
            </div>
            <div class="panel-body">
			<div class="col-lg-3">
			<a href="<?php echo base_url(); ?>4d111-t127212" class="btn btn-success">DETAIL PENJUALAN</a>
			</div>
			<div class="col-lg-3">
			<a href="<?php echo base_url(); ?>4d111-t127213" class="btn btn-info">DAFTAR PRODUK</a>
			</div>
			<div class="col-lg-3">
			<?php
			if($trxstat<>1)
				{
				echo "Silahkan Tutup Kasir untuk input jumlah real";
				}
				else {
					if($trxTotalRealStat<>1) {
				?>
			<a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#totaltrxmod" id="btnShowtotaltrxmod" trxid=<?php echo $trxidclose; ?>>INPUT JUMLAH REAL</a>
					<?php } else { ?>
					<a href="<?php echo base_url(); ?>4d111-t127214" class="btn btn-danger"><i class="fa fa-print"></i> CETAK PENERIMAAN</a>
					<?php
					} ?>
			
			<?php }
			?>
			</div>
            <div class="col-lg-3">
			<?php
			if($trxstat<>1)
				{
					?>
			<a href="<?php echo base_url(); ?>admin/close_trx" onclick="javascript: return confirm('Anda akan menutup transaksi hari ini ?')" class="btn btn-warning">TUTUP KASIR</a>
				<?php } else { echo "<h3>KASIR TUTUP</h3>"; }
			?>
			</div>
			
            </div>
        </div>
    </div>
			
			</div>
		
		  </div>
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  
	  <!-- form start -->
	<?php $attribute = Array ("id" => "formtrxreal");?>
	<?php echo form_open('4d111-t127211',$attribute);?>
	
	<div class="modal fade" id="totaltrxmod" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="color-line"></div><br/>
			<center><h4 class="no-margins font-bold text-info">MASUKAN JUMLAH REAL TRANSAKSI</h4></center>
			<div class="modal-body">
			<input type="hidden" class="form-control" name="trxidclose" id="trxidclose" form="formtrxreal"/>
			<b>TOTAL</b>
		<input form="formtrxreal" type="text" class="form-control" name="totalreal" style="background-color:#0a0a0a;color:#fff;font-size:25px;font-weight:bold;"/>
			</div>
			<div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-success" value="selesaitrx" id="bayartrx" form="formtrxreal">
			<i class="fa fa-save"></i> SIMPAN</button> 
			</div>
		</div>
	</div>
	</div>
	<!-- end form edit -->	
