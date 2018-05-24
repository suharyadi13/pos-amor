<style>
b,table tr td
{
	font-family:Arial, 'Helvetica Neue',Helvetica, sans-serif;
	font-size:12px;
width:200px;
word-wrap:break-word;
text-align:left;
}
p {
	line-height:1;
}

table.header {
border-collapse: collapse;
border-spacing: 0;
}
table.header,.tr,.td { border: none; text-align:left; padding:2px; }

</style>    
<table width="100%">
	 <?php  
                        foreach ($perusahaan as $perusahaan):
                        ?>
                    	<tr>
							<td colspan="2" align="left"><center><b style="font-size:15px;font-weight:bolder;"><?php echo $perusahaan->identityName; ?></b></center></td>
                    	</tr>
						<tr>
							<td colspan="2" align="left"><center><?php echo $perusahaan->identityAddress; ?></center></td>
							
                    	</tr>
												<tr>
							<td colspan="2" align="left"><center><?php echo $perusahaan->identityPhone; ?></center></td>
							
                    	</tr>
						<?php endforeach; ?>
						</table>
						<br/><br/>
						<table width="100%">
						<td>Kode Struk : </td><td align="left"><p style="font-size:11px;font-weight:bolder;text-align:left;"><?php echo $nofak; ?></p></td>
						</tr>
						<tr>
						<td>Tanggal : </td><td align="left"><?php echo $trxDateprint; ?></td>
						</tr>
						<tr>
						<td>Kasir : </td><td align="left"><?php echo strtoupper($this->session->userdata('admin_nama'));?></td>
						</tr>
						
						
	</table>
<hr style="border-bottom:thin dotted #000;"/>
<br/>
						<table width="100%">
						<?php  
						$totalbel=0;
                        foreach ($detail as $lihat):
                        ?>
						<tr>
                    	<td width="60%"><?php echo $lihat->productName; ?>  </td><td>( x <?php echo $lihat->detailQty; ?> ) <?php echo number_format($lihat->detailSubtotal); ?></td></tr>
                    	<?php $totalbel=$totalbel+$lihat->detailSubtotal; ?>
						<?php endforeach; ?>
						<tr>
						<tr><td colspan="3">
						<hr style="border-bottom:thin dotted #000;"/>
						<br/>
						</td>
						</tr>
						<td style="border-top:dashed  thin #000;">Sub Total : </td><td align="left"><?php echo number_format($totalbel);?></td>
						</tr>
						<tr>
						<td >TOTAL: </td><td align="left"><?php echo number_format($totalbel);?></td>
						</tr>
						<tr>
						<td >Tunai: </td><td align="left"><?php echo number_format($bayar);?></td>
						</tr>
						<tr>
						<td >Kembali: </td><td align="left"><?php echo number_format($kembali);?></td>
						</tr>
						<tr><td colspan="3"><p style="text-align:center;"><b>** TERIMA KASIH **</b></p></td></tr>
						</table><br/><br/>
						
						
	
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