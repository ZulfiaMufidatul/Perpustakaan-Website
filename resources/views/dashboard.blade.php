@extends('template')
@section('content')

<div class="row">
  <!-- iki -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h1>{{ $bookCount }}</h1>
        <p>Buku</p>
      </div>
      <div class="icon">
        <i><a href="/buku" class="fas fa-book fa-sm nav-link" style="color:#DDE6ED"></a></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <!-- tekan iki -->

  <!-- iki -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h1>{{ $memberCount }}</h1>
        <p>Anggota</p>
      </div>
      <div class="icon">
        <i><a href="/anggota" class="fas fa-users fa-sm nav-link" style="color:#DDE6ED"></a></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <!-- tekan iki -->

  <!-- iki -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning" href=>
      <div class="inner">
        <h1>{{ $transaksiCount }}</h1>

        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i><a href="/peminjaman" class="fas fa-tasks fa-sm nav-link" style="color:#DDE6ED"></a></i>

      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger" href=>
      <div class="inner">
        <h1>{{ $ktCount }}</h1>

        <p>Kategori Buku</p>
      </div>
      <div class="icon">
        <i><a href="/kategori" class="fas fa-list-alt fa-sm nav-link" style="color:#DDE6ED"></a></i>

      </div>
    </div>
  </div>
</div>
<!-- /.row -->

<div>
    <article class="homecard">
      <center>
    <h2 class="subjudul"><strong> Selamat Datang Di Website Perpustakaan SMP Budi Utomo Perak</strong></h2>
 
  
    <br>
    <figure>
        <img src="{{ asset('admin/dist/img/smpbu.png') }}" alt="Pemrograman-Web" class="smpbu">
    </figure>
    </center>
    
    <p>Berkembangnya internet membuat peluang baru dalam memperkenalkan suatu produk maupun instansi pada seluruh dunia tanpa ada batasan waktu dan ruang. Untuk memenuhi kebutuhan masyarakat tentang informasi, internet dapat menyediakan segala informasi yang dibutuhkan. Dengan begitu, dunia pendidikan di Indonesia dituntut untuk mengikuti perkembangan jaman ini agar mempermudah pertukaran informasi antar instansi pendidikan dan instansi lainnya. Untuk itu, SMP Budi Utomo Perak yang beralamatkan pada Jl. Masjid Luhur Nurhasan, Desa Gadingmangu, Kecamatan Perak, Kabupaten Jombang hadir di internet untuk memenuhi kebutuhan pembaca akan informasi dari SMP Budi utomo Perak. Dengan dibukanya website resmi SMP Budi Utomo Perak ini, diharapkan dapat meningkatkan sistem pembelajaran serta kualitas sumberdaya manusia pada pengetahuan, terutama mengenai informasi, komunikasi dan teknologi</p>
    <p><strong>SMP Budi Utomo Perak Jombang</strong> adalah salah satu sekolah menengah pertama (SMP) di daerah Kabupaten Jombang, yakni SMP Budi Utomo Perak merupakan SMP yang cukup tersohor di daerah disekitarnya. Berbagai prestasi diperoleh tiap tahunnya oleh para siswa-siswinya. SMP Budi Utomo Perak mendapat status Akreditasi A dari Badan Akreditasi Nasional (BAN). SMP Budi Utomo Perak terletak di desa Gadingmangu Kec Perak Kab. Jombang. Selain melaksanakan pendidikan sesuai dengan kurikulum nasional, pendidikan di SMP Budi Utomo Perak juga terintegrasi dengan pendidikan di pondok pesantren Gadingmangu. Ada kerjasama khusus yang memungkinkan peserta didik memiliki dua (2) keilmuan sekaligus yaitu ilmu pengetahuan umum sebagai bekal kemandirian dimasa depan serta ilmu keagamaan sebagai bekal hidup bermasyarakat. Bagi anda yang ingin menhubungi sekolah ini untuk mengetahui informasi lebih lanjut, dapat menghubungi no.telp : (0321)-868379. Untuk e-mail anda dapat mengirimkannya ke alamat : smpbu.gama@gmail.com.</p>

    
    <p><strong>Visi</strong></p>
    <p>Profesional Religius Inovatif Mandiri dan Akhlak mulia yang disingkat PRIMA.</p>
      <p>Dalam proses mencapai visi tersebut, SMP Budi Utomo Perak memiliki misi yang siap untuk mereka lakukan demi tercapainya visi sekolah. </p>
    <p><strong>Misi</strong></p>
    <p>Mewujudkan lulusan yang beriman, bertaqwa, cerdas, kompetitif, berkarakter dan berakhlak mulia.</p>
<p>Meningkatkan prestasi akademik dan non akademik.<p>
<p>Mengembangkan kurikulum sekolah dengan prinsip : berpusat pada potensi, perkembangan, kebutuhan, dan kepentingan peserta didik dan lingkungannya pada masa kini dan yang akan datang, belajar sepanjang hayat serta menyeluruh dan berkesinambungan.</p>
<p>Mewujudkan pelaksanaan pembelajaran, pembinaan dan pelatihan yang kondusif, aktif, inovatif, kreatif, efektif dan menyenangkan</p>
<p>Mewujudkan tenaga pendidik dan tenaga kependidikan yang profesional religius dan berwawasan ke depan.</p>
    </article>
</div>

<div class="tab-pane fade" id="custom-content-below-jabatan" role="tabpanel" aria-labelledby="custom-content-below-jabatan-tab">
  <canvas id="chart-kategori" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 419px;" width="312" height="312"></canvas>
</div>

<script>
  async function fetchKategoriData() {
    const response = await fetch('/kategori/getKategoriInfo');
    const data = await response.json();
    return data;
  }

  (async function() {
    const dataKategori = await fetchKategoriData();
    const pieKategori = document.getElementById('chart-kategori').getContext('2d');

    new Chart(pieKategori, {
      type: 'pie',
      data: {
        labels: dataKategori.map(row => row.name_kategori),
        datasets: [{
          label: 'Jumlah Buku',
          data: dataKategori.map(row => row.count),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: [{
            gridLines: {
              display: false,
            }
          }],
          y: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }
    });
  })();
</script>








@endsection