# 🧬 Bioinformatics Toolkit

A minimalist, responsive, and light-themed web suite featuring essential computational molecular biology and sequence analysis tools. Built cleanly using **HTML5, CSS3, and PHP**, this portal provides an intuitive playground to execute core sequence analysis workflows directly in your web browser.

---

## 🚀 Key Modules Included

* **DNA Transcription (`transcription.php`)** – Converts double-stranded DNA templates into single-stranded RNA transcripts by algorithmically substituting Thymine ($T$) with Uracil ($U$).
* **RNA Translation (`translation.php`)** – Parses mRNA strings into discrete three-letter codons to decode and synthesize organized polypeptide amino acid chains.
* **GC Counter (`gc.php`)** – Measures the exact percentage density of Guanine and Cytosine bases within a sequence fragment.
* **AT Counter (`at.php`)** – Evaluates the overall Adenine and Thymine ratios to isolate weaker double-hydrogen bonding concentrations.
* **Pairwise Alignment (`alignment.php`)** – Aligns two sequence strings side-by-side using an identity matching matrix to map sequence structural variations.

---

## 💡 How It Helps (Bioinformatics Applications)

This toolkit serves as an accessible entry point for students, researchers, and developers looking to understand the mechanics of sequence processing. It bridges the gap between biological concepts and web development in the following ways:

### 1. Gene Expression & Proteomics Simulation
By integrating transcription and translation workflows into a clean web interface, it models how changes at the nucleotide level translate into final structural protein chains. This helps users visualize how silent, missense, or nonsense mutations physically manifest.

### 2. Analytical Primer & Thermal Profiling
The **GC/AT Counters** provide quick calculations essential for molecular laboratory prep. High GC-content indicates higher thermal stability due to triple-hydrogen bonds, which directly influences PCR primer design, denaturation limits, and annealing temperatures.

### 3. Evolutionary Homology Mapping
The **Pairwise Alignment** module demonstrates the foundations of comparative genomics. Aligning strings side-by-side exposes deletions, insertions, or point mutations, helping researchers calculate genetic distance and map evolutionary changes between sequence variants.

---

## 🛠️ Tech Stack Used

* **Frontend:** Semantic HTML5 & Modern CSS3 (featuring a minimalist, light-themed scientific layout).
* **Backend:** Pure PHP (for real-time, server-side sequence filtering, string parsing, and algorithmic matching).

---

## 🔧 How to Run Locally

1. **Clone or Download** this repository.
2. Ensure you have a local PHP server environment installed (such as **XAMPP**, **WAMP**, or **MAMP**).
3. Move the project folder into your server's root directory (e.g., `htdocs` for XAMPP).
4. Start your Apache server.
5. Open your web browser and navigate to: `http://localhost/bioinformatics-toolkit/index.php`
