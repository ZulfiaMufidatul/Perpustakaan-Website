@extends('template')
@section('content')

<h1 class="title">About Us</h1>


<div class="homecard">
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>Zulfia Mufidatul Ummah</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td>210101107</td>
    </tr>
</table>
</div>
<br>
<div class="homecard">
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>Ulfarida Miftakhul Jannah</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td>210101084</td>
    </tr>
</table>
</div>
<br>
<div class="homecard">
<table>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>Tedo Anasta R</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td>210101105</td>
    </tr>
</table>
<br>
</div>

<br>

<div class="homecard social-media">
<h5 class="subjudul">Contact</h5>
<br>
<!-- <a target="_blank" href="https://api.whatsapp.com/send?phone=62895335204835" rel="noopener noreferrer"><i class="fab fa-whatsapp fa-lg"></i>&nbsp; Hubungi Saya</a><br/><br> -->
<!-- <a target="_blank" href="https://www.tiktok.com/@zxyzxyzz"><i class="fab fa-tiktok fa-lg"></i>&nbsp; zxyzxyzz</a><br/><br> -->
<a target="_blank" href="https://www.instagram.com/zulfia.mu/"><i class="fab fa-instagram fa-lg"></i>&nbsp; zulfia.mu</a><br/><br>
<a target="_blank" href="https://www.instagram.com/ulfaaamifta_/"><i class="fab fa-instagram fa-lg"></i>&nbsp; ulfaaamifta_</a><br/><br>
<a target="_blank" href="https://www.instagram.com/tedo_ar/"><i class="fab fa-instagram fa-lg"></i>&nbsp; tedo_ar</a><br/><br>
<!-- <a target="_blank" href="mailto:zulfiamufidatul@gmail.com"><i class="fas fa-envelope fa-lg"></i>&nbsp; zulfiamufidatul@gmail.com</a> -->


<img src="{{ asset('admin/dist/img/sosmed.png') }}" alt="social-media" class="img-sosmed">

</div>

<br>

@endsection