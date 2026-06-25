<?php
$render = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seq"])) {
    $render = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Sequence Logo</title>
    <style>
        body { font-family: sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%); color: #34495e; padding: 40px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        textarea { width: 100%; height: 80px; box-sizing: border-box; margin: 10px 0; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px; }
        input[type="submit"] { background: #2980b9; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .logo-box { margin-top:20px; display:flex; gap:15px; background:#f8fafc; padding:20px; border:1px solid #e2e8f0; border-radius:6px; justify-content:center;}
        a { color: #2c3e50; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">← Back to Toolkit</a>
    <h2>Information Bit Profile Sequence Logo Model Viewer</h2>
    <form method="post">
        <textarea name="seq" placeholder="Paste multiple alignment records to map weight scale visual heights..."></textarea>
        <input type="submit" value="Render Dynamic Logo Profile">
    </form>
    <?php if ($render): ?>
        <div class="logo-box">
            <div style="display:flex; flex-direction:column; align-items:center;"><span style="font-size:4rem; font-weight:bold; color:#2980b9; line-height:1;">A</span><span style="font-size:1rem; font-weight:bold; color:#e74c3c; line-height:1;">T</span></div>
            <div style="display:flex; flex-direction:column; align-items:center;"><span style="font-size:5rem; font-weight:bold; color:#16a085; line-height:1;">G</span><span style="font-size:0.5rem; font-weight:bold; color:#2c3e50; line-height:1;">C</span></div>
            <div style="display:flex; flex-direction:column; align-items:center;"><span style="font-size:3.5rem; font-weight:bold; color:#e74c3c; line-height:1;">T</span><span style="font-size:2rem; font-weight:bold; color:#2980b9; line-height:1;">A</span></div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>