<?php
session_start();

// Tambah data
if (!isset($_SESSION['dataSiswa'])) {
  $_SESSION['dataSiswa'] = [];
}

if (isset($_POST['tambah_data'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $nis = htmlspecialchars($_POST['nis']);
  $rayon = htmlspecialchars($_POST['rayon']);

  if (empty($nama) || empty($nis) || empty($rayon)) {
    echo "<script>alert('Mohon lengkapi data')</script>";
  } else {
    $data = [
      'nama' => $nama,
      'nis' => $nis,
      'rayon' => $rayon
    ];
    array_push($_SESSION['dataSiswa'], $data);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }
}

//  Hapus Data
if (isset($_GET['hapus'])) {
  $index = $_GET['hapus'];
  unset($_SESSION['dataSiswa'][$index]);
}

// Reset Data
if (isset($_POST['reset'])) {
  session_unset();
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

// Edit 
if (isset($_GET['edit'])) {
  include "edit.php";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
  </style>
</head>

<body class="font-urbanist h-dvh">
  <h1 class="mt-8 mb-10 md:mb-16 text-2xl font-semibold text-center md:text-4xl">Tambah Data</h1>

  <div class="flex justify-center w-full px-3 sm:px-5">
    <div class="max-w-5xl w-full gap-2">
      <div>
        <form action="" method="post" class="w-full flex flex-col sm:grid grid-cols-2 grid-rows-2 gap-4 lg:flex lg:flex-row">
          <input class="focus:outline-blue-400 bg-gray-100 sm:py-2.5 py-2 sm:px-7 px-5 rounded-md" type="text" name="nama" placeholder="Nama">
          <input class="bg-gray-100 focus:outline-blue-400 sm:py-2.5 py-2 sm:px-7 px-5 rounded-md" type="text" name="nis" placeholder="Nis">
          <input class="bg-gray-100 focus:outline-blue-400 sm:py-2.5 py-2 sm:px-7 px-5 rounded-md" type="text" name="rayon" placeholder="Rayon">

          <span class="whitespace-nowrap w-full">
            <button type="submit" name="tambah_data" class="py-2 text-base sm:text-lg text-white bg-blue-500 rounded-md" style="width: calc(100% - 47px); ">Tambah data</button>
            <button type="submit" onclick="return confirm('Yakin?')" name="reset" class="p-2 text-base sm:text-xl px-3 text-white bg-blue-500 rounded-md"><i class="bi bi-arrow-clockwise"></i></button>
          </span>
      </div>

      <div class="w-full mt-10  pb-10">
        <table class="min-w-full text-xs sm:text-sm lg:text-base bg-white divide-y-4 table-fixed divide-gray-200">
          <?php if (!empty($_SESSION['dataSiswa'])) : ?>
            <thead class="text-left sm:text-center">
              <tr>
                <th class="md:px-2 py-2 font-semibold text-gray-700 whitespace-nowrap">Nama</th>
                <th class="md:px-2 py-2 font-semibold text-gray-700 whitespace-nowrap">Nis</th>
                <th class="md:px-2 py-2 font-semibold text-gray-700 whitespace-nowrap">Rombel</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($_SESSION['dataSiswa'] as $index => $value) : ?>

                <tr class="odd:bg-gray-50">
                  <td class="md:px-4 px-0.5 py-2.5 text-gray-700 w-[30%] whitespace-normal sm:w-auto" id="nameCell"><?= $value['nama'] ?></td>
                  <td class="md:px-4 px-0.5 py-2.5 text-gray-700 w-[30%] sm:w-auto"><?= $value['nis'] ?></td>
                  <td class="md:px-4 px-0.5 py-2.5 text-gray-700 w-[30%] sm:w-auto"><?= $value['rayon'] ?></td>
                  <td class="md:px-4 px-0.5 py-2.5 space-x-2 text-center text-gray-700 whitespace-nowrap w-[10%]">
                    <a class="p-1.5 sm:p-2 text-green-700 bg-green-100 rounded-sm" href="?edit=<?= $index ?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="p-1.5 sm:p-2 text-red-700 bg-red-100 rounded-sm" href="?hapus=<?= $index ?>"><i class="bi bi-trash3"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="py-2 bg-red-200 rounded-md text-slate-700">
                <h2 class="sm:text-lg text-base text-center"><i class="mr-2 bi bi-exclamation-circle-fill"></i>Tidak ada data
                </h2>
              </div>
            <?php endif ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>