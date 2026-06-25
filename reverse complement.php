<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    // Reverse it
    $reversed = strrev($seq);
    // Complement it using strtr map pairs logic matching structures
    $result = strtr($reversed, "ATCGN", "TAGCN");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Reverse Complement</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #2980b9; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #2980b9; margin-top: 20px; word-break: break-all; font-family: monospace; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>DNA Reverse Complement Converter</h2>
    <form method="post">
        <textarea name="sequence" placeholder="ATCG..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Build Reverse Complement Strand">
    </form>
    <?php if ($result): ?>
        <div class="result"><strong>5' to 3' Complement String Output:</strong><br><?= $result ?></div>
    <?php endif; ?>
</div>
</body>
</html>