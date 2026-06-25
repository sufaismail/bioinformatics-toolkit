<?php
$header = ""; $clean_sequence = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["fasta_data"])) {
    $lines = explode("\n", $_POST["fasta_data"]);
    foreach($lines as $line) {
        $line = trim($line);
        if (strpos($line, '>') === 0) {
            $header .= htmlspecialchars($line) . "<br>";
        } else {
            $clean_sequence .= strtoupper(preg_replace('/[^A-Za-z]/', '', $line));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>FASTA Parser</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 120px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; font-family: monospace; }
        input[type="submit"] { background: #16a085; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #16a085; margin-top: 20px; font-family: monospace; word-break: break-all; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>FASTA Header & Data Block Parsing File System</h2>
    <form method="post">
        <textarea name="fasta_data" placeholder=">Sequence_ID Description info here...&#10;ACTGAC..."></textarea>
        <input type="submit" value="Parse FASTA">
    </form>
    <?php if ($clean_sequence): ?>
        <div class="result">
            <strong>Parsed Header Records:</strong><br><span style="color:#2980b9"><?= $header ?></span><br>
            <strong>Isolated Sequence Block Data:</strong><br><?= $clean_sequence ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>