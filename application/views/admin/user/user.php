<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title; ?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Master User</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          	<div class="row">          	
          	<div class="col-xs-12">
          		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  	<a href="<?php echo base_url(); ?>admin/tambah_user" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No. </th>
                        <th>Nama Pegawai</th>
						<th>NIP</th>
						<th>Telp</th>
						<th>Level</th>
						<th>Aktifasi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                      	<?php  
                        $no = 1;
						$level="";
                        foreach ($data_user as $lihat):
                        ?>
                    	<tr>
							<td><?php echo $no++ ?></td>
                    		<td><?php echo $lihat->nama_lengkap; ?></td>
							<td><?php echo $lihat->nip; ?></td>
							<td><?php echo $lihat->hp; ?></td>
							<?php if($lihat->level_user=='1')
							{
								$level="Administrator Pusat";
							}
							else if($lihat->level_user=='2')
							{
								$level="Penanggung Jawab Pusat";
							}
							else if($lihat->level_user=='3')
							{
								$level="Staf Produksi";
							}
							else if($lihat->level_user=='4')
							{
								$level="Staf Pembelian";
							}
							else if ($lihat->level_user=='5')
							{
								$level="Staf Penjualan";
							}
							else if($lihat->level_user=='6')
							{
								$level="Staf Keuangan";
							}
							else if($lihat->level_user=='7')
							{
								$level="Staf HR";
							}
							else if($lihat->level_user=='8')
							{
								$level="Staf Gudang";
							}
							?>
							<td><?php echo $level; ?></td>
							<td><?php
							$status="";
							if($lihat->nipp<>""){
							if($lihat->status=="1")
							{
								$status="Aktif";
								$textaktif="Non Aktifkan";
								$textaktifbutton="success";
								$textaktifbuttonstat="warning";
							}
							else
							{
								$status="Non Aktif";
								$textaktif="Aktifkan";
								$textaktifbutton="warning";
								$textaktifbuttonstat="check";
							}
							
							

							?>
								 <a href="<?php echo base_url(); ?>admin/aktif_user/?nip=<?php echo $lihat->nip ?>&status=<?php echo $lihat->status ?>" class="btn btn-sm btn-<?php echo $textaktifbutton; ?> btn-flat"><i class="fa fa-<?php echo $textaktifbuttonstat; ?>"></i> <?php echo $textaktif; ?></a>
								 <?php 
								}
								
								else 
								 {
									 echo "User Belum diberikan Akses";
								 }
								 ?>
									 
							</td>
							
                        <td align="center"> 
						<div class="btn-group" role="group">
							<?php
							$status="";
							if($lihat->nipp=="")
							{
							?>
							
								 <a href="<?php echo base_url(); ?>admin/akses_user/?nip=<?php echo $lihat->nip ?>" class="btn btn-sm btn-default">Akses Aplikasi</a>
									
							<?php	
							}
							else
							{
								
							}
							

							?>
                         
						 
                            <a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $lihat->username ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url(); ?>admin/hapus_user/<?php echo $lihat->nip ?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
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
