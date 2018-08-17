<div class="container-fluid">
    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <div class="col-md-4">
        <div class="panel panel-default show_categories">
            <div class="panel-heading">
                <h1 class="panel-title">Thuộc tính chưa kích hoạt</h1>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    callAttrProduct($data2);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default show_categories">
            <div class="panel-heading">
                <h1 class="panel-title"><?php echo $title; ?></h1>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    callAttrProduct($data);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="<?php echo base_url() . "gcms/attrproduct/add" ?>" class=" btn btn-primary button_submit">Thêm mới</a>


