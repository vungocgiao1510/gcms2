<?php $this->load->view('template/header') ?>
<div class="container">
    <div class="row">
        <div class="col-md-3 float-left">
            <?php $this->load->view('template/includes/menu') ?>
        </div>
        <div class="col-md-9 float-left">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    if ($slide) {
                        $i = 0;
                        foreach ($slide as $value) {
                            $i++;
                            if ($i == 1) {
                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>';
                            } else {
                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
                            }
                        }
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    if ($slide) {
                        $i = 0;
                        foreach ($slide as $key => $value) {
                            $i++;
                            if ($i == 1) {
                                echo '<div class="carousel-item active">';
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img class="d-block w-100" src="' . $value["img_avatar"] . '" alt="First slide">';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<main>

    <div class="container">
        <div class="row categories_item">
            <?php
            if ($home_qc) {
                foreach ($home_qc as $value) {
                    ?>
                    <div class="col-3 float-left">
                        <a href="<?php echo $value['img_link']; ?>">
                            <img class="img-thumbnail" src="<?php echo $value['img_avatar'] ?>" alt="">
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <div class="row slider_item">
            <div class="container">
                <h2 class="title_home">Bộ sưu tập quan tâm</h2>
            </div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php
                        if ($home_brand) {
                            $i = 0;
                            foreach ($home_brand as $value) {
                                $i++;
                                if ($i <= 6) {
                                    ?>
                                    <div class="col-2 float-left">
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo $value['img_avatar'] ?>"
                                                 alt="Card image cap">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="carousel-item">
                        <?php
                        if ($home_brand1) {
                            $i = 0;
                            foreach ($home_brand1 as $value) {
                                $i++;
                                if ($i <= 6) {
                                    ?>
                                    <div class="col-2 float-left">
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo $value['img_avatar'] ?>"
                                                 alt="Card image cap">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="card home_products products">
            <div class="card-header">
                Đồng hồ bán chạy
            </div>
            <div class="card-body">
                <?php
                if ($home_product_type) {
                    foreach ($home_product_type as $value) {
                        $price = number_format($value['product_price']);
                        $price = str_replace(',','.', $price);
                        if($value['product_id'])
                        ?>
                        <div class="col-6 col-sm-6 float-left item">
                            <a href="product/<?php echo $value['product_slug']; ?>">
                                <img class="card-img-top" src="<?php echo $value['product_image']; ?>"
                                     alt="Card image cap" class="img-responsive">
                                <h3 class="card-title"><?php echo $value['product_name']; ?></h3>
                                <p class="card-text price">
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

    </div>
</main>

<?php $this->load->view('template/footer') ?>
