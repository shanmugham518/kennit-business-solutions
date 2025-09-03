<?php
require_once __DIR__ . '/db.php';
$res = $conn->query("SELECT slug,title,content_html,section_images FROM pages ORDER BY id ASC");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>KENN IT - Graduate Hiring Program</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header class="header"><div class="container"><h1>KENN IT Business Solutions</h1><p>Delivering Quality Workforce Solutions</p></div></header>
  <main class="container">
    <?php if ($res && $res->num_rows>0): while($row=$res->fetch_assoc()): ?>
      <section id="<?php echo htmlspecialchars($row['slug']); ?>">
  <!-- <h2><?php echo htmlspecialchars($row['title']); ?></h2> -->
  <?php $imgs = json_decode($row['section_images'],true); if($imgs): foreach($imgs as $img): ?>
    <img src="assets/images/<?php echo htmlspecialchars($img); ?>" alt="">
  <?php endforeach; endif; ?>
</section>
    <?php endwhile; else: ?>
      <div class="notice"><p>No content found. Import sql/kennit_db.sql into your MySQL.</p></div>
    <?php endif; ?>
  </main>
  <div class="footer">© <?php echo date('Y'); ?> KENN IT Business Solutions</div>
</body>
</html>