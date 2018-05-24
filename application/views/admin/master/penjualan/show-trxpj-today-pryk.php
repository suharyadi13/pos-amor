<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
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
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>No Invoice</th>
						<th>Tgl. Transaksi</th>
						<th>Nama Pelanggan</th>
                        <th>Alamat</th>
						<th>Total Pembelian</th>
						<th>Cara Bayar </th>
						<th>Termin </th>
						<th>Status </th>
						<th>Action </th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->invoiceID; ?></td>
							<td><?php echo $lihat->trxDate; ?></td>
							<td><?php echo $lihat->trxFullName; ?></td>
							<td><?php echo $lihat->trxAddress; ?></td>
							<td><?php echo number_format($lihat->trxTotal); ?></td>
							<td><?php
							if($lihat->trxStatus=="1")
							{
								echo "Cash";
							}
							else
							{
								echo "Termin";
							}
							?>
							</td>
							<td><?php
							if($lihat->trxTerminDate=="0000-00-00")
							{
								echo "-";
							}
							else
							{
								echo $lihat->trxTerminDate;
							}
							?></td>
							<?php if($lihat->isProyek_status=="1")
							{
								$status="<b style='color:blue;'>Aktif</b>";
							}
							else
							{
								$status="<i style='color:green;'>Selesai</i>";
							}
							?>
							<td><?php echo $status; ?></td>
							
							<td>
							<?php if($lihat->isProyek_status=="0")
							{
								?>
								<a href="<?php echo base_url(); ?>admin/updatetpj_pry_finish_detail?invoiceID=<?php echo $lihat->invoiceID; ?>"  class="btn btn-success btn-sm"><i class="fa fa-columns"></i> Detail</a>
							<?php
							}
							else {
								?>
							<a href="<?php echo base_url(); ?>admin/updatetpj_pry?idproyek=<?php echo $lihat->proyekid; ?>&invoiceID=<?php echo $lihat->invoiceID; ?>&tgltrx=<?php echo $lihat->trxDate;; ?>"  class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Tambah</a>
							<a href="<?php echo base_url(); ?>admin/updatetpj_pry_finish?invoiceID=<?php echo $lihat->invoiceID; ?>"  class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Selesai</a>
							<?php } ?>
							</td>
                            		
                    	</tr>
                    	<?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
