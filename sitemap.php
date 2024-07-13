<?php header('Content-type: application/xml; charset="utf-8"', true); ?>

<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <?php
    $tarih = date("Y-m-d");

    // Include necessary files
    $paths = [
        "common/methods/info.php",
        "../common/methods/info.php",
        "../../common/methods/info.php"
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            require_once str_replace('methods', 'db', $path);
            break;
        }
    }
    ?>

    <url>
        <loc><?php echo baseUrlFront(); ?></loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <?php
    // Fetch services
    $sql = 'SELECT * FROM tblhizmet WHERE durum = 1';
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <url>
                <loc><?php echo htmlspecialchars($row['link']); ?></loc>
                <lastmod><?php echo $tarih; ?></lastmod>
                <changefreq>daily</changefreq>
                <priority>1.00</priority>
            </url>
        <?php }
    } else {
        // Handle query error
        error_log("Database query failed: " . mysqli_error($conn));
    }

    // Fetch projects
    $projects = getAllData("projects", "", $db);

    foreach ($projects as $project) { ?>
        <url>
            <loc><?php echo baseUrlFront() . "detail/?seo=" . htmlspecialchars($project['seoTitle']); ?></loc>
            <lastmod><?php echo $tarih; ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
        <url>
            <loc><?php echo baseUrlFront() . "detail/?seo=" . htmlspecialchars($project['seoTitleE']); ?></loc>
            <lastmod><?php echo $tarih; ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
    <?php } ?>
</urlset>
