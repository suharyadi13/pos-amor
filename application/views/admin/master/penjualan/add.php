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
			  
			  	    <?php echo form_open('admin/addtpj_detail'); ?>
			  
                <!-- form start -->
				<div class="col-md-12" >
				<div class="form-group">
										
		
										   <h3 class="box-title">No Faktur :<b><?php echo $trxid; ?></b></h3>
										<p>Tanggal : <input type="text" name="tgltrx" value="<?php echo $trxDate; ?>"  disabled/></p>
									</div>
															
				<div class="col-md-6" >
				<div class="info-box bg-yellow">
				<span class="info-box-icon"><i class="ion ion-ios-checkmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"><a href="#"  style="color:#fff;" class="info-box-number" id="showmembertrx"> Outlet</a></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
				
				  <div class="form-group">
									<input type="hidden" class="form-control" name="idmember" id="idmember" />
									<input type="hidden" name="nofak" value="<?php echo $trxid;?>">
									<input type="hidden" name="tgltrx" value="<?php echo $trxDate; ?>"/>
									<input type="hidden" name="pilihantrx" value="member"/>
									<div id="memberaddtrx">
									ID Member :
									<input type="text" class="form-control" name="kodemember" id="kodemember" autofocus /><br/>
									<button class="btn btn-info btn-flat" type="submit" name="submit" value="member">Lanjutkan >></button>
									</div>
					</div>
									
                  </span>
                </div><!-- /.info-box-content -->
              </div>
			  <?php echo form_close(); ?>
				</div>
				
				<div class="col-md-6" >
				  <?php echo form_open('admin/addtpj_nonmemberdetail/?nofak='.$trxid.'&tgltrx='.$trxDate.''); ?>
					<div class="info-box bg-blue">
                <span class="info-box-icon"><i class="ion ion-ios-circle-filled"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number">Non Outlet</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
				  <button class="btn btn-info btn-flat" type="submit" name="submit"  value="nonmember">Lanjutkan >></button>
                  </span>
                </div><!-- /.info-box-content -->
              </div>
			  <?php echo form_close(); ?>
				</div>
                
             		
					</div>
				 <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
		  <script>
   
    </script>
        </div>
		
