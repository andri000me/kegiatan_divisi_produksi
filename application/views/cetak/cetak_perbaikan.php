<?php
        $image_file = "<img src=\"images/surat_jalan.jpg\" width=\"150px\" />";
        $tgl_sekarang = date("d F Y");
        $total_nominal;
        $isi_header="
        
        <table align=\"left\">
              <tr>
                <td>".$image_file."</td>
              </tr>
            </table>
            <h3 align=\"center\">Laporan Perbaikan</h3>
            <h5 align=\"right\">Tanggal Cetak : ".$tgl_sekarang."</h5>
            <hr>"
            ;
        

            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Laporan Perbaikan');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(3);
            $pdf->setFooterMargin(20);
            $pdf->setPrintFooter(false);
            $pdf->setPrintHeader(false);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 8);
            $i=0;
            $pdf->writeHTML($isi_header, true, false, false, false, '');
            $html='
            
            
            
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                    <tr bgcolor="black">
                            <th style="color:#fff" width="5%" align="center"><b>No</b></th>
                            <th style="color:#fff" width="11%" align="center"><b>Nama Aset</b></th>
                            <th style="color:#fff" width="25%" align="center"><b>Deskripsi</b></th>
                            <th style="color:#fff" width="11%" align="center"><b>Zona</b></th>
                            <th style="color:#fff" width="9%" align="center"><b>Tanggal Awal</b></th>
                            <th style="color:#fff" width="9%" align="center"><b>Tanggal Akhir</b></th>
                            <th style="color:#fff" width="11%" align="center"><b>Teknisi</b></th>
                            <th style="color:#fff" width="8%" align="center"><b>Status </b></th>
                            <th style="color:#fff" width="11%" align="center"><b>Biaya </b></th>
                        </tr>';
                        $total_nominal=0;
            foreach ($data->result_array() as $row) 
                {
                $i++;
                    $nominal=$row['biaya'];
                    
                    $total_nominal+=$nominal;
                    $html.='<tr bgcolor="#ffffff">
                            <th align="center">'.$i.'</th>
                            <th>'.$row['nama_aset'].'</th>
                            <th>'.$row['deskripsi'].'</th>
                            <th>'.$row['zona'].'</th>
                            <th>'.$row['tgl_awal'].'</th>
                            <th>'.$row['tgl_akhir'].'</th>
                            <th>'.$row['teknisi'].'</th>
                            <th>'.$row['status'].'</th>
                            <th align="right"> Rp. '.number_format($row['biaya'],0,".",".").'</th>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $html='
            
            <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                <tr bgcolor="#ffffff">
                <th width="89%" align="center"><b>Total</b></th>
                <th width="11%" align="right"><b>Rp. '.$total_nominal.'</b></th>
     
                </tr>
                </table>
                ';
                $pdf->writeHTML($html, true, false, true, false, '');
          
            $pdf->SetY(-20);
            $pdf->writeHTML("<hr>", true, false, false, false, '');
            $pdf->Cell(0, 10, 'Halaman '.$pdf->getAliasNumPage().' dari '.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $pdf->Output('Data Perbaikan', 'I');
?>
		
        