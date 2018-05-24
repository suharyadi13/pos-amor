<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
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
		
		<?php $trxDate = date('d-m-Y'); ?>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
			  
			  	  
			  
                <!-- form start -->
                <?php echo form_open('admin/addtpj_memberdetail/?nofak='.$trxid.'&idmember=01&tgltrx='.$trxDate.''); ?>
				
									<div class="form-group">
										<input type="hidden" name="nofak" value="<?php echo $trxid;?>">
		
										   <h3 class="box-title">No Faktur :<b><?php echo $trxid; ?></b></h3>
										<p>Tanggal : <input type="text" name="tgltrx" value="<?php echo $tgltrx; ?>"  disabled/></p>
									</div>
				
				
				
					<div class="col-md-6">
									<div class="form-group ">
									Nama Pembeli	
									<input type="text" class="form-control" name="namamember"  />
									</div>
					
									<div class="form-group">
									Alamat Kirim
									<input type="text" class="form-control" name="alamatkirim"  />
									</div>
									No Telp :
									<div class="form-group">
									<input type="text" class="form-control" name="telpkirim" />
									</div>
								
					</div>
					
					 <div class="col-md-12" >
					 <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Selanjutnya</button>
					</div>	
				
                  
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
		  <script>
   
    </script>
        </div>
		
