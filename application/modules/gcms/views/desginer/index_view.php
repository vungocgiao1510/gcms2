<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="nav nav-pills nav-stacked nav nav-tabs" role="tablist">
                <li class="active"><a href="#global" role="tab" data-toggle="tab">Toàn Trang</a></li>
                <li><a href="#home" role="tab" data-toggle="tab">Trang Chủ</a></li>
                <li><a href="#contact" role="tab" data-toggle="tab">Liên hệ</a></li>
                <li><a href="#script" role="tab" data-toggle="tab">Mã nhúng</a></li>
            </ul>
        </div>
        <form action="" method="post">
            <div class="col-md-8 width_medium_center tab-content">
                <div class="tab-pane active" id="global">
                    <div class="panel panel-default">
                        <div class="panel-heading">Tiêu đề</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="text" name="global_title" class="form-control" value="<?php echo $data->global_title; ?>" placeholder="Tiêu đề trang chủ.."/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Mô tả</div>
                        <div class="panel-body">
                            <div class="form-group">
                            <textarea class="form-control" name="global_description" id="" rows="3"
                                      placeholder="Mô tả.."><?php echo $data->global_description; ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">Logo</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <img src="<?php echo $data->global_logo; ?>" alt="" width="200">
                                <input type="text" name="global_logo" readonly="readonly" class="form-control" value="<?php echo $data->global_logo; ?>"  onclick="openKCFinder(this)"
                                       placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Favicon</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <img src="<?php echo $data->global_favicon; ?>" alt="" width="200">
                                <input type="text" name="global_favicon" readonly="readonly" class="form-control" value="<?php echo $data->global_favicon; ?>"  onclick="openKCFinder(this)"
                                       placeholder="Bấm vào đây để lựa chọn hình ảnh.." style="cursor:pointer"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="home">
                    <div class="panel panel-default">
                        <div class="panel-heading">Trang chủ</div>
                        <div class="panel-body">
                           ...
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="contact">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin liên hệ</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Tên công ty</label>
                                <input type="text" name="contact_name" value="<?php echo $data->contact_name; ?>" class="form-control" id=""
                                       placeholder="Tên công ty.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Giới thiệu công ty</label>
                                <input type="text" name="contact_description" value="<?php echo $data->contact_description; ?>" class="form-control" id=""
                                       placeholder="Giới thiệu công ty.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="contact_phone" value="<?php echo $data->contact_phone; ?>" class="form-control" id=""
                                       placeholder="Số điện thoại.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Hotline</label>
                                <input type="text" name="contact_hotline" value="<?php echo $data->contact_hotline; ?>" class="form-control" id=""
                                       placeholder="Hotline.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Hotline 2</label>
                                <input type="text" name="contact_hotline2" value="<?php echo $data->contact_hotline2; ?>" class="form-control" id=""
                                       placeholder="Hotline2.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="contact_address" value="<?php echo $data->contact_address; ?>" class="form-control" id=""
                                       placeholder="Địa chỉ.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ 2</label>
                                <input type="text" name="contact_address2" value="<?php echo $data->contact_address2; ?>" class="form-control" id=""
                                       placeholder="Địa chỉ 2.."/>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="contact_email" value="<?php echo $data->contact_email; ?>" class="form-control" id=""
                                       placeholder="Email.."/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="script">

                    <div class="panel-group" id="script_web">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#script_web" href="#facebook_script">
                                        Mã nhúng Facebook
                                    </a>
                                </h4>
                            </div>
                            <div id="facebook_script" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group">
                                    <textarea class="form-control" name="facebook_script" id="" rows="10"
                                              placeholder="Mô tả.."><?php echo $data->facebook_script; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#script_web" href="#google_script">
                                        Mã nhúng Google
                                    </a>
                                </h4>
                            </div>
                            <div id="google_script" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                    <textarea class="form-control" name="google_script" id="" rows="10"
                                              placeholder="Mô tả.."><?php echo $data->google_script; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#script_web" href="#chat_script">
                                        Mã nhúng chat
                                    </a>
                                </h4>
                            </div>
                            <div id="chat_script" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                    <textarea class="form-control" name="chat_script" id="" rows="10"
                                              placeholder="Mô tả.."><?php echo $data->chat_script; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button name="ok" class="btn btn-primary pull-right">Cập nhật</button>
        </form>
    </div>
</div>

</div>