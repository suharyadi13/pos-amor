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
                <?php echo form_open('admin/save_user'); ?>
				
				<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">NIP</label>
										<input type="text" class="form-control" name="nip"  />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" class="form-control" name="name" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">No. KTP</label>
										<input type="text" class="form-control" name="ktp" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tempat Lahir</label>
										<input type="text" class="form-control" name="tmpt" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tanggal Lahir</label>
										<input type="text" class="form-control" name="ttl" id="tgllahir" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jenis Kelamin</label>
											<select name="kel" class="form-control">
												<option value="1"  >Laki - Laki</option>
												<option value="2" >Perempuan</option>
												
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Posisi Kantor: </label>
										<select name="agama" class="form-control">
												<option value="1"  >Islam</option>
												<option value="2" >Protestan</option>
												<option value="3" >Khatolik</option>
												<option value="4" >Hindu</option>
												<option value="5" >Budha</option>
												<option value="6" >Kepercayaan </option>
										</select>
									</div>
									
									
				</div>
				<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Status Perkawinan: </label>
										<select name="statuskwn" class="form-control">
												<option value="1"  >Menikah</option>
												<option value="2" >Belum Menikah</option>
												<option value="3" >Duda</option>
												<option value="4" >Janda</option>
										</select>
									</div>
									<div class="form-group" >
										<label for="exampleInputEmail1">Pendidikan : </label>
										<select name="pend" class="form-control">
													<?php
											 foreach ($data_pend as $data_pend):
											 ?>
											 <option value="<?= $data_pend->pendID ?>" ><?php echo $data_pend->pendName ?></option>
											 <?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat</label>
										<textarea class="form-control" name="alamat" /></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">HP</label>
										<input type="text" class="form-control" name="phone" />
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="text" class="form-control" name="email" />
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Posisi Kantor: </label>
										<select name="kantorlevel" id="kantorlevel" class="form-control">
												<option value="1"  >Pusat</option>
												<option value="2" >Cabang</option>
										</select>
									</div>
									<div class="form-group" id="kantorcabang">
										<label for="exampleInputEmail1">Nama Cabang : </label>
										<select name="kantorcabang" class="form-control">
													<?php
											 foreach ($data_perusahaan as $data_perusahaan):
											 ?>
											 <option value="<?= $data_perusahaan->identityID ?>" ><?php echo $data_perusahaan->identityName ?></option>
											 <?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">User Privilage</label>
										<select name="level" class="form-control">
												<option value="1"  >Administrator Pusat</option>
												<option value="2" >Penanggung Jawab Pusat</option>
												<option value="3"  >Staf Produksi</option>
												<option value="4" >Staf Pembelian</option>
												<option value="5"  >Staf Penjualan</option>
												<option value="6" >Staf Keuangan</option>
												<option value="7" >Staf HRD</option>
												<option value="8" >Staf Gudang</option>
										</select>
									</div>
                </div>
                  <a href="<?php echo base_url(); ?>admin/userman" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>

                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>