<!-- from pbamor pos -->

 <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.number.js"></script>



<!-- Vendor scripts -->

<script src="<?= base_url(); ?>assets/homer/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/jquery-flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/jquery-flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/jquery-flot/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/flot.curvedlines/curvedLines.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/jquery.flot.spline/index.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/iCheck/icheck.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/peity/jquery.peity.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/sparkline/index.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- App scripts -->
<script src="<?= base_url(); ?>assets/homer/scripts/homer.js"></script>
<script src="<?= base_url(); ?>assets/homer/scripts/charts.js"></script>

<!-- DataTables -->
<script src="<?= base_url(); ?>assets/homer/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables buttons scripts -->
<script src="<?= base_url(); ?>assets/homer/vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/homer/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<!-- App scripts -->

<script>

    $(document).ready(function(){

         $('#example2').dataTable();


        
   


    });

 

</script>


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
$('#verifikasi').hide();

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
$('body').on('click', '#btnShowitem', function(){
      var nampro = $(this).attr("nampro");
      var kdproduk = $(this).attr("kdproduk");
	  var ideditpro = $(this).attr("ideditpro");
	  var qtybef = $(this).attr("qtybef");
	  var qtypro = $(this).attr("qtypro");
	  var harpro = $(this).attr("harpro");

	  $('#qtybef').val(qtypro);
	 $('#ideditpro').val(ideditpro);
	  $('#productbarcode1').val(kdproduk);
      $('#nampro').val(nampro);
	  $('#qtypro').val(qtypro);
	  $('#harpro').val(harpro);
     
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
		  $('#kodebarang').val(ui.item.kdproduk);
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
		num = String(num);
		return parseFloat( num.replace( /,/g, '') );
    }
  </script>
    <script>
    $(document).ready(function() {
      $("#formtrxid").validate({
        rules:{ 
		  bayar:{required:true,number: true}
       },
       messages:{ 
        bayar:{
          required:'Tidak Boleh Kosong',
          number  :'Hanya boleh di isi Angka'},
          success: function(label) {
            label.text('').addClass('valid');
			}
	   }
          });
    });
    </script>
    <script>
    $('#qty').on('keyup',function(){
     var valqty = $('#qty').val();
     $("#qtyremove").val(valqty);
   });
    </script>
	<script>
	$("#qty").keypress(function(event){
    if(event.keyCode == 13){
        $("#submittambahproduk").click();
    }
});
	</script>
	
	<script>
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		"columns": [
        { "data": "trxname" },
        { "data": "trxadd" }, ],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>

<script>
$('body').on('click', '#btnShowtotaltrxmod', function(){
      var trxid = $(this).attr("trxid");
	  $('#trxidclose').val(trxid);
     
    });
    </script>
	
	
	</body>
</html>