<h1><b><u>LAPORAN TRANSAKSI RESTORAN</u></b></h1>
<h2>Periode: <?php echo date('d-m-Y',  strtotime($params->tgl_awal)) ." sampai ". date('d-m-Y',  strtotime($params->tgl_akhir)); ?></h2>
<br>
<table border=1 cellpadding=5 cellspacing=0 border-style=solid border-color=black>
    <tr>
        <th>Tanggal</th>
        <th>Pesanan</th>
        <th>Kasir</th>
        <th>Pelayan</th>        
        <th>Harga</th>
        <th>Pajak</th>
        <th>Total</th>
    </tr>    
    <?php
    $nf = new CNumberFormatter('id');
    $tot_harga=0;
    $tot_pajak=0;
    $tot_total=0;
    foreach ($dataTrans as $trans) {
        $pajak = $trans['pajak']*$trans['harga_pesanan']/100;
        $tot_pajak = $tot_pajak + $pajak;
        $tot_harga = $tot_harga + $trans['harga_pesanan'];
        $tot_total = $tot_total + $trans['harga_total'];
    ?>
    <tr>
        <td width="150"><?php echo date('d F Y',strtotime($trans['tanggal'])); ?></td>
        <td width="160"><?php echo $trans['nama_pelanggan']; ?></td>
        <td width="160"><?php echo $trans['pelayan']; ?></td>
        <td width="160"><?php echo $trans['kasir']; ?></td>
        <td width="120" align="right"><?php echo $nf->formatCurrency($trans['harga_pesanan'],'Rp '); ?></td>
        <td width="120" align="right"><?php echo $nf->formatCurrency($pajak,'Rp '); ?></td>
        <td width="120" align="right"><?php echo $nf->formatCurrency($trans['harga_total'],'Rp '); ?></td>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="4" align="right"><b>Jumlah</b></td>
        <td width="120" align="right"><b><?php echo $nf->formatCurrency($tot_harga,'Rp '); ?></b></td>
        <td width="120" align="right"><b><?php echo $nf->formatCurrency($tot_pajak,'Rp '); ?></b></td>
        <td width="120" align="right"><b><?php echo $nf->formatCurrency($tot_total,'Rp '); ?></b></td>
    </tr>
</table>