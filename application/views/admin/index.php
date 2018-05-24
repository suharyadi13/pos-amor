<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Pro-Bussiness</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ionicons/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-main.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.number.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui/jquery-ui.theme.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="skin-default sidebar-mini sidebar-collapse fixed">
		<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index2.html" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>POS</b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Amor</b> POS</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">             
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Selamat Datang, <b><?php echo strtoupper($this->session->userdata('admin_nama'));?></b> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
				</ul>
				</li>              
			</ul>
			</div>
		</nav>
		</header>

<?php $this->load->view('admin/'.$page); ?>


</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->


<script>
$(function () {
$("#example1").DataTable({          
	"language": {
	"url": "<?php echo base_url(); ?>assets/plugins/datatables/Indonesian.json",
	"sEmptyTable": "Tidak ada data di database"
	}
});
});
$(function() {
$( "#tgl_surat" ).datepicker({ 
	autoclose: true 
});
});
</script>
<script>
$('#terminpjdate').datepicker({
dateFormat: 'yy-mm-dd'
});
$('#tgllahir').datepicker({
dateFormat: 'yy-mm-dd'
});
</script>
<script>
$('#idenhead').hide();
$('#termindate').hide();
$('#memberaddtrx').hide();
$('#proyekaddtrx').hide();
$('#kantorcabang').hide();

$('#identitytype').on('change', function() {
if($(this).val() == '1') {
$('#idenhead').slideDown('slow');
$('#divpemilik').show();
$('#idenhead').hide();
} else {
$('#idenhead').slideDown('slow');
$('#idenhead').show();
$('#divpemilik').hide();
}
});

$('#kantorlevel').on('change', function() {
if($(this).val() == '1') {
$('#kantorcabang').hide();
} else {
$('#kantorcabang').slideDown('slow');
$('#kantorcabang').show();
}
});

$('#identitytype').on('change', function() {
if($(this).val() == '1') {
$('#termindate').slideDown('slow');
$('#termindate').hide();
} else {
$('#termindate').slideDown('slow');
$('#termindate').show();
}
});
$('#showmembertrx').on('click', function() {
$('#memberaddtrx').slideDown('slow');
$('#memberaddtrx').togle();

});

$('#tipebayar').on('change', function() {
if($(this).val() == '1') {
$('#termindate').slideDown('slow');
$('#termindate').hide();
} else {
$('#termindate').slideDown('slow');
$('#termindate').show();
}
});

$('#showproyektrx').on('click', function() {
$('#proyekaddtrx').slideDown('slow');
$('#proyekaddtrx').togle();

});

$('#banktipe').hide();
$('#tipebank').on('change', function() {
if($(this).val() == 'tunai') {
$('#banktipe').slideDown('slow');
$('#banktipe').hide();
} else {
$('#banktipe').slideDown('slow');
$('#banktipe').show();
}
});
</script>

<script>
$( "#dialog:ui-dialog" ).dialog( "remove" );
// $(".btnShow").live("click",function(){
$('body').on('click', '#btnShow', function(){
	var nampro = $(this).attr("nampro");
	var productbarcode = $(this).attr("kodepro");
	var ideditpro = $(this).attr("ideditpro");
	var qtybef = $(this).attr("qtybef");
	var qtypro = $(this).attr("qtypro");

	$('#qtybef').val(qtybef);
	$('#ideditpro').val(ideditpro);
	$('#productbarcode').val(productbarcode);
	$('#nampro').val(nampro);
	$('#qtypro').val(qtybef);
	
	$('#dialog').dialog('open');
	return false;
	});
	</script>

	<script>
	$(function () {
	$("#dialog").dialog({
		modal: true,
		autoOpen: false,
		title: "Edit Transaksi"
	});
	});

	</script>
	<script>
	$(function () {
	$("#kodebarang").autocomplete({    
		minLength:0,
		delay:0,
		source:'<?php echo site_url('auto/get_produk'); ?>',   
		select:function(event, ui){
		$('#nama').val(ui.item.nama);
		$('#kdproduk').val(ui.item.kdproduk);
		$('#stokproduk').val(ui.item.stokproduk);
		}
	});
	
	
	$("#kodebahan").autocomplete({    
		minLength:0,
		delay:0,
		source:'<?php echo site_url('auto/get_bahan'); ?>',   
		select:function(event, ui){
		$('#nama').val(ui.item.nama);
		$('#kdbahan').val(ui.item.idbahan);
		$('#stokbahan').val(ui.item.stokbahan);
		}
	});

	$('#warningstok').hide();
	$('#qty').on('keyup',function(){

	var qty = parseInt($('#qty').val(),10);
	var stok = parseInt($('#stokproduk').val(),10);
	if (qty > stok) {
		$('#warningstok').show();
		$("#submittambahproduk").attr("disabled", true);
	}
	else
	{
		$('#warningstok').hide();
		$("#submittambahproduk").attr("disabled", false);
	}
	});
	});

	$(function () {
	$("#kodemember").autocomplete({  
		minLength:0,
		delay:0,
		source:'<?php echo site_url('auto/get_member'); ?>',   
		select:function(event, ui){
		$('#idmember').val(ui.item.idmember);
		$('#namamember').val(ui.item.nama);
		$('#alamat').val(ui.item.alamat);
		$('#telp').val(ui.item.telp);

	}
	});

	$("#kodeproyek").autocomplete({  
		minLength:0,
		delay:0,
		source:'<?php echo site_url('auto/get_proyek'); ?>',   
		select:function(event, ui){
		$('#idproyek').val(ui.item.idproyek);
		$('#namaproyek').val(ui.item.namaproyek);
		$('#alamatproyek').val(ui.item.alamatproyek);
		$('#telpproyek').val(ui.item.telpproyek);

	}
	});

	});
	</script>
	<script>
	function parseCurrency( num ) {
	return parseFloat( num.replace( /,/g, '') );
	}

	$(function(){
				// Set up the number formatting.
				
				$('#bayar').on('change',function(){
					console.log('Change event.');
					var val = $('#bayar').val();
					$('#kembali').text( val !== '' ? val : '(empty)' );
				});
				
				$('#bayar').change(function(){
					console.log('Second change event...');
				});
				
				$('#bayar').number( true, 0 );
				
				
				
				$('#bayar').on('keyup',function(){
					
					var bayar = $('#bayar').val();
					var total = $('#total').val();
					var val=parseCurrency(bayar)-parseCurrency(total);
					$("#kembali").val(val);
					$("#kembali").number( true, 0 );
					
				});
			});
	</script>
	<script>
	$(document).ready(function() {
	$("#formtrxid").validate({
		rules:{ 
		kodeproduk:"required",
		bayar:{required:true,number: true},
		qty:{required:true,number: true}
	},
	messages:{ 
		kodeproduk:{required:'Tidak Boleh Kosong'},
		bayar:{
		required:'Tidak Boleh Kosong',
		number  :'Hanya boleh di isi Angka'},
		qty:{
			required:'Tidak Boleh Kosong',
			number  :'Hanya boleh di isi Angka'},
			
		},
		success: function(label) {
			label.text('').addClass('valid');}
		});
	});
	</script>
	<script>
	$('#qty').on('keyup',function(){

	var valqty = $('#qty').val();
	$("#qtyremove").val(valqty);

});
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- datepicker -->
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
	<!-- Webcam				-->

</body>
</html>
