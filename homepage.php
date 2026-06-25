<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioinformatics Toolkit</title>
    <style>
        :root {
            --bg-primary: #f4f7f9;
            --primary-color: #2c3e50; /* Elegant deep slate */
            --accent-color: #16a085;  /* Clean mint/teal */
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --text-color: #34495e;    /* Soft readable dark gray */
            --text-secondary: #7f8c8d; /* Muted gray for subtitles */
            --tooltip-bg: #2c3e50;
        }

        body {
            font-family: '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            /* Elegant light gradient with a subtle scientific mesh/grid texture */
            background: linear-gradient(135deg, #f5f7fa 0%, #e4ecf5 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            padding: 110px 20px 40px 20px; /* Padding for fixed top bar */
            color: var(--text-color);
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        /* Top Bar Styling */
        .top-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 65px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .nav-logo {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-item {
            position: relative;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            padding: 10px 0;
            transition: color 0.2s ease;
        }

        .nav-item:hover {
            color: var(--accent-color);
        }

        /* Dropdown Menu for Basic Tools */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 8px;
            width: 220px;
            padding: 8px 0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            opacity: 0;
            pointer-events: none;
            transition: all 0.25s ease;
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            color: var(--text-color);
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s, color 0.2s;
        }

        .dropdown-menu a:hover {
            background: #f8fafc;
            color: var(--accent-color);
        }

        h1.main-title {
            text-align: center;
            color: var(--primary-color);
            font-size: 2.4rem;
            margin-bottom: 5px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .subtitle {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 45px;
            font-size: 1.05rem;
            font-weight: 400;
        }

        /* Responsive Grid Layout */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tool-link {
            text-decoration: none;
            position: relative;
        }

        /* Elegant Light Card Style */
        .tool-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            padding: 35px 20px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.215, 0.610, 0.355, 1);
            height: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.01);
        }

        .graphic-container {
            width: 65px;
            height: 65px;
            margin-bottom: 20px;
            transition: transform 0.25s ease;
        }

        .graphic-container svg {
            width: 100%;
            height: 100%;
        }

        .tool-name {
            font-weight: 600;
            font-size: 1.05rem;
            color: var(--primary-color);
            transition: color 0.2s ease;
        }

        /* Hover Transitions */
        .tool-link:hover .tool-card {
            transform: translateY(-4px);
            border-color: #cbd5e1;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.04);
            background: #ffffff;
        }

        .tool-link:hover .graphic-container {
            transform: scale(1.06);
        }

        .tool-link:hover .tool-name {
            color: var(--accent-color);
        }

        /* Elegant Hover Tooltips */
        .tool-link::after {
            content: attr(data-description);
            position: absolute;
            bottom: 108%;
            left: 50%;
            transform: translateX(-50%) translateY(8px);
            background: var(--tooltip-bg);
            color: #ffffff;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            width: 220px;
            text-align: center;
            opacity: 0;
            pointer-events: none;
            transition: all 0.2s ease;
            z-index: 10;
            line-height: 1.4;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .tool-link:hover::after {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* About Section Full-screen Modal overlay */
        .about-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(44, 62, 80, 0.4);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: 200;
            padding: 40px;
            overflow-y: auto;
        }

        .about-modal:target {
            display: block;
        }

        .modal-content {
            max-width: 850px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 40px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .close-btn {
            position: absolute;
            top: 25px;
            right: 30px;
            color: var(--text-secondary);
            font-size: 1.8rem;
            text-decoration: none;
            font-weight: 300;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: var(--primary-color);
        }

        .about-tool-item {
            margin-bottom: 25px;
            border-left: 3px solid var(--accent-color);
            padding-left: 15px;
        }

        .about-tool-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .about-tool-desc {
            color: var(--text-color);
            font-size: 0.95rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <?php
    // Color-tweaked Vector Graphics for Light Theme Compatibility
    $tools = [
        "Transcription" => [
            "page" => "transcription.php", 
            "desc" => "Convert double-stranded DNA templates into single-stranded RNA transcripts.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M16 12v40M48 12v40M16 20h32M16 32h32M16 44h32" stroke="#34495e" stroke-width="3.5" stroke-linecap="round" opacity="0.3"/><path d="M16 20h32M16 32h32" stroke="#16a085" stroke-width="3.5" stroke-linecap="round"/><path d="M28 16l6 4-6 4M28 28l6 4-6 4" stroke="#e67e22" stroke-width="2.5" fill="none" stroke-linecap="round"/></svg>',
            "working" => "Uses an algorithmic matching matrix to scan input DNA nucleotide sequences string-by-string. It replaces every Thymine (T) molecule base structural profile element cleanly with Uracil (U) while maintaining programmatic matching structure."
        ],
        "Translation" => [
            "page" => "translation.php", 
            "desc" => "Decode mRNA strings into structured polypeptide amino acid chains.",
            "svg" => '<svg viewBox="0 0 64 64"><circle cx="16" cy="32" r="6" fill="#2980b9"/><circle cx="32" cy="32" r="6" fill="#e74c3c"/><circle cx="48" cy="32" r="6" fill="#16a085"/><path d="M22 32h4M38 32h4" stroke="#95a5a6" stroke-width="2.5"/></svg>',
            "working" => "Parses mRNA strings into discrete three-letter units called triplets or codons. It sequentially cross-references these against standard genetic map structures (or custom expression variants) to generate the final single-letter or three-letter IUPAC protein chain sequence."
        ],
        "GC Counter" => [
            "page" => "gc.php", 
            "desc" => "Calculate the specific percentage density of Guanine and Cytosine bases.",
            "svg" => '<svg viewBox="0 0 64 64"><circle cx="32" cy="32" r="22" fill="none" stroke="#e2e8f0" stroke-width="7"/><circle cx="32" cy="32" r="22" fill="none" stroke="#2980b9" stroke-width="7" stroke-dasharray="90 150" stroke-dashoffset="25" stroke-linecap="round"/></svg>',
            "working" => "Executes string profile analysis isolating the exact instance counts of both G and C relative to total sequence character length. Critical for identifying thermal stability profiles and chromosomal stability maps."
        ],
        "AT Counter" => [
            "page" => "at.php", 
            "desc" => "Evaluate overall Adenine and Thymine ratios inside the target sequence.",
            "svg" => '<svg viewBox="0 0 64 64"><rect x="14" y="34" width="14" height="16" fill="#16a085" rx="2"/><rect x="36" y="14" width="14" height="36" fill="#f39c12" rx="2"/></svg>',
            "working" => "Isolates frequency patterns for Adenine and Thymine bases. Tracking AT concentrations highlights critical regulatory segments, promoters, and structural origin regions within complex genomic records."
        ],
        "Motif Finder" => [
            "page" => "motif.php", 
            "desc" => "Scan and identify recurring sequence motifs or consensus patterns.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M8 32h48" stroke="#bdc3c7" stroke-width="3"/><rect x="22" y="20" width="18" height="24" fill="none" stroke="#e67e22" stroke-width="3" rx="2"/><circle cx="44" cy="24" r="7" fill="none" stroke="#2980b9" stroke-width="3"/><path d="M49 29l6 6" stroke="#2980b9" stroke-width="3" stroke-linecap="round"/></svg>',
            "working" => "Employs explicit regex matching parameters or probabilistic frequency weight matrices to search strings for short, conserved, biological functional marker patterns across sequences."
        ],
        "ORF Finder" => [
            "page" => "orf.php", 
            "desc" => "Locate uninterrupted Open Reading Frames between Start and Stop codons.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M8 24h48M8 40h48" stroke="#b2bec3" stroke-width="2" stroke-linecap="round"/><path d="M22 24h22" stroke="#16a085" stroke-width="5" stroke-linecap="round"/></svg>',
            "working" => "Evaluates strings across all six possible frame alignments (3 forward, 3 reverse) to pinpoint contiguous blocks running from an ATG start signal to an explicit termination marker (TAA, TAG, TGA)."
        ],
        "Pairwise Alignment" => [
            "page" => "alignment.php", 
            "desc" => "Align two sequence strings to evaluate structural and evolutionary identities.",
            "svg" => '<svg viewBox="0 0 64 64"><text x="12" y="26" fill="#2c3e50" font-family="monospace" font-weight="bold" font-size="15">A-T-G</text><text x="12" y="48" fill="#16a085" font-family="monospace" font-weight="bold" font-size="15">A-C-G</text><path d="M18 31v2M48 31v2" stroke="#7f8c8d" stroke-width="2.5" stroke-linecap="round"/></svg>',
            "working" => "Uses dynamic programming frameworks (such as Needleman-Wunsch for global arrays or Smith-Waterman for local regions) to establish optimal index matches, inserts, and scoring matrices."
        ],
        "Dot Plot" => [
            "page" => "dotplot.php", 
            "desc" => "Generate matrix visualizations to discover insertion/deletion variations.",
            "svg" => '<svg viewBox="0 0 64 64"><rect x="14" y="14" width="36" height="36" fill="none" stroke="#34495e" stroke-width="2.5" rx="3"/><circle cx="23" cy="41" r="3.5" fill="#e74c3c"/><circle cx="32" cy="32" r="3.5" fill="#16a085"/><circle cx="41" cy="23" r="3.5" fill="#2980b9"/></svg>',
            "working" => "Constructs an 2D coordinate array canvas grid mapping Sequence 1 against Sequence 2. Matching elements print distinctive coordinates, clearly revealing tracking shifts, deletions, loops, or direct chromosomal inversions."
        ],
        "FASTA Upload" => [
            "page" => "fasta.php", 
            "desc" => "Load and accurately execute parsing maps directly from standard text files.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M16 10h22l10 10v34H16z" fill="none" stroke="#34495e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><path d="M24 26l5 4-5 4" fill="none" stroke="#16a085" stroke-width="2.5" stroke-linecap="round"/><path d="M34 30h8" stroke="#16a085" stroke-width="2.5" stroke-linecap="round"/></svg>',
            "working" => "Strips away descriptor text headers starting with the '>' identifier, normalizes trailing whitespaces, and structuralizes raw nucleotide or peptide string blocks into index arrays ready for processing downstream."
        ],
        "Reverse Complement" => [
            "page" => "reverse complement.php", 
            "desc" => "Invert sequence vectors while converting matching base pairs instantly.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M16 24h32M48 40h-32" stroke="#2980b9" stroke-width="3" fill="none" stroke-linecap="round"/><path d="M42 18l6 6-6 6M22 34l-6 6 6 6" fill="none" stroke="#16a085" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            "working" => "Reverses the direction of the text string from 3'-5' orientation back to 5'-3' rules, instantly converting each complementary base (A to T, C to G, and vice-versa)."
        ],
        "Restriction Sites" => [
            "page" => "restriction.php", 
            "desc" => "Map specific targeted restriction endonuclease recognition cuts.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M8 32h48" stroke="#2980b9" stroke-width="3.5" stroke-dasharray="6 4"/><path d="M32 12v14m0 8v16" stroke="#e74c3c" stroke-width="2.5"/><path d="M25 12l14 12M39 12l-14 12" stroke="#34495e" stroke-width="2" stroke-linecap="round"/></svg>',
            "working" => "Cross-analyzes input DNA text fields against database vectors of known palindromic enzyme target sites (like EcoRI or HindIII) to isolate exact coordinate cut junctions."
        ],
        "Protein MW" => [
            "page" => "protein mw.php", 
            "desc" => "Calculate global structural Dalton mass units for protein models.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M12 48h40M32 18v30" stroke="#34495e" stroke-width="3" stroke-linecap="round"/><path d="M20 26l12-9 12 9" fill="none" stroke="#f39c12" stroke-width="2.5" stroke-linecap="round"/></svg>',
            "working" => "Totals the specific isotropic molecular weights of every individual amino acid molecule in the peptide string, factoring out an H2O molecule for every peptide bond established."
        ],
        "Codon Usage" => [
            "page" => "codon usage.php", 
            "desc" => "Review and compile statistical codon frequency calculation tables.",
            "svg" => '<svg viewBox="0 0 64 64"><rect x="14" y="14" width="15" height="15" fill="#2980b9" opacity="0.7" rx="1"/><rect x="35" y="14" width="15" height="15" fill="#16a085" opacity="0.8" rx="1"/><rect x="14" y="35" width="15" height="15" fill="#e74c3c" opacity="0.7" rx="1"/><rect x="35" y="35" width="15" height="15" fill="#bdc3c7" rx="1"/></svg>',
            "working" => "Measures codon bias traits within a coding sequence by displaying relative synonymous codon usage rates (RSCU), showing which configurations appear most frequently."
        ],
        "BLAST Search" => [
            "page" => "blast.php", 
            "desc" => "Query global biological index servers for high-similarity alignments.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M36 12L20 36h14L28 54l20-26H34z" fill="#f1c40f"/></svg>',
            "working" => "Breaks input query arrays down into smaller structural words, executing rapid heuristic scans against database repositories to identify statistical match indices."
        ],
        "Sequence Logo" => [
            "page" => "logo.php", 
            "desc" => "Generate conservation graphs measuring local dynamic bits metrics.",
            "svg" => '<svg viewBox="0 0 64 64"><text x="12" y="52" fill="#2980b9" font-weight="bold" font-size="40" font-family="sans-serif">A</text><text x="36" y="52" fill="#e74c3c" font-weight="bold" font-size="24" font-family="sans-serif">G</text><text x="36" y="34" fill="#16a085" font-weight="bold" font-size="20" font-family="sans-serif">T</text></svg>',
            "working" => "Computes Shannon entropy tracking vectors at each aligned index row. It translates these metrics visually into text characters whose physical height corresponds to their information score value."
        ],
        "Phylogenetic Tree" => [
            "page" => "phylo.php", 
            "desc" => "Reconstruct and chart clear evolutionary lineages and relationships.",
            "svg" => '<svg viewBox="0 0 64 64"><path d="M12 16h16v16H12M28 24h20M28 48h12M40 40h12" fill="none" stroke="#34495e" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            "working" => "Calculates genetic distance indexes across datasets to build evolutionary branch networks using clustering models like Neighbor-Joining or Maximum Likelihood."
        ]
    ];
    ?>

    <div class="top-navbar">
        <div class="nav-logo">🧬 BIOINFORMATICS SUITE</div>
        <div class="nav-links">
            <div class="nav-item">
                BASIC TOOLS ▾
                <div class="dropdown-menu">
                    <?php
                    foreach($tools as $name => $data) {
                        echo "<a href='#" . urlencode($name) . "'>" . htmlspecialchars($name) . "</a>";
                    }
                    ?>
                </div>
            </div>
            <a href="#aboutSection" class="nav-item">ABOUT THE TOOLS</a>
        </div>
    </div>

    <h1 class="main-title">Bioinformatics Toolkit</h1>
    <div class="subtitle">Computational Molecular Biology & Sequence Analysis Suite</div>

    <div class="grid-container">
    <?php
    foreach($tools as $name => $data) {
        $page = htmlspecialchars($data['page']);
        $desc = htmlspecialchars($data['desc']);
        $name_esc = htmlspecialchars($name);

        echo "
        <a href='{$page}' class='tool-link' id='" . urlencode($name) . "' data-description='{$desc}'>
            <div class='tool-card'>
                <div class='graphic-container'>
                    {$data['svg']}
                </div>
                <div class='tool-name'>{$name_esc}</div>
            </div>
        </a>
        ";
    }
    ?>
    </div>

    <div id="aboutSection" class="about-modal">
        <div class="modal-content">
            <a href="#" class="close-btn">&times;</a>
            <h2 style="color: var(--primary-color); border-bottom: 1px solid var(--card-border); padding-bottom:15px; margin-top:0; font-weight:700;">
                Module Documentation & Functional Details
            </h2>
            
            <?php
            foreach($tools as $name => $data) {
                echo "
                <div class='about-tool-item'>
                    <div class='about-tool-title'>" . htmlspecialchars($name) . "</div>
                    <div class='about-tool-desc'>" . htmlspecialchars($data['working']) . "</div>
                </div>
                ";
            }
            ?>
        </div>
    </div>

</body>
</html>