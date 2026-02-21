<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Queue Print</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { width: 100%; border-bottom: 1px solid black; margin-bottom: 10px; }
        .header td { padding: 5px; }
        .content { width: 100%; border-collapse: collapse; }
        .content td { padding: 3px; vertical-align: top; }
        .label { width: 120px; font-weight: bold; }
        .value { }
        .footer { margin-top: 20px; border-top: 1px solid black; padding-top: 10px; text-align: center; }
        .queue-number { font-size: 70px; font-weight: bold; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <table class="header">
        <tr>
            <td align="left">Tempat Penyumbangan - <b>Bengkel Hangtuah</b></td>
            <td align="right">Tanggal <b>{{ date('d F Y') }}</b></td>
        </tr>
    </table>

    <table class="content">
        <tr>
            <td class="label">Nama donor</td>
            <td class="value">{{ $donor->name }}</td>
            <td class="value">{{ $donor->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td class="label">Alamat rumah</td>
            <td class="value">{{ $donor->address }}</td>
            <td class="value">{{ $donor->house_number || $donor->rt_rw ? 'No. ' . ($donor->house_number ?? '-') . ' - RT/RW ' . ($donor->rt_rw ?? '-') : '' }}</td>
        </tr>
        <tr>
            <td class="label">Kelurahan</td>
            <td class="value">{{ $donor->village ?? '-' }}</td>
            <td class="value">{{ $donor->district ? 'Kecamatan ' . $donor->district : '' }}</td>
        </tr>
        <tr>
            <td class="label">Wilayah</td>
            <td class="value">{{ $donor->region ?? '-' }}</td>
            <td class="value">{{ $donor->phone ? 'Telepon ' . $donor->phone : '' }}</td>
        </tr>
        <tr>
            <td class="label">Pekerjaan</td>
            <td class="value">{{ $donor->occupation }}</td>
            <td class="value"></td>
        </tr>
        <tr>
            <td class="label">Tanggal lahir</td>
            <td class="value">
                Tgl [ <b>{{ $donor->birth_date->format('d') }}</b> ] 
                Bln [ <b>{{ $donor->birth_date->format('m') }}</b> ] 
                Th [ <b>{{ $donor->birth_date->format('Y') }}</b> ]
            </td>
            <td class="value">No. kartu donor {{ $donor->donor_card_number ?? '-' }}</td>
        </tr>
    </table>

    <div style="margin-top: 10px;">
        Penghargaan yang telah diterima <b>{{ !empty($donor->awards) ? implode(', ', $donor->awards) : '-' }}</b>
    </div>
    <div style="margin-top: 5px;">
        Bersediakah Saudara donor pada waktu bulan puasa? <b>{{ $donor->willing_to_fast ? 'YA' : 'TIDAK' }}</b>
    </div>

    <table class="content" style="margin-top: 10px;">
        <tr>
            <td class="label" style="width: 150px;">Donor terakhir tanggal {{ $donor->last_donor_date ? $donor->last_donor_date->format('Y-m-d') : '-' }}</td>
            <td class="value">Sekarang donor yang ke <b>{{ $donor->total_donations }}</b> kali</td>
        </tr>
    </table>

    <div class="queue-number">
        {{ $queue->queue_number }}
    </div>

    <script type="text/javascript">
        try {
            this.print(true);
        } catch(e) {}
    </script>
</body>
</html>
