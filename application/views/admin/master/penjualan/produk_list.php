<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <!-- Main content -->
        <section class="content">
          <div class="row">
		   <div class="col-md-12">
			<br/>
        <div class="hpanel hyellow">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>	
				<a href="<?php echo base_url(); ?>4d111/" class="btn btn-outline btn-warning">HALAMAN UTAMA</a>
				<CENTER>
                 <h4 class="font-extra-bold no-margins text-success">
                         DAFTAR PRODUK
                        </h4>
						</CENTER>
						
            </div>
            <div class="panel-body">
			<br/>
					
			 <div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Produk Bolu Amor </a></li>
					  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Produk Mitra </a></li>
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="tab_1">
					<?php $this->load->view('admin/master/penjualan/produkamor'); ?>
					  </div><!-- /.tab-pane -->
					  
					  <div class="tab-pane" id="tab_2">
						 <?php $this->load->view('admin/master/penjualan/produkmitra'); ?>
					  </div><!-- /.tab-pane -->
					
					</div><!-- /.tab-content -->
				  </div><!-- nav-tabs-custom -->
						
            </div>
        </div>
    </div>
	
		  </div>
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  