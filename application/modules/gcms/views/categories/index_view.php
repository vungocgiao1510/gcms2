<h1 class="title_index"><?php echo $title; ?></h1>
<div class="col-md-12">
    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-warning" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
</div>
<div class="col-md-4 show_categories show_categories_noactive">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span>Chuyên mục chưa kích hoạt</span>
            </h3>
        </div>
        <div class="panel-body">
            <?php
            if ($data2) {
                $cate_type2 = "";
                foreach ($data2 as $categorie_noactive) {
                    if ($categorie_noactive['cate_type'] == 1) {
                        $cate_type2 = "Gian hàng";
                    } elseif ($categorie_noactive['cate_type'] == 2) {
                        $cate_type2 = "Blog";
                    } else {
                        $cate_type2 = "Trang";
                    }
                    echo "<ul>";
                    echo "<li>
<div class='menu_border'>
<a class='cate_name'>$categorie_noactive[cate_name]</a> - <a style='color:red' href='" . base_url() . "gcms/categories/active_menu/" . $categorie_noactive['cate_id'] . "/".$type_list['id']."' class=''>Kích hoạt</a>
 - <span class='cate_type'>" . $cate_type2 . "</span>
<a class='pull-right' href='" . base_url() . "gcms/categories/delete/" . $categorie_noactive['cate_id'] . "' onclick='return ConfirmDelete();'><i class='fas fa-trash-alt'></i></a>

</div>
</li>";
                    echo "</ul>";
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="col-md-8 show_categories">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            showCategories($data,$type_list['id']);
            ?>
        </div>
    </div>
</div>

<a href="<?php echo base_url() . "gcms/categories/add"; ?>" class="btn btn-primary button_submit">Thêm mới</a>
