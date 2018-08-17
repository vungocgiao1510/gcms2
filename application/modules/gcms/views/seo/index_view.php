<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 width_medium_center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><?php echo $title; ?></h1>
                </div>
                <form action="" method="post">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#home" role="tab" data-toggle="tab">Trang Chủ</a></li>
                            <li><a href="#categories" role="tab" data-toggle="tab">Chuyên mục</a></li>
                            <li><a href="#news" role="tab" data-toggle="tab">Bài viết</a></li>
                            <li><a href="#products" role="tab" data-toggle="tab">Sản phẩm</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <div class="form-group">
                                    <label>Tiêu đề Trang Chủ</label>
                                    <input type="text" name="home_title" class="form-control"
                                           placeholder="Tên tiêu đề.." value="<?php echo $data['home_title']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Mô tả Trang Chủ</label>
                                    <textarea class="form-control" name="home_description" id="" rows="3"
                                              placeholder="Mô tả.."><?php echo $data['home_description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh hiển thị</label>
                                    <img src="<?php echo $data['home_image']; ?>" class="img-responsive">
                                    <input type="text" name="home_image" readonly="readonly" class="form-control"
                                           onclick="openKCFinder(this)"
                                           placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer" value="<?php echo $data['home_image']; ?>"/>
                                </div>
                            </div>
                            <div class="tab-pane" id="categories">
                                <p><span>{title} là tên chuyên mục</span></p>
                                <div class="form-group">
                                    <label>Tiêu đề chuyên mục</label>
                                    <input type="text" name="archive_title" class="form-control"
                                           placeholder="Tên tiêu đề.." value="<?php echo $data['archive_title']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả chuyên mục</label>
                                    <textarea class="form-control" name="archive_description" id="" rows="3"
                                              placeholder="Mô tả.."><?php echo $data['archive_description']; ?></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="news">
                                <p><span>{title} là tên bài viết</span></p>
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" name="post_title" class="form-control"
                                           placeholder="Tên tiêu đề.." value="<?php echo $data['post_title']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả bài viết</label>
                                    <textarea class="form-control" name="post_description" id="" rows="3"
                                              placeholder="Mô tả.."><?php echo $data['post_description']; ?></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="products">
                                <p><span>{title} là tên sản phẩm</span></p>
                                <div class="form-group">
                                    <label>Tiêu đề sản phẩm</label>
                                    <input type="text" name="product_title" class="form-control"
                                           placeholder="Tên tiêu đề.." value="<?php echo $data['product_title']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="product_description" id="" rows="3"
                                              placeholder="Mô tả.."><?php echo $data['product_description']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary pull-right" name="ok">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

</div>