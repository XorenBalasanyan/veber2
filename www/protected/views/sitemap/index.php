<?php
header('Content-Type: application/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>'
?>

<urlset
		xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
		xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
				http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
        	<loc><?php echo $host; ?></loc>
        	<changefreq>daily</changefreq>
		<priority>1</priority>
	</url>
    <?php foreach ($items as $item): ?>
    <url>
        <loc><?php echo $host; ?><?php echo $item->getUrl(); ?></loc>
        <changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
<?php endforeach; ?>

</urlset>
