<?php
$found_sites = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    
    // Sample collection configuration for localized testing site maps
    $enzymes = ["EcoRI" => "GAATTC", "HindIII" => "AAGCTT", "BamHI" => "GGATCC"];
    
    foreach($enzymes as $name => $site) {
        $offset = 0;
        while (($pos = strpos($seq, $site, $offset)) !== false) {
            $found_sites[] = "<strong>$name</strong> cuts at coordinate step position: " . ($pos + 1);
            $offset = $pos + 1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Restriction Mapper</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #e74c3c; margin-top: 20px; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Restriction Site Enzyme Mapping Engine</h2>
    <form method="post">
        <textarea name="sequence" placeholder="Paste target DNA vector string..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Scan Enzyme Matches">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <strong>Target Recognition Matches Identified:</strong><br><br>
            <?= count($found_sites) > 0 ? implode("<br>", $found_sites) : "No diagnostic recognition sites detected for basic standard models (EcoRI, HindIII, BamHI)." ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>