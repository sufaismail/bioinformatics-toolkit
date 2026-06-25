<?php
$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sequence"])) {
    $rna = strtoupper(preg_replace('/[^A-Za-z]/', '', $_POST["sequence"]));
    $rna = str_replace("T", "U", $rna); // Ensure it's RNA
    
    $codon_table = [
        "UUU"=>"F", "UUC"=>"F", "UUA"=>"L", "UUG"=>"L", "UCU"=>"S", "UCC"=>"S", "UCA"=>"S", "UCG"=>"S",
        "UAU"=>"Y", "UAC"=>"Y", "UAA"=>"STOP", "UAG"=>"STOP", "UGU"=>"C", "UGC"=>"C", "UGA"=>"STOP", "UGG"=>"W",
        "CUU"=>"L", "CUC"=>"L", "CUA"=>"L", "CUG"=>"L", "CCU"=>"P", "CCC"=>"P", "CCA"=>"P", "CCG"=>"P",
        "CAU"=>"H", "CAC"=>"H", "CAA"=>"Q", "CAG"=>"Q", "CGU"=>"R", "CGC"=>"R", "CGA"=>"R", "CGG"=>"R",
        "AUU"=>"I", "AUC"=>"I", "AUA"=>"I", "AUG"=>"M", "ACU"=>"T", "ACC"=>"T", "ACA"=>"T", "ACG"=>"T",
        "AAU"=>"N", "AAC"=>"N", "AAA"=>"K", "AAG"=>"K", "AGU"=>"S", "AGC"=>"S", "AGA"=>"R", "AGG"=>"R",
        "GUU"=>"V", "GUC"=>"V", "GUA"=>"V", "GUG"=>"V", "GCU"=>"A", "GCC"=>"A", "GCA"=>"A", "GCG"=>"A",
        "GAU"=>"D", "GAC"=>"D", "GAA"=>"E", "GAG"=>"E", "GGU"=>"G", "GGC"=>"G", "GGA"=>"G", "GGG"=>"G"
    ];
    
    $protein = [];
    for ($i = 0; $i < strlen($rna) - 2; $i += 3) {
        $codon = substr($rna, $i, 3);
        if (isset($codon_table[$codon])) {
            if ($codon_table[$codon] == "STOP") break;
            $protein[] = $codon_table[$codon];
        }
    }
    $result = implode("", $protein);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>RNA Translation</title>
    <link rel="stylesheet" href="style.css"> <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 100px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; font-family: monospace; }
        input[type="submit"] { background: #2980b9; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .result { background: #f8fafc; padding: 15px; border-left: 4px solid #2980b9; margin-top: 20px; word-break: break-all; font-family: monospace; }
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>RNA to Protein Translation</h2>
    <form method="post">
        <label>Enter RNA or DNA Sequence:</label>
        <textarea name="sequence" placeholder="AUG..."><?= isset($_POST["sequence"]) ? htmlspecialchars($_POST["sequence"]) : "" ?></textarea>
        <input type="submit" value="Translate">
    </form>
    <?php if ($result): ?>
        <div class="result"><strong>Amino Acid Chain:</strong><br><?= $result ?></div>
    <?php endif; ?>
</div>
</body>
</html>