  <section>
    <?php
    $index = isset($_GET['edit']) ? $_GET['edit'] : '';
    $dataSiswa = isset($_SESSION['dataSiswa'][$index]) ?  $_SESSION['dataSiswa'][$index] : '';


    if (isset($_POST['edit'])) {
      $_SESSION['dataSiswa'][$index]['nama'] = htmlspecialchars($_POST['edit_nama']);
      $_SESSION['dataSiswa'][$index]['nis'] = htmlspecialchars($_POST['edit_nis']);
      $_SESSION['dataSiswa'][$index]['rayon'] = htmlspecialchars($_POST['edit_rayon']);

      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }

    ?>

    <div class="absolute top-0 bottom-0 left-0 right-0 backdrop-filter backdrop-blur-sm" style="background-color: rgba(0, 0, 0, 0.4);"></div>
    <div class="absolute px-3 py-10 rounded-md -translate-x-1/2 bg-white z-10 -translate-y-1/2 border-2 border-gray-200 left-1/2 top-1/2 sm:max-w-96 w-full shadow-xl">
      <a href="?p=0" class="absolute top-3 right-3 text-xl text-gray-700">
        <i class="bi bi-x"></i>
      </a>
      <h1 class="mb-5 text-2xl font-semibold text-center">Edit data</h1>
      <form action="" method="post" class="space-y-3">
        <input type="text" value="<?= $dataSiswa['nama'] ?>" name="edit_nama" class="block w-full px-8 py-2 bg-gray-100 rounded-md" placeholder="Nama">
        <input type="text" value="<?= $dataSiswa['nis'] ?>" name="edit_nis" class="block w-full px-8 py-2 bg-gray-100 rounded-md" placeholder="Nis">
        <input type="text" value="<?= $dataSiswa['rayon'] ?>" name="edit_rayon" class="block w-full px-8 py-2 bg-gray-100 rounded-md" placeholder="Rayon">
        <button type="submit" name="edit" class="w-full py-2 text-lg text-white bg-blue-500 rounded-md">Edit</button>
      </form>
    </div>
  </section>