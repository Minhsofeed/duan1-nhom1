<?php include '../views/client/layout/header.php';
if (empty($_SESSION['user'])) {
    header('Location:?act=signin');
    exit;
}
?>
<div class="shopping_cart_area py-5">
    <div class="container">
        <?php if (!empty($chiTietGioHang)) : ?>
            <form action="index.php?act=update-cart" method="post">
                <div class="table-responsive mb-4">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Thao Tác</th>
                                <th>Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tongTienGioHang = 0;
                            foreach ($chiTietGioHang as $sp) :
                                $tongTien = $sp['gia_khuyen_mai'] ? $sp['gia_khuyen_mai'] * $sp['so_luong'] : $sp['gia_san_pham'] * $sp['so_luong'];
                                $tongTienGioHang += $tongTien;
                            ?>
                                <tr>
                                    <td>
                                        <a href="?act=delete-cart&san_pham_id=<?= $sp['san_pham_id'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <img src="./images/category<?= $sp['hinh_anh']; ?>" width="100">
                                    </td>
                                    <td><?= $sp['ten_san_pham'] ?></td>
                                    <td class="gia-san-pham" data-price="<?= $sp['gia_khuyen_mai'] ?: $sp['gia_san_pham'] ?>">
                                        <?= number_format($sp['gia_khuyen_mai'] ?: $sp['gia_san_pham'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <input
                                            type="number"
                                            name="quantity[<?= $sp['san_pham_id'] ?>]"
                                            class="form-control text-center so-luong"
                                            value="<?= $sp['so_luong'] ?>"
                                            data-id="<?= $sp['san_pham_id'] ?>"
                                            min="1"
                                            max="100">
                                    </td>
                                    <td class="tong-tien">
                                        <?= number_format($tongTien, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Tổng Giỏ Hàng</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Tổng Cộng</span>
                                <span class="fw-bold" id="tong-tien-gio-hang">
                                    <?= number_format($tongTienGioHang, 0, ',', '.') ?>
                                </span>
                            </div>
                            <a href="index.php?act=check-out" class="btn btn-primary w-100">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-warning text-center">Giỏ hàng của bạn đang trống!</div>
        <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.so-luong').on('change', function() {
            let cartData = [];
            $('.so-luong').each(function() {
                let id = $(this).data('id');
                let quantity = $(this).val();

                if (id && quantity) {
                    cartData.push({
                        id: id,
                        so_luong: parseInt(quantity, 10)
                    });
                }
            });
            console.log(cartData);

            $.ajax({
                url: 'http://localhost/duan1-nhom1-main/mvc-oop-basic/public/index.php?act=update-cart-ajax',
                type: 'POST',
                data: {
                    data_update: cartData,
                    gio_hang_id: <?= $gioHang['id'] ?>
                },
                success: function(data) {},
                error: function(e) {
                    console.log(e.message);
                }
            });
        });

        $('.so-luong').on('input', function() {
            let $this = $(this);
            let quantity = parseInt($this.val(), 10);
            let unitPrice = parseFloat($this.closest('tr').find('.gia-san-pham').data('price'));
            let $rowTotal = $this.closest('tr').find('.tong-tien');

            if (!isNaN(quantity) && quantity > 0) {
                let total = quantity * unitPrice;
                $rowTotal.text(number_format(total));
            }
            
            let totalCart = 0;
            $('.tong-tien').each(function() {
                let rowTotal = parseFloat($(this).text().replaceAll('.', '').replace(',', '.'));
                if (!isNaN(rowTotal)) {
                    totalCart += rowTotal;
                }
            });

            $('#tong-tien-gio-hang').text(number_format(totalCart));
        });

        function number_format(number) {
            return number.toLocaleString('vi-VN', {
                style: 'decimal',
                minimumFractionDigits: 0
            });
        }
    });
</script>
<?php include '../views/client/layout/footer.php'; ?>