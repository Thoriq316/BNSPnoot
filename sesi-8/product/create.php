<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Produk</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Custom CSS -->
    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card product-card">

                    <!-- Header -->
                    <div class="card-header product-header">

                        <h2 class="mb-1">
                            Tambah Produk
                        </h2>

                        <p class="mb-0">
                            Masukkan informasi produk dengan lengkap.
                        </p>

                    </div>


                    <!-- Form -->
                    <div class="card-body p-4">

                        <!-- Alert -->
                        <div
                            id="alertMessage"
                            class="alert d-none"
                            role="alert"
                        ></div>


                        <form
                            id="productForm"
                            enctype="multipart/form-data"
                        >

                            <div class="row g-4">

                                <!-- Nama -->
                                <div class="col-12">

                                    <label
                                        for="name"
                                        class="form-label"
                                    >
                                        Nama Produk
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        placeholder="Contoh: Laptop ASUS Vivobook"
                                        maxlength="100"
                                        required
                                    >

                                    <div
                                        class="invalid-feedback"
                                        id="nameError"
                                    ></div>

                                </div>


                                <!-- Kategori -->
                                <div class="col-md-6">

                                    <label
                                        for="category"
                                        class="form-label"
                                    >
                                        Kategori
                                        <span class="required">*</span>
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

                                        <option value="Elektronik">
                                            Elektronik
                                        </option>

                                        <option value="Fashion">
                                            Fashion
                                        </option>

                                        <option value="Makanan">
                                            Makanan
                                        </option>

                                        <option value="Minuman">
                                            Minuman
                                        </option>

                                        <option value="Aksesoris">
                                            Aksesoris
                                        </option>

                                        <option value="Lainnya">
                                            Lainnya
                                        </option>

                                    </select>

                                    <div
                                        class="invalid-feedback"
                                        id="categoryError"
                                    ></div>

                                </div>


                                <!-- Harga -->
                                <div class="col-md-6">

                                    <label
                                        for="price"
                                        class="form-label"
                                    >
                                        Harga
                                        <span class="required">*</span>
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            Rp
                                        </span>

                                        <input
                                            type="number"
                                            class="form-control"
                                            id="price"
                                            name="price"
                                            placeholder="1500000"
                                            min="0"
                                            step="0.01"
                                            required
                                        >

                                    </div>

                                    <div
                                        class="invalid-feedback"
                                        id="priceError"
                                    ></div>

                                </div>


                                <!-- Stock -->
                                <div class="col-md-6">

                                    <label
                                        for="stock"
                                        class="form-label"
                                    >
                                        Stok
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control"
                                        id="stock"
                                        name="stock"
                                        placeholder="100"
                                        min="0"
                                        step="1"
                                        required
                                    >

                                    <div
                                        class="invalid-feedback"
                                        id="stockError"
                                    ></div>

                                </div>


                                <!-- Image -->
                                <div class="col-md-6">

                                    <label
                                        for="image"
                                        class="form-label"
                                    >
                                        Gambar Produk
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image"
                                        name="image"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        required
                                    >

                                    <small class="text-muted">
                                        JPG, PNG, WEBP. Maksimal 2 MB.
                                    </small>

                                    <div
                                        class="invalid-feedback"
                                        id="imageError"
                                    ></div>

                                </div>


                                <!-- Description -->
                                <div class="col-12">

                                    <label
                                        for="description"
                                        class="form-label"
                                    >
                                        Deskripsi Produk
                                        <span class="required">*</span>
                                    </label>

                                    <textarea
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        rows="5"
                                        maxlength="1000"
                                        placeholder="Masukkan deskripsi produk..."
                                        required
                                    ></textarea>

                                    <div class="d-flex justify-content-between">

                                        <small class="text-muted">
                                            Minimal 10 karakter.
                                        </small>

                                        <small
                                            class="text-muted"
                                            id="charCounter"
                                        >
                                            0/1000
                                        </small>

                                    </div>

                                    <div
                                        class="invalid-feedback"
                                        id="descriptionError"
                                    ></div>

                                </div>

                            </div>


                            <!-- Button -->
                            <div class="d-flex justify-content-end gap-2 mt-4">

                                <button
                                    type="reset"
                                    class="btn btn-light border"
                                    id="resetButton"
                                >
                                    Reset
                                </button>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    id="submitButton"
                                >

                                    <span id="buttonText">
                                        Simpan Produk
                                    </span>

                                    <span
                                        id="buttonLoading"
                                        class="d-none"
                                    >
                                        <span
                                            class="spinner-border spinner-border-sm me-2"
                                        ></span>

                                        Menyimpan...
                                    </span>

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>
