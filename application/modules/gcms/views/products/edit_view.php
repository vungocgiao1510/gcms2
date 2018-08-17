<div class="col-md-12">
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
</div>

<div class="form_main">
    <form action="" method="post">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $title; ?></h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="title"
                                       value="<?php echo $data['product_name']; ?>"
                                       placeholder="Tên tài khoản.."/>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="product_slug" class="form-control" id=""
                                       value="<?php echo $data['product_slug']; ?>"
                                       placeholder="Liên kết.."/>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input type="text" name="product_price" class="form-control"
                                       value="<?php echo $data['product_price']; ?>"
                                       placeholder="Giá gốc.."/>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Giá giảm</label>
                                <input type="text" name="product_promotion" class="form-control"
                                       value="<?php echo $data['product_promotion']; ?>"
                                       placeholder="Giá giảm.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control" name="product_info" id="" rows="3"
                                          placeholder="Mô tả.."><?php echo $data['product_info']; ?></textarea>
                                <script>
                                    CKEDITOR.replace('product_info');
                                </script>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="product_content" id="content" rows="3"
                                          placeholder="Nội dung.."><?php echo $data['product_content']; ?></textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a data-toggle="collapse" href="#collapseTwo">Cấu hình SEO</a></div>
                <div class="panel-body panel-collapse collapse in" id="collapseTwo">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="product_title" class="form-control"
                                   value="<?php echo $data['product_title']; ?>"
                                   placeholder="Tên tiêu đề.."/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="product_description" id="" rows="3"
                                      placeholder="Mô tả.."><?php echo $data['product_description']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="text-right">
                        <p>Cập nhật lần cuối vào lúc:
                            <?php
                            $date = date_create($data['update_time']);
                            echo date_format($date, 'H:i:s d/m/Y');
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-right">
                        <p>Người sửa đổi: <?php echo $data['product_author']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Thuộc tính</div>
                <div class="panel-body">
                    <select multiple class="form-control" name="cate_id[]" style="height:200px;">
                        <?php
                        callMenuPN($listMenu, $rela);
                        ?>
                    </select>
                    <label for="">Primary Menu</label>
                    <select class="form-control" name="primary_id">
                        <option value="0">Không chọn</option>
                        <?php
                        callMenuPN($listMenu, $data['primary_id']);
                        ?>
                    </select>
                    <div class="attr_list">
                        <a data-toggle="collapse" data-parent="#accordion" href="#attr_list">Bấm vào đây để chọn thuộc
                            tính</a>
                        <div class="panel-collapse collapse" id="attr_list">
                            <?php
                            callAttrCB3($listAttr, $attr_product);

                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label>Mã sản phẩm</label>
                            <input type="text" name="product_code" class="form-control"
                                   value="<?php echo $data['product_code']; ?>"
                                   placeholder="Mã sản phẩm.."/>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="product_type">
                                <option value="0" <?php echo ($data['product_type'] == 0) ? 'selected' : '' ?>>Bình thường
                                </option>
                                <option value="1" <?php echo ($data['product_type'] == 1) ? 'selected' : '' ?>>Bán chạy
                                </option>
                                <option value="2" <?php echo ($data['product_type'] == 2) ? 'selected' : '' ?>>Nổi bật
                                </option>
                                <option value="3" <?php echo ($data['product_type'] == 3) ? 'selected' : '' ?>>Xem nhiều
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label>Trạng thái</label>
                            <select class="form-control" name="product_active">
                                <option value="1" <?php echo ($data['product_active'] == 1) ? 'selected' : '' ?>>Kích hoạt
                                </option>
                                <option value="2" <?php echo ($data['product_active'] == 2) ? 'selected' : '' ?>>Chưa kích
                                    hoạt
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Kiểu sản phẩm</label>
                            <select class="form-control" name="product_type2">
                                <option value="1" <?php echo ($data['product_type2'] == 1) ? 'selected' : '' ?>>Còn hàng
                                </option>
                                <option value="2" <?php echo ($data['product_type2'] == 2) ? 'selected' : '' ?>>Chờ hàng
                                </option>
                                <option value="3" <?php echo ($data['product_type2'] == 3) ? 'selected' : '' ?>>Hết hàng
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="thumbnail">
                                    <img src="<?php echo $data['product_image']; ?>" class="img-responsive"/>
                                </a>
                            </div>
                        </div>
                        <div class="upload_image text-right">
                            <a href="javascript:void(0)" readonly="readonly" onclick="openKCFinder(product_image)"> <i class="far fa-image"></i></a>
                        </div>
                        <input type="text" name="product_image" class="form-control"
                               value="<?php echo $data['product_image']; ?>" id="product_image"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                    </div>
                    <div class="form-group">
                        <label>Album ảnh</label>
                        <div class="row">
                            <?php
                            $product_images = str_replace('|', ',', $data['product_images']);
                            $product_images = explode(',', $product_images);
                            foreach ($product_images as $productImages) {
                                if ($productImages != "") {
                                    ?>
                                        <div class="col-xs-3 text-center">
                                                <img src="<?php echo $productImages ?>" style="height:50px;" class="img-responsive"/>
                                        </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="upload_image text-right">
                            <a href="javascript:void(0)" readonly="readonly" onclick="openKCFinder2(product_images)"> <i class="far fa-image"></i></a>
                        </div>
                        <textarea rows="5" class="form-control" id="product_images" name="product_images" placeholder="Bấm vào đây để tải ảnh lên"><?php echo $data['product_images'] ?></textarea>
                    </div>

                    <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
</div>