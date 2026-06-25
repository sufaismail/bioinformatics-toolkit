<?php
$mock_results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["query"])) {
    $q = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["query"]));
    // Simulating sequence alignment homology search outcomes directly via server indices mock structures
    $mock_results[] = ["id" => "NC_000001.11", "desc" => "Homo sapiens chromosome 1 genomic sequence reference model", "score" => 2450, "identity" => "99.2%"];
    $mock_results[] = ["id" => "NM_001304717.2", "desc" => "Mus musculus targeted functional genetic transcript sequence records", "score" => 1120, "identity" => "84.7%"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Mock BLAST Search Engine</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 650px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 80px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #2c3e50; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .blast-row { background: #f8fafc; border:1px solid #e2e8f0; padding:12px; margin-top:10px; border-radius:6px; font-size:0.9rem;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Local Homology Blast Scanning Suite</h2>
    <form method="post">
        <textarea name="query" placeholder="Enter query string data parameters..."></textarea>
        <input type="submit" value="Execute Database BLAST Alignment Scan">
    </form>
    <?php if (count($mock_results) > 0): ?>
        <h3>Top Direct Repository Hits Found:</h3>
        <?php foreach($mock_results as $hit): ?>
            <div class="blast-row">
                <strong>Accession Model ID:</strong> <?= $hit["id"] ?> | <strong>Max Score Rank:</strong> <?= $hit["score"] ?> | <strong>Identity Match:</strong> <?= $hit["identity"] ?><br>
                <span style="color:#7f8c8d;"><?= $hit["desc"] ?></span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>