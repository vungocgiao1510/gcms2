<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><?php echo $title; ?></h1>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <?php if (isset($success)): ?>
                <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover table-bordered"
                ">
                <tr>
                    <th>STT</th>
                    <th>Nhóm chức năng</th>
                    <th>Cấp độ</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php
                if ($data):
                    $stt = 0;
                    foreach ($data as $value):
                        $stt++;
                        ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo ($value['level'] == 1) ? "<font color='red'>Adminstrator</font>" : "Member"; ?></td>
                            <td><a href="<?php echo base_url() . "gcms/permissions/edit/" . $value['group_id']; ?>"><i
                                            class="fas fa-edit"></i></a></td>
                            <td><a href="<?php echo base_url() . "gcms/permissions/delete/" . $value['group_id']; ?>" onclick="ConfirmDelete();"><i
                                            class="fas fa-trash-alt"></i></a></td>
                        </tr>

                    <?php
                    endforeach;
                endif;
                ?>
                </table>
            </div>
            <div class="text-center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    </div>
</div>

<a href="<?php echo base_url()."gcms/permissions/add" ?>" class=" btn btn-primary button_submit">Thêm mới</a>


