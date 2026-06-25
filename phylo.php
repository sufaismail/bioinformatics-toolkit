<?php
$render = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["tree_data"])) {
    $render = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Phylogenetic Tree</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 80px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #34495e; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .tree-box { margin-top:20px; background:#f8fafc; border:1px dashed #cbd5e1; padding:20px; font-family:monospace; font-size:1.1rem; line-height:1.4;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Cladogram Phylogenetic Lineage Relationship Mapping</h2>
    <form method="post">
        <textarea name="tree_data" placeholder="Enter distance indexes matrix or species collection listing models..."></textarea>
        <input type="submit" value="Build Lineage Dendrogram Layout">
    </form>
    <?php if ($render): ?>
        <div class="tree-box">
            <strong>Reconstructed Cladogram Structure Output:</strong><br><br>
            &nbsp;&nbsp;+-- Ancestral Node Baseline Matrix Segment Map Track<br>
            &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;+-- Specimen Group Target Lineage A (Query Sequence Core Reference)<br>
            &nbsp;&nbsp;+---| <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+-- Specimen Group Target Lineage B (Homologous Match Profile Model)<br>
        </div>
    <?php endif; ?>
</div>
</body>
</html>