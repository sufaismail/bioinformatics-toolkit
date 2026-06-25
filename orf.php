<?php
$orfs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    
    // Simplistic frame scanner for forward reading direction frames
    for ($frame = 0; $frame < 3; $frame++) {
        for ($i = $frame; $i < strlen($seq) - 2; $i += 3) {
            $codon = substr($seq, $i, 3);
            if ($codon == "ATG") { // Start Codon
                $current_orf = "ATG";
                for ($j = $i + 3; $j < strlen($seq) - 2; $j += 3) {
                    $next_codon = substr($seq, $j, 3);
                    $current_orf .= $next_codon;
                    if (in_array($next_codon, ["TAA", "TAG", "TGA"])) { // Stop codons
                        if (strlen($current_orf) >= 30) { // arbitrary length filter threshold
                            $orfs[] = "Frame " . ($frame + 1) . " (Pos " . ($i + 1) . "): " . $current_orf;
                        }
                        break;
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>ORF Finder</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #16a085; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #16a085; margin-top: 20px; font-family: monospace; font-size:0.9rem; max-height:250px; overflow-y:auto;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Open Reading Frame (ORF) Finder</h2>
    <form method="post">
        <textarea name="sequence" placeholder="Paste DNA sequence..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Find Valid ORFs">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <strong>Identified Open Reading Frames:</strong><br><br>
            <?php if (count($orfs) > 0): ?>
                <?php foreach($orfs as $o) echo htmlspecialchars($o) . "<br><br>"; ?>
            <?php else: ?>
                No long ORFs detected in forward reading frames.
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>