<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penerima Zakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            max-width: 100%;
            padding: 5px 5px 20px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000000;
            padding: 3px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Penerima Zakat Fitrah Masjid Al-Huda Samin Tahun {{ $tahunSekarang }}</h2>
        </div>

        <div>
            <table>
                <thead>
                    <tr style="font-weight: bold">
                        <td style="width: 7%; text-align: center">No.</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td style="width: 25%; text-align: center">Zakat Diterima</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerimaZakat as $item)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td style="text-align: center">{{ $item->zakat_diterima }}</td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        <td colspan="3">Total:</td>
                        <td style="text-align: center">{{ $totalZakatDiterimaLiter }} liter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
