 <?php echo $this->load->view("admin/header"); ?>
 <?php echo $this->load->view("admin/topnav"); ?>
 <?php /* echo $this->load->view("admin/sidebar");  */?>
 

 <!-- Main Wrapper -->
 <div id="wrapper">
 <!-- /page content -->
 	<?php $this->load->view('admin/'.$page); ?>
 <!-- footer content -->

 </div>


 <?php echo $this->load->view("admin/footer"); ?>
