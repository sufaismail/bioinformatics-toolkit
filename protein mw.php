<?php
$mw = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $seq = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    
    $weights = [
        'A'=>71.08, 'R'=>156.19, 'N'=>114.11, 'D'=>115.09, 'C'=>103.14, 'E'=>129.12, 'Q'=>128.13, 'G'=>57.05,
        'H'=>137.14, 'I'=>113.16, 'L'=>113.16, 'K'=>128.17, 'M'=>131.20, 'F'=>147.18, 'P'=>97.12, 'S'=>87.08,
        'T'=>101.11, 'W'=>186.21, 'Y'=>163.18, 'V'=>99.13
    ];
    
    for($i = 0; $i < strlen($seq); $i++) {
        if(isset($weights[$seq[$i]])) {
            $mw += $weights[$seq[$i]];
        }
    }
    if($mw > 0) $mw += 18.02; // Account for final binding water molecule additions index metric balance rules
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Protein MW Calculator</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #f39c12; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #f39c12; margin-top: 20px; font-size: 1.2rem;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Estimated Protein Molecular Mass Calculator</h2>
    <form method="post">
        <textarea name="sequence" placeholder="Paste pure single-letter peptide sequence chain (e.g. MSLLG...)..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Calculate Molecular Weight">
    </form>
    <?php if ($mw > 0): ?>
        <div class="result"><strong>Estimated Mass Output:</strong> <?= number_format($mw, 2) ?> Da (g/mol)</div>
    <?php endif; ?>
</div>
</body>
</html>