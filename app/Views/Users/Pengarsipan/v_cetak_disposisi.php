<!DOCTYPE html>
<html>
	<head>
		<style>
      body{
        font-family: Times New Roman ;
      }

			table{
        font-size: 12px;
        border-collapse: collapse;
        width: 100%;
        
			}

      td {
      vertical-align: top;
      }

      .kop1 {
        font-size: 14px
      }

      .kop2 {
        font-size: 14px;
        font-weight: bold;
      }

      .kop3 {
        font-size: 12px
      }

      .font14{
        font-size: 14px;
      }

      .hr1{
        margin-top: 10px;
        height: 3px; 
        background-color: black !important; 
      }

      .hr2{
        height: 0.5px; 
        background-color: black !important; 
        margin-top: 2px;
        margin-bottom:10px;
      }

		</style>
	</head>
	<body>
    <table style="width: 100%; text-align: center;">
      <tr>
        <td rowspan="6"><img src='/img/kop_surat_kiri.png' width="60"></td>
        <td class="kop1" style="width:100%">PEMERINTAH KABUPATEN BATANG</td>
        <td rowspan="6"><img src='/img/kop_surat_kanan.png' width="60"></td>
      </tr>
      <tr>
        <td class="kop1" style="width:100%">KECAMATAN LIMPUNG</td>
      </tr>
      <tr>
        <td class="kop2">KANTOR KEPALA DESA KALISALAK</td>
      </tr>
      <tr>
        <td class="kop3">Alamat : Jl. K.H. Ahmad Rifa'i, Nomor : 01, Kalisalak Limpung. 51271</td>
      </tr>
    </table>
    <div class="hr1"></div>
    <div class="hr2"></div>
    <table style="width: 100%;">
      <tr>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px;" class="font14" colspan="2"><strong>LEMBAR DISPOSISI<strong></th>
      </tr>
      <tr>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Asal Surat &nbsp &nbsp &nbsp &nbsp :</b> <?= $suratmasuk['pengirim'];?>
        </td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Tanggal Terima &nbsp :</b> <?= tanggal_default($suratmasuk['tanggal_terima']); ?>
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Nomor Surat &nbsp &nbsp :</b> <?= $suratmasuk['nomor_surat'];?>
        </td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Nomor Agenda &nbsp &nbsp:</b> <?= $suratmasuk['nomor_agenda'];?>
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Tanggal Surat&nbsp &nbsp:</b> <?= tanggal_default($suratmasuk['tanggal_surat']); ?>
        </td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; ">
          <b>Sifat Surat&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</b> <?= $suratmasuk['sifat_surat'];?>
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; height:80px; " colspan="2">
          <b>Perihal &nbsp :</b>
          <br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?= $suratmasuk['perihal']; ?>
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; height:80px; ">
          <b>Diteruskan Kepada &nbsp :</b> 
          <br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?= $suratmasuk['nama_bagian'];?>
        </td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px; width: 50%; height:80px; ">
          <b>Isi Disposisi &nbsp :</b> 
          <br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?= $suratmasuk['isi_disposisi'];?>
        </td>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;">
      <tr>
      <td style="width:5%;"></td>
        <td style="width:25%; "></td>
        <td style="width:40%; text-align: center;">Mengetahui</td>
        <td style="width:5%;"></td>
        <td style="width:25%; "></td>
      </tr>
      <tr>
        <td style="width:5%;"></td>
        <td style="width:25%; "></td>
        <td style="width:40%;"></td>
        <td style="width:5%;"></td>
        <td style="width:25%; ">Kalisalak, <?php echo date('d-m-Y'); ?></td>
      </tr>
      <tr>
        <td style="width:5%;"></td>
        <td style="width:25%; ">
            SEKRETARIS DESA
            <br>
            <p>&nbsp;</p>
            KUNTARA
        </td>
        <td style="width:40%;"></td>
        <td style="width:5%;"></td>
        <td style="width:25%; ">
            KEPALA DESA
            <br>
            <p>&nbsp;&nbsp;</p>
            SETIADI, S.Pd          
        </td>
      </tr>
    </table>
  <script>
    window.print();
  </script>
	</body>
</html>