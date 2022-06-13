<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style type="text/css">
        .table {
            width: 100%;
            border-spacing: 0;
        }

        .table tr:first-child th,
        .table tr:first-child td {
            border-top: 1px solid #000;
        }

        .table tr th:first-child,
        .table tr td:first-child {
            border-left: 1px solid #000;
        }

        .table tr th,
        .table tr td {
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 4px;
            vertical-align: top;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Pengembalian</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pengembalian as $pen) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <!-- yang asli -->
                    <td><?= $pen['nama_anggota']; ?></td>
                    <td><?= $pen['tanggal_kembali']; ?></td>
                    <td><?= $pen['tanggal_pengembalian']; ?></td>
                    <td><?= $pen['judul_buku']; ?></td>
                    <td><?= $pen['denda']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>