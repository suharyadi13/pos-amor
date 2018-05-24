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
			  

					<div class="col-md-12">
					
					 <div class="box-body table-responsive no-padding">
                
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
						<th>No.</th>
                        <th>Nomor Faktur</th>
						<th>Nama Konsumen</th>
                        <th>Phone</th>
						<th>tgl </th>
						<th>Grand Total</th>
						<th>Action</th>
                    </thead>
                    <tbody>
                    	<tr>
							<td></td>
                    		<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
               		
                    	</tr>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
				 <a href="<?php echo base_url(); ?>admin/produk" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  
					</div>
                  
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
		 
		 <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.min.js"></script>
		  <script>
    $(function(){
  $("#produk").autocomplete({
    source: "admin/get_produk" // path to the get_birds method
  });
});
    </script>
        </div>
		
