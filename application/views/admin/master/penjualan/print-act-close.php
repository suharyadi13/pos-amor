<style>
b,table tr td
{
		font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
	font-size:12px;
width:200px;
word-wrap:break-word;
}
p {
	line-height:1;
}

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header tr,td { border: none; text-align:left; padding:2px; }

</style>    			<table width="100%"><h3>
						<tr>
						<td>Kasir : </td><td align="left"><?php echo strtoupper($this->session->userdata('admin_nama'));?></td>
						</tr>
						<tr>
						<td>Waktu : </td><td align="left"><?php echo $todayprint; ?></td>
						</tr>
						</table>
						<hr style="border-bottom:thin dotted #000;"/>
						<br/><br/><br/>
						<table width="100%">
						<center><h3>PENERIMAAN AKTUAL</h3></center>
						<?php  
							$totalactual="";
						$totalact="";
                        foreach ($inc_close as $actual):
                        ?>
						
						<tr>
						<td >TUNAI: </td><td></td><td><?php echo number_format($actual->trxTotalReal);?></td>
						</tr>
						<tr>
						<td >KARTU: </td><td></td><td><?php echo number_format($actual->trxTotalRealcard);?></td>
						</tr>
						<?php  
						$totalactual=($actual->trxTotalReal)+($actual->trxTotalRealcard);
                        endforeach;
						$totalact=$totalactual;
                        ?>
						<tr>
						<td >TOTAL: </td><td></td><td><?php echo number_format($totalact);?></td>
						</tr>
						</table>
						<hr style="border-bottom:thin dotted #000;"/>
						<br/><br/>
						<table width="100%">
						<center><h3>PENERIMAAN SISTEM</h3></center>
						<?php  
							$totalsistem="";
                        foreach ($inc_close as $sistem):
                        ?>
						
						<tr>
						<td >TUNAI: </td><td></td><td><?php echo number_format($sistem->trxTotal);?></td>
						</tr>
						<tr>
						<td >RETUR: </td><td></td><td></td>
						</tr>
						<tr>
						<td >KAS MASUK: </td><td></td><td></td>
						</tr>
						<tr>
						<td >KAS KELUAR: </td><td></td><td></td>
						</tr>
						<?php  
                        endforeach;
						$totalsistem=$sistem->trxTotal;
                        ?>
						<tr>
						<td >TOTAL: </td><td></td><td><?php echo number_format($totalsistem);?></td>
						</tr>
						</table>
						<br/><br/>
						<hr style="border-bottom:thin dotted #000;"/>
						<table width="100%"><h3>
						<center>SELISIH PENERIMAAN</center></h3>
						<?php  
							$selisih=$totalact-$totalsistem;
                        ?>
						
						<tr>
						<td >Aktual - Sistem: </td><td></td><td><?php echo number_format($selisih);?></td>
						</tr>
						
						</table>
	
	<script type="text/javascript">
      window.onload = function() { window.print();document.location.href =  "<?php  echo base_url('admin'); ?>"; }
 </script>
 
 
 <script>
	window.onkeypress = function(e) {
    if ((e.which || e.keyCode) == 13) {
        $("#printfinish").click();
    }
}
	</script>