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
    <h1>Laporan Buku</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Kategori</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Penerbit</th>
                <th scope="col">Stok Buku</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($buku as $b) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <!-- yang asli -->
                    <td><?= $b['kode_buku']; ?></td>
                    <td><?= $b['judul_buku']; ?></td>
                    <td><?= $b['nama_kategori']; ?></td>
                    <td><?= $b['nama_penulis']; ?></td>
                    <td><?= $b['nama_penerbit']; ?></td>
                    <td><?= $b['tahun_penerbit']; ?></td>
                    <td><?= $b['stok']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>