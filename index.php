<?php
require __DIR__.'/config/config.php';
$notices = db()->query("SELECT * FROM notices WHERE status='published' ORDER BY notice_date DESC, id DESC LIMIT 6")->fetchAll();
$courses = db()->query("SELECT * FROM courses WHERE status='active' ORDER BY school,name LIMIT 12")->fetchAll();
$events = db()->query("SELECT * FROM events WHERE status='published' ORDER BY event_date ASC LIMIT 6")->fetchAll();
?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Gautam Buddha University</title>
<link rel="stylesheet" href="assets/style.css">
</head><body>
<header class="hero"><nav><b>GBU</b><div><a href="#about">About</a><a href="#schools">Schools</a><a href="#notices">Notices</a><a href="#events">Events</a><a href="admin/login.php" class="btn">Admin Login</a></div></nav>
<div class="heroText"><span class="pill">ADMISSIONS 2026–27</span><h1>Learn. Innovate.<br><em>Transform the Future.</em></h1><p>A modern university portal for Gautam Buddha University.</p><a class="btn gold" href="#schools">Explore Programmes</a></div></header>
<section class="stats"><div><b>455+</b><span>Acres Campus</span></div><div><b>152</b><span>Programmes</span></div><div><b>8+</b><span>Academic Schools</span></div><div><b>24×7</b><span>Student Environment</span></div></section>
<section id="about"><h2>About GBU</h2><p class="lead">Academic excellence, research, innovation and holistic development.</p></section>
<section id="schools"><h2>Programmes</h2><div class="grid"><?php foreach($courses as $c): ?><article><small><?=e($c['school'])?></small><h3><?=e($c['name'])?></h3><p><?=e($c['description'])?></p><span><?=e($c['level'])?></span></article><?php endforeach; ?></div></section>
<section id="notices"><h2>Latest Notices</h2><div class="list"><?php foreach($notices as $n): ?><article><b><?=e($n['title'])?></b><small><?=e($n['notice_date'])?></small><p><?=e($n['description'])?></p></article><?php endforeach; ?></div></section>
<section id="events"><h2>Events</h2><div class="grid"><?php foreach($events as $ev): ?><article><small><?=e($ev['event_date'])?> • <?=e($ev['venue'])?></small><h3><?=e($ev['title'])?></h3><p><?=e($ev['description'])?></p></article><?php endforeach; ?></div></section>
<footer>© <?=date('Y')?> Gautam Buddha University • Website Management Portal</footer>
</body></html>