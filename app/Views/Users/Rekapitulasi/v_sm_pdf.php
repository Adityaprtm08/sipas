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
    <table style="width: 100%; text-align: center;">
      <tr>
        <td class="font14"><strong>LAPORAN REKAPITULASI SURAT MASUK</strong></td>
      </tr>
      <tr>
        <td>Tanggal <?= tanggal_default($tglawal); ?> sampai dengan <?= tanggal_default($tglakhir); ?></td>
      </tr>
    </table>
    <br>
		<table width="100%">
      <tr style="border: 1px solid #000000; height: 20px; margin: 8px;">
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 4%; text-align: center">No.</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 10%; text-align: center">Nomor Surat</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 10%; text-align: center">Tanggal Surat</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 10%; text-align: center">Tanggal Terima</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 10%; text-align: center">Nomor Agenda</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 8%; text-align: center">Sifat Surat</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 14%; text-align: center">Pengirim</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 22%; text-align: center">Perihal</th>
        <th style="border: 1px solid #000000; height: 20px; margin: 8px; width: 14%; text-align: center">Disposisi</th>
      </tr>
      <?php $i = 1; ?>
      <?php foreach($datasm as $dsm) : ?>
      <tr style="border: 1px solid #000000; height: 20px; margin: 8px;">
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $i++ ;?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['nomor_surat']; ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= tanggal_default($dsm['tanggal_surat']); ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= tanggal_default($dsm['tanggal_terima']); ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['nomor_agenda']; ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['sifat_surat']; ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['pengirim']; ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['perihal']; ?></td>
        <td style="border: 1px solid #000000; height: 20px; margin: 8px;"><?= $dsm['nama_bagian']; ?></td>
      </tr>
      <?php endforeach; ?>
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