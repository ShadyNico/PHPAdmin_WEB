<?php
$title = "Dashboard";

$links = $db->query('SELECT * FROM links')->get();
$users = $db->query('SELECT * FROM users')->get();

$stats = calculate_dashboard_stats($links, $users);

require __DIR__ . '/../../resources/dashboard.template.php';
