 <section class="sidebar">
      <ul class="sidebar-menu">
        <?php 
        switch ($levelLog) {
          case '5':
            ?>
              <li class="header">MENU KASIR</li>
              <li><a href="?h=pembayaran"><i class="fa fa-circle-o text-red"></i> <span>Pembayaran Resep Pasien</span></a></li>
              <!-- <li><a href="?h=pendaftaran"><i class="fa fa-circle-o text-red"></i> <span>Data Pendaftaran</span></a></li> -->
            <?php
            break;

          case '4':
            ?>
              <li class="header">DATA MASTER</li>
              <li><a href="?h=poliklinik"><i class="fa fa-plus-square"></i> <span>Data Poliklinik</span></a></li>
              <li><a href="?h=Dokter"><i class="fa fa-stethoscope"></i> <span>Data Dokter</span></a></li>
              <li><a href="?h=karyawan"><i class="fa fa-users"></i> <span>Data Karyawan</span></a></li>
              <li><a href="?h=obat"><i class="fa fa-medkit"></i> <span>Data Obat</span></a></li>
              <li><a href="?h=pasien"><i class="fa fa-wheelchair"></i> <span>Data Pasien</span></a></li>
              <li><a href="?h=pendaftaran"><i class="fa fa-registered "></i> <span>Data Pendaftaran</span></a></li>
              <li class="header">LAPORAN</li>
              <li><a href="?h=laporanDokter"><i class="fa fa-print"></i> <span>Data Dokter</span></a></li>
              <li><a href="?h=laporanKaryawan"><i class="fa fa-print"></i> <span>Data Karyawan</span></a></li>
              <li><a href="?h=laporanDataobat"><i class="fa fa-print"></i> <span>Data Obat</span></a></li>
              <li><a href="?h=laporanPasien"><i class="fa fa-print"></i> <span>Data Pasien</span></a></li>
              <li><a href="?h=laporanobat"><i class="fa fa-print"></i> <span>Data Transaksi Obat</span></a></li>
              <li><a href="?h=laporanpendaftaran"><i class="fa fa-print"></i> <span>Data Pendaftaran</span></a></li>
            <?php
            break;

          case '3':
            ?>
              <li class="header">MENU PENDAFTARAN</li>
              <li><a href="?h=pasien"><i class="fa fa-circle-o text-red"></i> <span>Data Pasien</span></a></li>
              <li><a href="?h=pendaftaran"><i class="fa fa-circle-o text-red"></i> <span>Data Pendaftaran</span></a></li>
            <?php
            break;

          case '2':
            ?>
              <li class="header">MENU APOTEK</li>
              <li><a href="?h=reseppasien"><i class="fa fa-circle-o text-red"></i> <span>Resep Pasien</span></a></li>
              <!-- <li><a href="?h=pendaftaran"><i class="fa fa-circle-o text-red"></i> <span>Data Pendaftaran</span></a></li> -->
            <?php
            break;
            
          case '1':
            ?>
              <li class="header">MENU POLIKLINIK</li>
              <li><a href="?h=daftarpasien"><i class="fa fa-circle-o text-red"></i> <span>Daftar Pasien</span></a></li>
              <!-- <li><a href="?h=pendaftaran"><i class="fa fa-circle-o text-red"></i> <span>Data Pendaftaran</span></a></li> -->
            <?php
            break;


        }
         ?>




        
      </ul>
    </section>