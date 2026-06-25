<?php
$percentage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    $length = strlen($seq);
    if ($length > 0) {
        $a = substr_count($seq, 'A');
        $t = substr_count($seq, 'T');
        $percentage = round((($a + $t) / $length) * 100, 2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>AT Counter</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #f39c12; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #f39c12; margin-top: 20px; font-size: 1.2rem; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>AT Content Ratio Calculator</h2>
    <form method="post">
        <textarea name="sequence" placeholder="Paste sequence..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Calculate AT %">
    </form>
    <?php if ($percentage !== ""): ?>
        <div class="result"><strong>AT Ratio Content:</strong> <?= $percentage ?>%</div>
    <?php endif; ?>
</div>
</body>
</html>