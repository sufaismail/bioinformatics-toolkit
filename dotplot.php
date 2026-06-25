<?php
$matrix = null; $s1 = ""; $s2 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seq1"]) && !empty($_POST["seq2"])) {
    $s1 = str_split(strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["seq1"])));
    $s2 = str_split(strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["seq2"])));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Dot Plot Matrix</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 60px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #34495e; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .plot-grid { margin-top: 20px; display: inline-block; font-family: monospace; line-height: 14px; letter-spacing: 4px; border: 1px solid #ccc; padding: 10px; background: #fafafa;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Dot Plot Matrix Generation</h2>
    <form method="post">
        <textarea name="seq1" placeholder="Sequence 1 (horizontal)..."><?= isset($_POST["seq1"]) ? htmlspecialchars($_POST["seq1"]) : "" ?></textarea>
        <textarea name="seq2" placeholder="Sequence 2 (vertical)..."><?= isset($_POST["seq2"]) ? htmlspecialchars($_POST["seq2"]) : "" ?></textarea>
        <input type="submit" value="Plot Comparison Grid">
    </form>
    
    <?php if ($s1 && $s2): ?>
        <h3>Visual Mapping Coordinates:</h3>
        <div class="plot-grid">
        <?php
        foreach($s2 as $row_char) {
            foreach($s1 as $col_char) {
                echo ($row_char === $col_char) ? "■" : "·";
            }
            echo "<br>";
        }
        ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>