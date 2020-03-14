<?php
function myMoney($saldoAwal, $bunga, $bulan)
{
    // Finds whether a variable is a number or a numeric string
    if (is_numeric($saldoAwal))
    {

        // Convert Percent to Decimal
        $p2d = ($bunga * 0.01);

        // Mendapatkan saldo akhir
        $saldoAkhir = $saldoAwal + ($saldoAwal * $p2d * $bulan);

        return $saldoAkhir;

    } else {
        return 'String must be a Numeric! e.g 25000';
    }
}

echo myMoney(2921690, '2.1', 12);