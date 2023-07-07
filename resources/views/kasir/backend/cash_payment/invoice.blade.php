<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{  $data_tagihan->pembayaran->id_pembayaran }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">INVOICE TAGIHAN PAMSIMAS</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{  $data_tagihan->pembayaran->id_pembayaran }}</span> <br>
                    <span>Tanggal Pembayaran: {{ $data_tagihan->pembayaran->tanggal_pembayaran }}</span> <br>
                    <span>Area: {{ $data_tagihan->pelanggan->area->nama_area }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detail Tagihan</th>
                <th width="50%" colspan="2">Detail Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Id Tagihan:</td>
                <td>{{ $data_tagihan->id_tagihan }}</td>

                <td>Id Pelanggan:</td>
                <td>{{ $data_tagihan->id_pelanggan }}</td>
            </tr>
            <tr>
                <td>Tanggal Pembayaran:</td>
                <td>{{ $data_tagihan->pembayaran->tanggal_pembayaran }}</td>

                <td>Nama:</td>
                <td>{{ $data_tagihan->pelanggan->user->name }}</td>
            </tr>
            <tr>
                <td>Status Pembayaran:</td>
                <td>{{ $data_tagihan->status }}</td>

                <td>Email:</td>
                <td>{{ $data_tagihan->pelanggan->user->email }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Detail Pembayaran
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Keterangan Tagihan</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="70%">Biaya Beban Tetap</td>
                <td width="30%">7450</td>
            </tr>
            <tr>
                <td width="70%">Biaya Pemeliharaan</td>
                <td width="30%">4400</td>
            </tr>
            <tr>
                <td width="70%">PPN</td>
                <td width="30%">1995</td>
            </tr>
            <tr>
                <td width="70%">Biaya Materai</td>
                <td width="30%">3000</td>
            </tr>
            <tr>
                <td width="70%">Biaya Tagihan</td>
                <td width="30%">{{ $data_tagihan->jumlah_tagihan - (7450+4400+1995+3000+2500) }}</td>
            </tr>
            <tr>
                <td width="70%">Biaya Admin</td>
                <td width="30%">2500</td>
            </tr>
            <tr>
                <td  width="70%" class="total-heading">Total Pembayaran</td>
                <td width="30%" class="total-heading">{{ $data_tagihan->pembayaran->jumlah_pembayaran }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terima kasih telah melakukan pembayaran Tagihan Air Anda!
    </p>

</body>
</html>