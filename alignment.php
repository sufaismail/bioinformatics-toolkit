<?php
$alignment_output = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seq1"]) && !empty($_POST["seq2"])) {
    $s1 = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["seq1"]));
    $s2 = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["seq2"]));
    
    // Quick basic Hamming alignment comparison mapping
    $len = min(strlen($s1), strlen($s2));
    $out1 = ""; $match_line = ""; $out2 = "";
    
    for($i = 0; $i < $len; $i++) {
        $out1 .= $s1[$i];
        $out2 .= $s2[$i];
        $match_line .= ($s1[$i] === $s2[$i]) ? "|" : ".";
    }
    $alignment_output = $out1 . "\n" . $match_line . "\n" . $out2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Pairwise Alignment</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 60px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; font-family: monospace; }
        input[type="submit"] { background: #2c3e50; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result pre { background: #f8fafc; padding: 15px; border-left: 4px solid #2c3e50; margin-top: 20px; font-family: monospace; font-size: 1.1rem; letter-spacing: 2px;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Pairwise Structural Identity Mapping</h2>
    <form method="post">
        <textarea name="seq1" placeholder="Sequence 1..."><?= isset($_POST["seq1"]) ? htmlspecialchars($_POST["seq1"]) : "" ?></textarea>
        <textarea name="seq2" placeholder="Sequence 2..."><?= isset($_POST["seq2"]) ? htmlspecialchars($_POST["seq2"]) : "" ?></textarea>
        <input type="submit" value="Align Sequences">
    </form>
    <?php if ($alignment_output): ?>
        <div class="result"><strong>Direct Matching Profile Matrix:</strong><pre><?= htmlspecialchars($alignment_output) ?></pre></div>
    <?php endif; ?>
</div>
</body>
</html>