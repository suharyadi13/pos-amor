<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <?php echo $title; ?>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/perusahaan"> <?php echo $title; ?></a></li>
              <li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form  <?php echo $title; ?></h3>
              </div>
              <div class="box-body">
			  
			  	  
			  
                <!-- form start -->
                <?php echo form_open('admin/update_user'); ?>
                <?php  
                foreach ($editdata as $data):
                ?>
				<div class="col-md-6">
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $data->userID ?>">
										<label for="exampleInputEmail1">NIP</label>
										<input type="text" class="form-control" name="nipp" value="<?php echo $data->userNIP; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" class="form-control" name="name" value="<?php echo $data->userFullName; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Phone</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $data->userPhone; ?>" />
									</div>
				</div>
				<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Level</label>
										<select name="level" class="form-control">
											<?php
											
											if($data->userLevel=="1")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->userLevel=="2")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="1"  <?php echo $selected1; ?> >Administrator</option>
												<option value="2" <?php echo $selected2; ?> >Staf</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Blokir</label>
										<select name="bloking" class="form-control">
											<?php
											
											if($data->userBlocked=="Y")
											{
												$selected1="SELECTED";
											}
											else
											{
												$selected1="";
											}
											if($data->userBlocked=="N")
											{
												$selected2="SELECTED";
											}
												else
											{
												$selected2="";
											}
											?>
												<option value="Y"  <?php echo $selected1; ?> >Y ( Aktif )</option>
												<option value="N" <?php echo $selected2; ?> >N ( Tidak Aktif )</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Username</label>
										<input type="text" class="form-control" name="username" value="<?php echo $data->userName; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Password</label>
										<input type="password" class="form-control" name="password" />
										<i>(* Bila password tidak akan dirubah, kosongkan saja </i>
									</div>
                 </div>      
                  <a href="<?php echo base_url(); ?>admin/userman" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>