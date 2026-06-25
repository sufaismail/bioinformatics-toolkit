<?php
$matches = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"]) && !empty($_POST["motif"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    $motif = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["motif"]));
    
    $offset = 0;
    while (($pos = strpos($seq, $motif, $offset)) !== false) {
        $matches[] = $pos + 1; // 1-based biological indexing
        $offset = $pos + 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Motif Finder</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 80px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="text"] { width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #cbd5e1; border-radius: 6px; }
        input[type="submit"] { background: #e67e22; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #e67e22; margin-top: 20px; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Sequence Motif Finder</h2>
    <form method="post">
        <label>Target Target Sequence:</label>
        <textarea name="sequence" placeholder="ATCG..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <label>Motif Substring Target to Locate:</label>
        <input type="text" name="motif" placeholder="e.g. TATA" value="<?= isset($_POST["motif"]) ? htmlspecialchars($_POST["motif"]) : "" ?>">
        <input type="submit" value="Find Motifs">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <strong>Matches Discovered at Base Coordinates:</strong><br>
            <?= count($matches) > 0 ? implode(", ", $matches) : "No exact sequence matches verified." ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>