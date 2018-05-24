<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <!-- Main content -->
        <section class="content">
          <div class="row">
		   <div class="col-md-12">
			  <div class="col-md-4">
					<div class="box box-solid bg-light-blue-gradient">
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="progress-description">
				  <center>
				  <a href="<?php echo base_url(); ?>4d111/" class="btn btn-outline btn-warning">HALAMAN UTAMA</a>
				 </center>
				  </span>
				  <br/>
				  <div class="color-line"></div>
				  <div class="col-lg-12">
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
				  
				  
                </div><!-- /.info-box-content -->
              </div>
				</div>
			
			
			
	    <div class="col-lg-8">
		<div class="col-lg-12">
			<br/>
        <div class="hpanel hyellow">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>	
				
				<CENTER>
                 <h4 class="font-extra-bold no-margins text-success">
                         DAFTAR TRANSAKSI
                        </h4>
						</CENTER>
						
            </div>
            <div class="panel-body">
			<br/>
				
						<!-- hari ini -->
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>No Invoice</th>
						<th>Tgl. Transaksi</th>
						<th>Total Penjualan</th>
						<th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($totalrx_user as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->invoiceID; ?></td>
							<td><?php echo $lihat->trxDate; ?></td>
							<td><?php echo number_format($lihat->trxTotal); ?></td>
							<td></td>		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table><!-- /.box-body -->
						<!-- end hari ini -->
						
            </div>
        </div>
    </div>
	
	

	</div>
			
			</div>
		
		  </div>
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  