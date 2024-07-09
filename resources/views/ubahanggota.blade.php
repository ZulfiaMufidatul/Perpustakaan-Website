@extends('template')
@section('content')
<div class="kembali">
        <div>
            <a class= "btn btn-primary" href="/dashboard"><i class="fas fa-arrow-left">&nbsp;</i><strong>Kembali</strong></a>
        </div>
    </div>
    <br>
    <div>
    @foreach($data as $anggota)
    <form action="/anggota/editanggota" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table>
        <tr>
                <td><strong>Foto</strong></td>
                <td>:</td>
                <td><input type="file" name="foto" required="required"></td>
            </tr>

            <tr>
                <td><strong>NISN</strong></td>
                <td>:</td>
                <td><input type="text" name="nisn" required="required" value="{{ old('nisn', $anggota->nisn) }}"></td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td><input type="text" name="nama_anggota" required="required" value="{{ old('nama_anggota', $anggota->nama_anggota) }}"></td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>:</td>
                <!-- <td><input class="kelas" type="text" name="kelas" required="required" value="{{ old('kelas', $anggota->kelas) }}"></td> -->
                <td>
                    <select name="kelas" required>
                        <option value=""></option>
                        <option value="VII A" {{ old('kelas', $anggota->kelas) == 'VII A' ? 'selected' : '' }}>VII A</option>
                        <option value="VII B" {{ old('kelas', $anggota->kelas) == 'VII B' ? 'selected' : '' }}>VII B</option>
                        <option value="VII C" {{ old('kelas', $anggota->kelas) == 'VII C' ? 'selected' : '' }}>VII C</option>
                        <option value="VII D" {{ old('kelas', $anggota->kelas) == 'VII D' ? 'selected' : '' }}>VII D</option>
                        <option value="VII E" {{ old('kelas', $anggota->kelas) == 'VII E' ? 'selected' : '' }}>VII E</option>
                        <option value="VII F" {{ old('kelas', $anggota->kelas) == 'VII F' ? 'selected' : '' }}>VII F</option>
                        <option value="VII G" {{ old('kelas', $anggota->kelas) == 'VII G' ? 'selected' : '' }}>VII G</option>
                        <option value="VIII A" {{ old('kelas', $anggota->kelas) == 'VIII A' ? 'selected' : '' }}>VIII A</option>
                        <option value="VIII B" {{ old('kelas', $anggota->kelas) == 'VIII B' ? 'selected' : '' }}>VIII B</option>
                        <option value="VIII C" {{ old('kelas', $anggota->kelas) == 'VIII C' ? 'selected' : '' }}>VIII C</option>
                        <option value="VIII D" {{ old('kelas', $anggota->kelas) == 'VIII D' ? 'selected' : '' }}>VIII D</option>
                        <option value="VIII E" {{ old('kelas', $anggota->kelas) == 'VIII E' ? 'selected' : '' }}>VIII E</option>
                        <option value="VIII F" {{ old('kelas', $anggota->kelas) == 'VIII F' ? 'selected' : '' }}>VIII F</option>
                        <option value="VIII G" {{ old('kelas', $anggota->kelas) == 'VIII G' ? 'selected' : '' }}>VIII G</option>
                        <option value="IX A" {{ old('kelas', $anggota->kelas) == 'IX A' ? 'selected' : '' }}>IX A</option>
                        <option value="IX B" {{ old('kelas', $anggota->kelas) == 'IX B' ? 'selected' : '' }}>IX B</option>
                        <option value="IX C" {{ old('kelas', $anggota->kelas) == 'IX C' ? 'selected' : '' }}>IX C</option>
                        <option value="IX D" {{ old('kelas', $anggota->kelas) == 'IX D' ? 'selected' : '' }}>IX D</option>
                        <option value="IX E" {{ old('kelas', $anggota->kelas) == 'IX E' ? 'selected' : '' }}>IX E</option>
                        <option value="IX F" {{ old('kelas', $anggota->kelas) == 'IX F' ? 'selected' : '' }}>IX F</option>
                        <option value="IX G" {{ old('kelas', $anggota->kelas) == 'IX G' ? 'selected' : '' }}>IX G</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>No Hp</strong></td>
                <td>:</td>
                <td><input type="text" name="no_hp" required="required" value="{{ old('no_hp', $anggota->no_hp) }}"></td>
            </tr>
        </table>

        <input class= "btn btn-success submit" type="submit" value="Simpan Data">
        
    </form>
    @endforeach
    @endsection
