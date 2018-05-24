<?php 

if($this->session->userdata('admin_level')=='1')
{
?>
	 <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>

              <li class="<?php if($page == 'home'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>admin/index">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                </a>
              </li>   
			  
              <li class="treeview">
                <a href="#">
                  <i class="fa  fa-asterisk"></i>
                  <span>Master Data</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
				<li class="<?php if($page == 'jenis_surat'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>admin/identitas">
                  <i class="fa fa-tag"></i> <span>Identitas Perusahaan</span>
                </a>
              </li>  
              <li class="<?php if($page == 'jenis_surat'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>admin/userman">
                  <i class="fa fa-user"></i> <span>Manajemen Pegawai</span>
                </a>
              </li>  
                  <li><a href="<?php echo base_url(); ?>admin/kategori"><i class="fa fa-angle-double-right"></i> Kategori</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/satuan"><i class="fa fa-angle-double-right"></i> Satuan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/brand"><i class="fa fa-angle-double-right"></i> Brand</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/suplier"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/produk"><i class="fa fa-angle-double-right"></i> Produk</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/member"><i class="fa fa-angle-double-right"></i> Outlet</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/proyek"><i class="fa fa-angle-double-right"></i> Proyek</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/zona"><i class="fa fa-angle-double-right"></i> Zona</a></li>
                </ul>
              </li>
			   <li class="<?php if($page == 'home'){echo 'active';} ?>">
                <a href="<?php echo base_url(); ?>product">
                  <i class="fa  fa-gears"></i> <span>Produksi</span> 
                </a>
              </li>     
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Transaksi Penjualan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/addtpj"><i class="fa fa-angle-double-right"></i> Order Penjualan</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/showtrxpj"><i class="fa fa-angle-double-right"></i> Daftar Transaksi Penjualan</a></li>
				  <li><a href="<?php echo base_url(); ?>admin/showtrxpjpryk"><i class="fa fa-angle-double-right"></i> Daftar Transaksi Outlet</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Purchase Order</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>pembelian/addtpm"><i class="fa fa-angle-double-right"></i> Tambah Transaksi</a></li>
                  <li><a href="<?php echo base_url(); ?>pembelian/daftar_po"><i class="fa fa-angle-double-right"></i>Daftar Transaksi</a></li>
                </ul>
              </li>
                <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Transaksi Penerimaan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>penerimaan"><i class="fa fa-angle-double-right"></i>Penerimaan Barang</a></li>
                  <li><a href="<?php echo base_url(); ?>penerimaan/daftar_penerimaan"><i class="fa fa-angle-double-right"></i>Daftar Penerimaan</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-eraser"></i>
                  <span>Retur Pembelian</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/addtrt"><i class="fa fa-angle-double-right"></i> Tambah Retur</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Cari Transaksi</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-money"></i>
                  <span>Biaya</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/akun"><i class="fa fa-angle-double-right"></i> Akun Biaya</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Cari Transaksi</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>Stock Opname</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>admin/so"><i class="fa fa-angle-double-right"></i> Data Stock Opname</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Cari Stock Opname</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Print Produk</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-credit-card"></i>
                  <span>Keuangan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <li><a href="<?php echo base_url(); ?>admin/anggaran"><i class="fa fa-angle-double-right"></i> Anggaran</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/khutang"><i class="fa fa-angle-double-right"></i>Kartu Hutang</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/kpiutang"><i class="fa fa-angle-double-right"></i>Kartu Piutang</a></li>
                 <li class="treeview">
                   <a href="#">
                    <i class="fa  fa-columns"></i>
                    <span>Akuntansi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                   <li><a href="<?php echo base_url(); ?>admin/coa"><i class="fa fa-angle-double-right"></i> Kode Akun</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/bukbes"><i class="fa fa-angle-double-right"></i> Buku Besar</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/gl"><i class="fa fa-angle-double-right"></i>Jurnal Umum</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/findtpj"><i class="fa fa-angle-double-right"></i>Jurnal Penyesuian</a></li>

                 </ul>
               </li>
               <li class="treeview">
                 <a href="#">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Laporan</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 <li><a href="<?php echo base_url(); ?>admin/lappen"><i class="fa fa-angle-double-right"></i> Laporan Pendapatan</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/so"><i class="fa fa-angle-double-right"></i> Laporan Pengeluaran</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/laprug"><i class="fa fa-angle-double-right"></i>Laporan Laba Rugi</a></li>

               </ul>
             </li>
           </ul>
         </li>

         <li class="<?php if($page == 'jenis_surat'){echo 'active';} ?>">
          <a href="<?php echo base_url(); ?>admin/barcode">
            <i class="fa  fa-barcode"></i> <span>Cetak Barcode</span>
          </a>
        </li> 
      </ul>
	<?php
}
else if($this->session->userdata('admin_level')=='2')
{
		
}

?>