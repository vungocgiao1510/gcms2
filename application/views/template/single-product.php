<?php $this->load->view('template/header') ?>
<div class="container">
    <div class="card single_product">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <?php
                                $product_images = str_replace('|', ',', $data['product_images']);
                                $product_images = explode(',', $product_images);
                                $product_images = array_filter($product_images, 'strlen');
                                if ($product_images != "") {
                                    $i = 0;
                                    foreach ($product_images as $images) {
                                        $i++;
                                        if ($i <= 4) {
                                            ?>
                                            <a class="nav-link <?php echo ($i == 1) ? "active" : ""; ?>" id=""
                                               data-toggle="pill" href="#images<?php echo $i; ?>" role="tab"
                                               aria-selected="true">
                                                <img src="<?php echo $images ?>" class="img-thumbnail"/>
                                            </a>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-9 border">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php
                                if ($product_images != "") {
                                    $i = 0;
                                    foreach ($product_images as $images) {
                                        $i++;
                                        ?>
                                        <div class="tab-pane fade <?php echo ($i == 1) ? "show active" : ""; ?>"
                                             id="images<?php echo $i; ?>" role="tabpanel">
                                            <img src="<?php echo $images ?>" class="img-fluid"/>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1><?php echo $data['product_name']; ?></h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-7">
                            <p class="price">
                                <?php echo str_replace(',', '.', number_format($data['product_price'])); ?>đ
                            </p>
                            <p class="description">
                                <?php echo $data['product_info']; ?>
                            </p>
                        </div>
                        <div class="col-md-5 info">
                            <h3><?php echo $des->contact_name ?></h3>
                            <p>
                                <?php echo $des->contact_description; ?>
                            </p>
                            <p>
                                <i class="fas fa-cog"></i> Bảo hành 5 năm toàn quốc
                            </p>
                            <p>
                                <i class="fas fa-shipping-fast"></i> Miễn phí vận chuyển
                            </p>
                            <p>
                                <i class="fas fa-star"></i>Cam kết hàng chính hãng 100%
                            </p>
                            <p class="hotline">
                                <i class="fas fa-mobile-alt"></i> Hotline: <?php echo $des->contact_hotline ?>
                            </p>
                            <p class="email">
                                <i class="fas fa-envelope-square"></i> Email: <?php echo $des->contact_email ?>
                            </p>
                            <p class="address">
                                <i class="fas fa-map-marker-alt"></i> Showrooms: <?php echo $des->contact_address2 ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <a class="btn btn-light add_to_cart" onclick="return add_to_cart(<?php echo $data['product_id']; ?>)">Chọn mua</a>
                </div>

            </div>
        </div>
    </div>
    <article>
        <div class="card col-12 col-sm-12 col-md-8 float-left">
            <div class="card-body">
                <div class="product_content" id="content">
                    <?php echo $data['product_content']; ?>
                    <p class="read-more"><a class="button btn btn-light">Xem thêm</a></p>
                </div>

            </div>
        </div>
        <div class="card-group col-12 col-sm-12 col-md-4 float-left npdr attr_product">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <?php
                        if (is_array($attrs)) {
                            foreach ($attrs as $attr) {
                                if ($attr['attr_parent'] == 0) {
                                    echo "<tr>";
                                    echo "<th>" . $attr['attr_name'] . "<th>";
                                    $attr_id = $attr['attr_id'];
                                    foreach ($attrs as $attr2) {
                                        if ($attr_id == $attr2['attr_parent']) {
                                            echo "<td>" . $attr2['attr_name'] . "</td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </article>
    <div class="clearfix"></div>
    <section class="other_products">
            <div class="card products">
                <div class="card-body">
                    <?php
                    if ($other) {
                        foreach ($other as $value) {
                            $price = number_format($value['product_price']);
                            $price = str_replace(',', '.', $price);
                            ?>
                            <div class="col-6 col-sm-6 col-md-2 float-left item">
                                <a href="product/<?php echo $value['product_slug']; ?>">
                                    <img src="<?php echo $value['product_image']; ?>" class="img-fluid">
                                    <h3 class="title"><?php echo $value['product_name']; ?></h3>
                                    <p class="price">
                                        <?php echo $price; ?>đ
                                    </p>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
    </section>

</div>
<div class="clearfix"></div>
<?php $this->load->view('template/footer') ?>
