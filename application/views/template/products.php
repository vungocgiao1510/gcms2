<?php $this->load->view('template/header') ?>
<div class="container archive_product">
    <div class="col-12 col-sm-2 col-md-2 float-left card sidebar">
        <div class="">
            <form action="" name="filter_price" method="get">
                <h5 class="title">Chọn mức giá</h5>
                <p><a href="<?php echo $uri; ?>?min_price=1000000&max_price=3000000">1.000.0000 - 3.000.000</a></p>
                <p><a href="<?php echo $uri; ?>?min_price=3000000&max_price=5000000">3.000.0000 - 5.000.000</a></p>
                <p><a href="<?php echo $uri; ?>?min_price=5000000&max_price=10000000">5.000.0000 - 10.000.000</a></p>
                <p><a href="<?php echo $uri; ?>?min_price=10000000&max_price=30000000">10.000.0000 - 30.000.000</a></p>
                <p><a href="<?php echo $uri; ?>?min_price=30000000&max_price=50000000">30.000.0000 - 50.000.000</a></p>
                <p><a href="<?php echo $uri; ?>?min_price=50000000&max_price=100000000">50.000.0000 - 100.000.000</a></p>
            </form>
                        <form id="form_filter" name="form_filter" action="" method="get">
                            <?php
                            if ($attrs) {
                                foreach ($attrs as $value) {
                                    if ($value['attr_parent'] == 0) {
                                        echo "<div class='attr_item'>";
                                        echo "<h5 class='title'>$value[attr_name]</h5>";
                                        $attr_id = $value['attr_id'];
                                        foreach ($attrs as $value2) {
                                            if ($value2['attr_parent'] == $attr_id) {
                                                switch ($value['attr_form']){
                                                    case '1':
                                                        ?>
                                                        <label class="cb_filter"><?php echo $value2['attr_name']; ?>
                                                            <input type="checkbox" name="<?php echo $value['attr_slug']; ?>"
                                                                   value="<?php echo $value2['attr_slug']; ?>">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <?php
                                                        break;
                                                    case '2':
                                                        ?>
                                                        <label class="cb_filter"><?php echo $value2['attr_name']; ?>
                                                            <input type="radio" name="<?php echo $value['attr_slug']; ?>"
                                                                   value="<?php echo $value2['attr_slug']; ?>">
                                                            <span class="checkmark2"></span>
                                                        </label>
                                                    <?php
                                                        break;
                                                }
                                                ?>
<!--                                                <label class="cb_filter">--><?php //echo $value2['attr_name']; ?>
<!--                                                    <input type="radio" name="--><?php //echo $value['attr_slug']; ?><!--"-->
<!--                                                           value="--><?php //echo $value2['attr_slug']; ?><!--">-->
<!--                                                    <span class="checkmark"></span>-->
<!--                                                </label>-->
                                                <?php
                                            }
                                        }
                                        echo "</div>";
                                    }
                                }
                            }
                            ?>
                            <button type="submit" class="btn btn-default w-100" name="filter" value="result">Lọc</button>
                        </form>
        </div>
    </div>
    <div class="card-group col-12 col-sm-10 col-md-10 float-left npdr products">
        <div class="card">
            <div class="card-body">
                <?php
                if ($data) {
                    foreach ($data as $value) {
                        $price = number_format($value['product_price']);
                        $price = str_replace(',', '.', $price);
                        ?>
                        <div class="col-6 col-sm-6 col-md-3 float-left item">
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
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->load->view('template/footer') ?>
