<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Web portofolio sederhana menggunakan html css js dasar"
    />
    <link rel="icon" type="../public/assets/languange/phoenix.svg" href="../publi/assets/languange/phoenix.svg" />
    <title>Khosyatullah Ahmad</title>
    <link rel="stylesheet" href="../public/css/home.css" />
    <script src="../public/js/home.js"></script>
  </head>
  <body>
    <header>
      <div class="headers">
        <div class="List-menu">
          <div class="logo">
            <img src="../public/assets/languange/phoenix.svg" alt="" />
          </div>
          <div class="menu">
            <div><h1>api</h1></div>
            <div><h1>api</h1></div>
            <div><h1>api</h1></div>
            <div><h1>api</h1></div>
            <a href="/login/index.html" class="button">
              <h3>login</h3>
            </a>
          </div>
        </div>
      </div>
      <div class="navbar-container">
        <nav id="navbar">
          <a href="#home" class="nav-link">
            <div class="icon-wrapper">
              <img src="../public/assets/icons/home.svg" alt="" />
            </div>
          </a>
          <a href="#about" class="nav-link">
            <div class="icon-wrapper">
              <img src="../public/assets/icons/user.svg" alt="" />
            </div>
          </a>
          <a href="#skills" class="nav-link">
            <div class="icon-wrapper">
              <img src="../public/assets/icons/skill.svg" alt="" />
            </div>
          </a>
          <a href="#project" class="nav-link">
            <div class="icon-wrapper">
              <img src="../public/assets/icons/document-code.svg" alt="" />
            </div>
          </a>
        </nav>
      </div>
    </header>
    <hero id="home">
      <div class="caption">
        <h1>amay</h1>
        <p>Welcome to my portofolio website</p>
        <div class="button-group">
          <div class="github-wrapper">
            <img
              src="../public/assets/icons/githubHero.svg"
              alt="Language Icon"
              class="github-icon"
            />
            <a href="https://github.com/Dzox13524"
              ><button class="github-button">Github</button></a
            >
          </div>

          <a href="https://www.linkedin.com/in/khosyatullah-ahmad-40b150248/"
            ><button class="linkedin-button">Linkedin</button></a
          >
        </div>
      </div>
    </hero>
    <section class="about" id="about">
      <h1>About</h1>
      <div class="cardhero">
        <div class="caption">
          <h3>halo perkenalkan aku gwe</h3>
          <p>
            Saya seorang ful stak developer dengan minat mendalam pada coding
            (copy di pasting) yang sudah saya tekuni sebagai hobi sejak SMA.
            Bagi saya, memecahkan masalah dengan kode adalah sebuah keseronokan.
            Waktu luang saya habiskan bersama istri (waguri). hobby saya suka
            membaca buku (cuma 3726 mdpl sama 0 mdpl).
          </p>
        </div>
        <div class="image">
          <img src="../public/assets/images/gweh.jpg" alt="" />
        </div>
      </div>
    </section>
    <section class="skill" id="skills">
      <div class="background">
        <h1>Skill</h1>
        <div class="card">
          <div class="kiri">
            <div>
              <img src="../public/assets/languange/csharp.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/golang.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/js.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/php.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/python.svg" alt="" />
            </div>
          </div>
          <div class="tengah">
            <div>
              <img src="../public/assets/languange/phoenix.svg " alt="" />
            </div>
          </div>
          <div class="kanan">
            <div>
              <img src="../public/assets/languange/nodeJs.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/nextjs.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/tailwindcss.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/react.svg" alt="" />
            </div>
            <div>
              <img src="../public/assets/languange/flutter.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="project" id="project">
      <h1>Project</h1>
      <div class="list">
        <div class="card" id="card1">
          <h1>KUUHAKU API</h1>
          <p>Web API menggunakan nextJs, Express JS dan tailwind css</p>
          <div class="progres-bar" id="progres-bar">
            <div class="progres" id="progres1"></div>
          </div>
        </div>
        <div class="card" id="card2">
          <h1>KUUHAKU BOT</h1>
          <p>Aplikasi automatisasi chat Whatsapp menggunakan library Baileys</p>
          <div class="progres-bar" id="progres-bar">
            <div class="progres" id="progres2"></div>
          </div>
        </div>
        <div class="card" id="card3">
          <h1>Tiktok Downloader</h1>
          <p>
            Membuat Website download video tiktok menggunakan nextJs dan Express
            Js
          </p>
          <div class="progres-bar" id="progres-bar">
            <div class="progres" id="progres3"></div>
          </div>
        </div>
        <div class="card" id="card4">
          <h1>portofolio</h1>
          <p>
            Membuat website portofolio sederhana menggunakan html css js vanila
          </p>
          <div class="progres-bar" id="progres-bar">
            <div class="progres" id="progres4"></div>
          </div>
        </div>
      </div>
      <div class="imageProject">
        <a href="https://github.com/Dzox13524/kuuhaku-api"
          ><img src="../public/assets/images/kuuhaku.png" alt="" id="project1"
        /></a>
        <a href="https://github.com/Dzox13524/kuuhaku-MD"
          ><img src="../public/assets/images/bot.png" alt="" id="project2"
        /></a>
        <a href="localhost:3000/downloader"
          ><img src="../public/assets/images/tiktok.png" alt="" id="project3"
        /></a>
        <a href="#"
          ><img src="../public/assets/images/web.png" alt="" id="project4"
        />
      </div>
      <div class="statistic">
        <div class="statistic-list">
          <div class="items">
            <h2>2+</h2>
            <p>Tahun Pengalaman</p>
          </div>
          <div class="items">
            <h2>15+</h2>
            <p>Proyek Selesai</p>
          </div>
          <div class="items">
            <h2>2+</h2>
            <p>Sertifikat Didapatkan</p>
          </div>
          <div class="items">
            <h2>10+</h2>
            <p>Teknologi Dikuasai</p>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="contact">
        <h3>Contact me easily</h3>
        <p>I always check my email regularly, send me here</p>
        <form action="">
          <input type="email" name="email" id="email" placeholder="Email" />
          <input
            type="text"
            name="message"
            id="message"
            placeholder="Message"
          />
          <button type="submit">Submit</button>
        </form>
      </div>
      <div class="medsos">
        <h3>Stay in touch</h3>
        <div class="list">
          <a
            href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=emailanda@gmail.com"
            target="_blank"
          >
            <div class="card">
              <img src="../public/assets/icons/sms.svg" alt="" />
              <div class="caption">
                <div class="image">
                  <h4>Email</h4>
                  <img src="../public/assets/icons/arrrow.svg" alt="" />
                </div>
                <p>I always check my email regularly, send me here.</p>
              </div>
            </div>
          </a>
          <a href="https://www.instagram.com/ahmdshnaa" target="_blank">
            <div class="card">
              <img src="../public/assets/icons/instagram.svg" alt="" />
              <div class="caption">
                <div class="image">
                  <h4>Instagram</h4>
                  <img src="../public/assets/icons/arrrow.svg" alt="" />
                </div>
                <p>
                  View my dynamic portfolio and project insights on Instagram.
                </p>
              </div>
            </div>
          </a>
          <a href="https://www.tiktok.com/@hyozan_" target="_blank">
            <div class="card">
              <img src="../public/assets/icons/tiktok.svg" alt="" />
              <div class="caption">
                <div class="image">
                  <h4>Tiktok</h4>
                  <img src="../public/assets/icons/arrrow.svg" alt="" />
                </div>
                <p>You can see my latest work and creative side on TikTok.</p>
              </div>
            </div>
          </a>
          <a href="https://wa.me/6282141404209" target="_blank">
            <div class="card">
              <img src="../public/assets/icons/whatsapp.svg" alt="" />
              <div class="caption">
                <div class="image">
                  <h4>Whatsapp</h4>
                  <img src="../public/assets/icons/arrrow.svg" alt="" />
                </div>
                <p>I always check my whatsapp regularly, send me here</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <p>
        Copyright
<?php echo get_current_year(); ?>
        by Ahmad
      </p>
    </footer>
  </body>
</html>
