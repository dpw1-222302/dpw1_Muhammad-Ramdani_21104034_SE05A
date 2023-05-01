<!DOCTYPE html>
<html>

<head>
    <title>Portofolio Saya</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo">Portofolio Saya</div>
        <nav>
            <ul>
                <li><a href="#profil">Profil</a></li>
                <li><a href="#portofolio">Portofolio</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <section id="profil">
        <h1>Profil Saya</h1>
        <p>Perkenalkan, saya adalah seorang web developer yang telah memiliki pengalaman kerja selama 5 tahun. Saya memiliki latar belakang pendidikan di bidang teknologi informasi dan sangat terampil dalam bahasa pemrograman seperti PHP, CSS, dan JavaScript.</p>
        <h2>Pengalaman Kerja</h2>
        <ul>
            <li>Web Developer di PT sana</li>
            <li>Web Developer di PT sini</li>
            <li>Web Developer di PT sebrang</li>
        </ul>
        <h2>Pendidikan</h2>
        <ul>
            <li>Sarjana Rekayasa Perangkat lunak, Institut Teknologi Telkom Purwokerto</li>
            <li>Master Rekayasa Perangkat lunak, Universitas Telkom</li>
        </ul>
        <h2>Keterampilan</h2>
        <ul>
            <li>PHP</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>MySQL</li>
        </ul>
    </section>
    <section id="portofolio">
        <h1>Portofolio Saya</h1>
        <div class="project">
            <img src="project1.png" >
            <h2>Proyek 1</h2>
            <p>Deskripsi singkat proyek 1</p>
        </div>
        <div class="project">
            <img src="project1.png">
            <h2>Proyek 2</h2>
            <p>Deskripsi singkat proyek 2</p>
        </div>
        <div class="project">
            <img src="project1.png">
            <h2>Proyek 3</h2>
            <p>Deskripsi singkat proyek 3</p>
        </div>
    </section>
    <section id="kontak">
        <h1>Kontak Saya</h1>
        <form action="submit-form.php" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Kirim</button>
        </form>
    </section>
</body>