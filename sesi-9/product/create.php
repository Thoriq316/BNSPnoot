<?php
require_once 'connect.php';
?>

<?php include 'template/header.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>➕ Tambah Produk</h2>

        <a href="index.php" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="db_action/insert.php"
                method="POST"
                enctype="multipart/form-data"
            >

                <!-- NAMA PRODUK -->
                <div class="mb-3">

                    <label for="name" class="form-label">
                        Nama Produk
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Contoh: ASUS VivoBook 14"
                        required
                    >

                </div>


                <!-- KATEGORI -->
                <div class="mb-3">

                    <label for="category" class="form-label">
                        Kategori Produk
                    </label>

                    <select
                        class="form-select"
                        id="category"
                        name="category"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Laptop">
                            Laptop
                        </option>

                        <option value="Mouse">
                            Mouse
                        </option>

                        <option value="Keyboard">
                            Keyboard
                        </option>

                        <option value="Audio">
                            Audio
                        </option>

                        <option value="Smartphone">
                            Smartphone
                        </option>

                        <option value="Tablet">
                            Tablet
                        </option>

                        <option value="Storage">
                            Storage
                        </option>

                        <option value="Accessories">
                            Accessories
                        </option>

                        <option value="Networking">
                            Networking
                        </option>

                        <option value="Monitor">
                            Monitor
                        </option>

                    </select>

                </div>


                <!-- HARGA -->
                <div class="mb-3">

                    <label for="price" class="form-label">
                        Harga Produk
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="price"
                        name="price"
                        placeholder="Contoh: 7499000"
                        min="0"
                        required
                    >

                    <div class="form-text">
                        Masukkan harga tanpa titik atau koma.
                    </div>

                </div>


                <!-- STOK -->
                <div class="mb-3">

                    <label for="stock" class="form-label">
                        Stok Produk
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="stock"
                        name="stock"
                        placeholder="Contoh: 25"
                        min="0"
                        required
                    >

                </div>


                <!-- DESKRIPSI -->
                <div class="mb-3">

                    <label for="description" class="form-label">
                        Deskripsi Produk
                    </label>

                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Masukkan deskripsi produk..."
                        required
                    ></textarea>

                </div>


                <!-- GAMBAR -->
                <div class="mb-4">

                    <label for="image" class="form-label">
                        Gambar Produk
                    </label>

                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        accept="image/*"
                        required
                    >

                    <div class="form-text">
                        Format yang disarankan: JPG, JPEG, PNG.
                    </div>

                </div>


                <!-- TOMBOL -->
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        <i class="bi bi-plus-circle"></i>
                        Tambah Produk
                    </button>


                    <button
                        type="reset"
                        class="btn btn-secondary"
                    >
                        Reset
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<?php include 'template/footer.php'; ?>