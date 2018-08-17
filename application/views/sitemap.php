<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url(); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Site map -->
    <?php foreach ($category as $cate) { ?>
        <url>
            <loc><?php echo base_url() . $cate['cate_slug']; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <?php } ?>
    <?php foreach ($products as $product) { ?>
        <url>
            <loc><?php echo base_url() . $product['product_slug']; ?></loc>
            <lastmod><?php echo $product['update_time']; ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.5</priority>
        </url>
    <?php } ?>
</urlset>