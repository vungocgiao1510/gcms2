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
                                       placeholder="Tên tài khoản.." onkeyup="ChangeToSlug();" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Chuỗi đường dẫn tĩnh</label>
                                <input type="text" name="product_slug" class="form-control" id="slug"
                                       placeholder="Liên kết.."/>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input type="text" name="product_price" class="form-control" id="slug"
                                       placeholder="Giá gốc.."/>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Giá giảm</label>
                                <input type="text" name="product_promotion" class="form-control" id="slug"
                                       placeholder="Giá giảm.."/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control" name="product_info" id="" rows="3"
                                          placeholder="Mô tả.."></textarea>
                                <script>
                                    CKEDITOR.replace('product_info');
                                </script>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="product_content" id="content" rows="3"
                                          placeholder="Nội dung.."></textarea>
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
                            <label>Tiêu đề SEO</label>
                            <input type="text" name="product_title" class="form-control"
                                   placeholder="Tên tiêu đề.."/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả SEO</label>
                            <textarea class="form-control" name="product_description" id="" rows="3"
                                      placeholder="Mô tả.."></textarea>
                        </div>
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
                        callMenuPN($listMenu);
                        ?>
                    </select>
                    <label for="">Primary Menu</label>
                    <select class="form-control" name="primary_id">
                        <option value="0">Không chọn</option>
                        <?php
                        callMenuPN($listMenu);
                        ?>
                    </select>
                    <div class="attr_list">
                        <a data-toggle="collapse" data-parent="#accordion" href="#attr_list">Bấm vào đây để chọn thuộc
                            tính</a>
                        <div class="panel-collapse collapse" id="attr_list">
                            <?php
                            callAttrCB3($listAttr);
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label>Mã sản phẩm</label>
                            <input type="text" name="product_code" class="form-control" id=""
                                   placeholder="Mã sản phẩm.."/>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="product_type">
                                <option value="0">Bình thường</option>
                                <option value="1">Bán chạy</option>
                                <option value="2">Nổi bật</option>
                                <option value="3">Xem nhiều</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <label>Trạng thái</label>
                            <select class="form-control" name="product_active">
                                <option value="1">Kích hoạt</option>
                                <option value="2">Chưa kích hoạt</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Kiểu sản phẩm</label>
                            <select class="form-control" name="product_type2">
                                <option value="1">Còn hàng</option>
                                <option value="2">Chờ hàng</option>
                                <option value="3">Hết hàng</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="upload_image text-right">
                            <a href="javascript:void(0)" readonly="readonly" onclick="openKCFinder(product_image)"> <i class="far fa-image"></i></a>
                        </div>
                        <input type="text" name="product_image" id="product_image" class="form-control"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                    </div>
                    <div class="form-group">
                        <label>Album ảnh</label>
                        <div class="upload_image text-right">
                            <a href="javascript:void(0)" readonly="readonly" onclick="openKCFinder2(product_images)"> <i class="far fa-image"></i></a>
                        </div>
                        <input type="text" name="product_images" id="product_images" class="form-control"
                               placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                    </div>
                    <button class="btn btn-primary button_submit" name="ok">Cập nhật</button>
                </div>
            </div>
        </div>

</div>
</form>
</div>