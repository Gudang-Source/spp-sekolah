
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rekapitulasi Pembayaran</title>
    <style>
.page_break { page-break-before: always; },
.garis_dua{ 
  border: 0;
  border-top: 5px double #8c8c8c;
}
</style>
  </head>
  <body>
    <header class="clearfix">
      <div >
        <div style="float:left;padding-right:20px;">
        <br>
          <img style="hight:70; width:70;" src="{{public_path('')}}\assets\img\logo\bbl.png" />
        </div>
        <div style="padding-top:10">
          <p> <span style="font-size:14pt;font-style:bold">SMK BAABUL KAMIL</span>
          <br> <span style="font-size:12pt">Terakreditasi 'A' | Program Keahlian : Multimedia, Adm Perkantoran & Perawatan</span>
          <br> <span style="font-size:10pt">Alamat:Jl. Cikuda No. 08 Jatinangor, Tlp : (022) 7797312 / 085294124866</span>
          <br> <span style="font-size:10pt">Email: <span style="color:blue; font-style: italic;"> smkbaabulkamil_jatinangor@yahoo.com </span></span>
          | <span style="font-size:10pt">Website : <span style="color:blue;font-style: italic;">www.smkbaabulkamil.sch.id</span></span>
          </p>
        </div>
      </div>
        <hr class="garis_dua">
        <center><h4 style="margin-bottom:2">REKAPITULASI</h4></center>
        <center><h4>BUKTI PEMBAYARAN SISWA</h4></center><hr>
        <table width='100%'>
          <tr>
            <td width='100%'>
              <table>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>  
                <tr>
                  <td width="100%">
                  <small style="font-style:italic">dicetak</small>
                  </td>
                  <td width="100%">
                  <small style="font-style:italic">:</small>
                  </td>
                  <td width="100%">
                  <small style="font-size:8pt;font-style:italic">{{ $data['tanggal'] }} - {{ $data['waktu'] }}</small>
                  </td>
                </tr>  
              </table>
            </td>
            <td width='100%'>&nbsp;</td>
            <td width='100%'>
            <table>
                <tr>
                  <td>NIS</td>
                  <td>:</td>
                  <td>{{$siswa['nis']}}</td>
                </tr>  
                <tr>
                  <td>NAMA</td>
                  <td>:</td>
                  <td>{{$siswa['nama']}}</td>
                </tr>  
                <tr>
                  <td>KELAS</td>
                  <td>:</td>
                  <td>{{$siswa['kelas']}} - {{$siswa['major']->nama}}</td>
                </tr>  
              </table>
            </td>
          </tr>
        </table>
        
    </header>
    <br>
    <hr>
    <main style="align-item:center;">
      <table style="font-size:14px;" width="100%">
        <thead>
          <tr>
            <th width="6%">NO</th>
            <th width="30%">TANGGAL PEMBAYARAN</th>
            <th width="44%">DESKRIPSI</th>
            <th width="20%">JUMLAH</th>
          </tr>
        </thead>
        <tbody>
        @php
        $total=0;
        @endphp
        @foreach($datas as $data)

        @php
        $total += intval($data['periode']->nominal);
        $bulans = ['',"Januari", "Februari", "Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $bulan=$bulans[$data['periode']->bulan];
        $d = "Pembayaran {$data['periode']->financingCategory->nama} untuk periode bulan {$bulan} tahun {$data['periode']->tahun}";
        @endphp
        
        <tr>
          <td colspan="4"><hr></td>
          </tr>
          <tr>
            <td >
            <div style="text-align:center">
            {{$no++}}
            </div>
            </td>
            <td >
            <div style="text-align:center">
            {{$data->created_at}}
            </div>
            </td>
            <td >
              <div style="word-wrap: break-word;">
              {{$d}}
              </div>
            <td class="unit">
              <div style="text-align:right">
              {{number_format($data['periode']->nominal,0,',','.')}}
              </div>
            </td>
          </tr>
        @endforeach
          <tr>
        <!-- EOL -->
          <td colspan="4"><hr></td>
          </tr>
        </tbody>
      </table>
      <table width='100%'>
          <tr>
            <td width='50%'>
              <table>
                <tr>
                  <td>&nbsp;</td>
                </tr> 
                <tr>
                <td>&nbsp;</td>
                </tr>
              </table>
            </td>
            <td width='50%'>
            <table width='100%'>
              <tr>
                <td><strong>Total :</strong></td>
                <td style="text-align:right"><strong>
              {{number_format($total,0,',','.')}}</strong></td>
                </tr> 
                <tr>
                  <td colspan='2'><hr></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
    </main>
    <footer>
    <br>
    <table width='100%'>
      <tr>
        <td width='50%'>
          <table width='100%'>
            <tr></tr>
          </table>
        </td>
        <td width='50%'>
          <table style="text-align:center" width='100%'>
            <tr>
              <td>Jatinangor, {{$data['tanggal']}}</td>
            </tr>
            <tr>
            <td>Bendahara Sekolah</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <br>
    <table width='100%'>
      <tr>
        <td width='50%'>
          <table width='100%'>
            <tr>
              <td>Catatan</td>
            </tr>
            <tr style='font-size:14px'>
              <td>- Disimpan sebagai pembayaran bukti yang SAH</td>
            </tr>
            <tr style='font-size:14px'>
              <td>- Uang yang dibayar tidak dapat diminta kembali</td>
            </tr>
          </table>
        </td>
        <td width='50%'>
          <table width='100%'>
            <tr><td><br></td></tr>
            <tr><td><br></td></tr>
            <tr>
              <td style="text-align:center"><span style="text-decoration: underline; font-weight:bold"> {{$user}} </span></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    </footer>
  </body>
</html>