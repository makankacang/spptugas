<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
        .print-btn, .whatsapp-btn {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-btn {
            background-color: #4caf50;
            color: white;
            border: none;
            margin-right: 10px;
        }

        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            border: none;
        }

        /* Hide the button when printing */
        @media print {
            .print-btn, .whatsapp-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<h2>Struk Pembayaran</h2>

<p>
    <strong>Tanggal: </strong> {{ now()->format('Y-m-d') }} </strong> <br>
    <strong>Alamat: </strong> Jl. Pahlawan No. 54 </strong>
</p>

<table>
    <thead>
        <tr>
            <th>ID Pembayaran</th>
            <th>NISN</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah bulan yang dibayar</th>
        </tr>
    </thead>
    <tbody>
        <!-- Insert your invoice items here as rows in the table -->
        <tr>
            <td>{{ $pembayaran->id_pembayaran }}</td>
            <td>{{ $pembayaran->nisn }}</td>
            <td>{{ $pembayaran->tgl_bayar }}</td>
            <td>{{ $pembayaran->semester }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr class="total">
            <td colspan="3">Total</td>
            <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

<button class="print-btn" onclick="printFaktur()">Print Faktur</button>
<button class="whatsapp-btn" onclick="sendToWhatsApp()">Send to WhatsApp</button>

<script>
    function printFaktur() {
        window.print();
    }

    function sendToWhatsApp() {
    // You can customize the WhatsApp message here
    var message = encodeURIComponent("Halo, berikut adalah struk pembayaran anda:\n\n" +
        "ID Pembayaran: {{ $pembayaran->id_pembayaran }}\n" +
        "NISN: {{ $pembayaran->nisn }}\n" +
        "Tanggal Bayar: {{ $pembayaran->tgl_bayar }}\n" +
        "Jumlah bulan yang dibayar: {{ $pembayaran->semester }}\n" +
        "Total Pembayaran: Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}");

    // URL to open WhatsApp with the pre-filled message
    var whatsappURL = "https://wa.me/{{ $pembayaran->siswa->no_telp }}?text=" + message;

    // Open WhatsApp in a new tab or window
    window.open(whatsappURL, '_blank');
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

</body>
</html>

