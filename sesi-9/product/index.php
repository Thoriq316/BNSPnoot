<form
    action="db_action/delete.php"
    method="POST"
    style="display:inline;"
    onsubmit="return confirm('Yakin ingin menghapus produk ini?');"
>

    <input
        type="hidden"
        name="id"
        value="<?= $product['id']; ?>"
    >

    <button
        type="submit"
        class="btn btn-sm btn-danger"
    >
        🗑 Delete
    </button>

</form>