<?php
    include "DB.php";
    $entered = 0;
    $ea = 0;

    if (isset($_SESSION['login-a'])) {
        $login = $_SESSION['login-a'];
        $entered = 1;
        if ($login == 'admin') {
            $ea = 1;
        }
    }
    elseif (isset($_SESSION['login-r']))
    {
        $login = $_SESSION['login-r'];
        $entered = 1;
    }
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gao's Studio — Главная</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #1a1a2e;
      color: #c8cce6;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    a {
      color: #b497d6;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .top-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #201f2b;
      padding: 12px 24px;
      box-shadow: 0 2px 8px rgba(180, 150, 214, 0.2);
    }
    .logo {
      width: 140px;
      height: 40px;
      background: transparent;
      display: flex;
      justify-content: center;
    }
    .logo img {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
    }
    nav {
      display: flex;
      gap: 26px;
    }
    nav a {
      font-weight: 600;
      font-size: 1.1rem;
      padding: 8px 0;
      position: relative;
    }
    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 3px;
      background-color: transparent;
      transition: background-color 0.3s ease;
      border-radius: 2px;
    }
    nav a:hover::after {
      background-color: #b497d6;
    }
    .container {
      width: 90%;
      max-width: 1200px;
      margin: auto;
    }
    main.container {
      padding-bottom: 60px;
    }
    header {
      position: relative;
      height: 75vh;
      min-height: 400px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: black;
    }
    header .background-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
      background-size: cover;
      background-position: center;
      filter: brightness(0.35);
      z-index: 0;
    }
    header .content {
      position: relative;
      z-index: 1;
      text-align: center;
      color: white;
      max-width: 900px;
      padding: 0 20px;
    }
    header h1 {
      font-size: 3.5rem;
      margin-bottom: 24px;
      font-weight: 700;
      text-shadow: 0 0 12px #9b87c3;
    }
    .btns {
      margin-top: 40px;
    }
    .btn {
      display: inline-block;
      margin: 0 18px;
      padding: 16px 34px;
      font-size: 1.3rem;
      font-weight: 700;
      border-radius: 40px;
      cursor: pointer;
      border: none;
      transition: background-color 0.3s ease;
    }
    .btn-primary {
      background: #b497d6;
      color: #1a1a2e;
    }
    .btn-primary:hover {
      background: #9b87c3;
    }
    .btn-secondary {
      background: transparent;
      color: #b497d6;
      border: 3px solid #b497d6;
    }
    .btn-secondary:hover {
      background: #b497d6;
      color: #1a1a2e;
    }
    .services {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 32px;
      margin: 80px 0 80px 0;
    }
    .card {
      background: #2a2645;
      border-radius: 18px;
      padding: 30px 28px;
      flex: 1 1 240px;
      max-width: 280px;
      text-align: center;
      box-shadow: 0 0 16px #5b4b8a;
      cursor: pointer;
      transition: transform 0.25s ease;
    }
    .card:hover {
      transform: scale(1.12);
    }
    .card-icon {
      width: 80px;
      height: 80px;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card-icon img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
    .card-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 12px;
    }
    .card-desc {
      font-size: 1.1rem;
      color: #d0cce6;
    }
    .why-us {
      background: #201f2b;
      padding: 48px 24px;
      border-radius: 18px;
      max-width: 1000px;
      margin: 0 auto 80px;
      text-align: center;
      color: #c9b3e6;
    }
    .why-us h2 {
      font-size: 2.5rem;
      margin-bottom: 40px;
    }
    .why-list {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 28px;
    }
    .why-item {
      flex: 1 1 220px;
      font-weight: 700;
      font-size: 1.1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .why-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 16px;
      border-radius: 50%;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #2a2645;
      border: 2px solid #b497d6;
    }
    .why-icon img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
    }
    .portfolio {
      max-width: 1200px;
      margin: 0 auto 80px;
    }
    .portfolio h2 {
      text-align: center;
      margin-bottom: 36px;
      color: #b497d6;
      font-size: 2.3rem;
    }
    .audio-samples {
      display: flex;
      flex-wrap: wrap;
      gap: 24px;
      justify-content: center;
      margin-bottom: 48px;
    }
    .audio-sample {
      background: #2a2645;
      border-radius: 18px;
      padding: 18px;
      width: 280px;
      box-shadow: 0 0 12px #5b4b8a;
      text-align: center;
    }
    .audio-sample h3 {
      margin-bottom: 14px;
      font-size: 1.2rem;
    }
    audio {
      width: 100%;
      outline: none;
    }
    .reviews {
      display: flex;
      flex-wrap: wrap;
      gap: 28px;
      justify-content: center;
    }
    .review-card {
      background: #201f2b;
      border-radius: 18px;
      padding: 26px 20px;
      width: 280px;
      box-shadow: 0 0 14px #5b4b8a;
      color: #d0cce6;
      text-align: center;
    }
    .review-photo {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 16px;
      border: 4px solid #b497d6;
    }
    .review-text {
      font-style: italic;
      font-size: 1rem;
    }
    .review-author {
      margin-top: 16px;
      font-weight: 700;
      color: #b497d6;
      font-size: 1.1rem;
    }
    .studio-gallery {
      max-width: 1200px;
      margin: 0 auto 80px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 20px;
    }
    .studio-gallery img {
      width: 100%;
      height: 220px;
      border-radius: 18px;
      object-fit: cover;
      box-shadow: 0 0 16px #5b4b8a;
      transition: transform 0.3s ease;
    }
    .studio-gallery img:hover {
      transform: scale(1.05);
    }

    /* Футер по методологии БЭМ */
    .footer {
      background: #0f0f1a;
      padding: 50px 0 0 0;
      color: #c8cce6;
      margin-top: auto;
    }

    .footer__container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .footer__content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
    }

    .footer__section {
      display: flex;
      flex-direction: column;
    }

    .footer__title {
      color: #b497d6;
      font-size: 1.5rem;
      margin-bottom: 15px;
      font-weight: 700;
    }

    .footer__subtitle {
      color: #b497d6;
      font-size: 1.2rem;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .footer__text {
      margin: 8px 0;
      line-height: 1.6;
      color: #c8cce6;
    }

    .footer__bottom {
      background: #0a0a12;
      padding: 20px 0;
      text-align: center;
      margin-top: 40px;
      border-top: 1px solid #2a2645;
    }

    .footer__copyright {
      color: #77779e;
      margin: 0;
    }

    .footer__social {
      display: flex;
      gap: 15px;
      margin-top: 15px;
    }

    .footer__social-link {
      display: inline-block;
      transition: transform 0.3s ease;
    }

    .footer__social-icon {
      width: 32px;
      height: 32px;
      filter: brightness(0.8);
      transition: filter 0.3s ease;
    }

    .footer__social-link:hover .footer__social-icon {
      filter: brightness(1);
    }

    .footer__social-link:hover {
      transform: scale(1.1);
    }

    @media(max-width: 700px) {
      .top-header {
        flex-direction: column;
        gap: 12px;
        padding: 10px 20px;
      }
      header h1 {
        font-size: 2.5rem;
      }
      .btn {
        display: block;
        margin: 16px auto;
      }
      .services,
      .why-list,
      .reviews,
      .audio-samples {
        flex-direction: column;
        align-items: center;
      }
      .card,
      .review-card,
      .audio-sample {
        max-width: 320px;
        width: 100%;
      }
      .studio-gallery {
        grid-template-columns: 1fr;
      }
      nav {
        gap: 16px;
        justify-content: center;
      }
      
      /* Адаптивность футера для мобильных */
      .footer__content {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
      }
      
      .footer__social {
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <!-- Навигационная панель с логотипом -->
  <div class="top-header" role="banner" aria-label="Верхняя панель сайта с логотипом и навигацией">
    <div class="logo" aria-label="Логотип студии">
      <img src="img/logo.png" alt="Логотип Gao's Studio" />
    </div>
    <nav role="navigation" aria-label="Основное меню сайта">
      <a href="index.php">Главная</a>
      <a href="services.php">Услуги</a>
      <a href="about.php">О нас</a>
      <a href="contacts.php">Контакты</a>
      <a href="register.php">Войти</a>
    </nav>
  </div>

  <header>
    <div class="background-image"></div>
    <div class="content" aria-label="Главный заголовок и кнопки действия">
      <h1>Создайте свой звук. Профессионально.</h1>
      <div class="btns">
        <button class="btn btn-primary" onclick="location.href='#booking'">Забронировать время</button>
        <button class="btn btn-secondary" onclick="location.href='#services'">Наши услуги</button>
      </div>
    </div>
  </header>

  <main class="container" role="main">
    <section class="services" id="services" aria-label="Ключевые услуги">
      <div class="card" onclick="location.href='service-mastering.html'" role="button" tabindex="0">
        <div class="card-icon" aria-hidden="true">
          <img src="img/equalazer.png" alt="Иконка сведения и мастеринга">
        </div>
        <div class="card-title">Сведение и мастеринг</div>
        <div class="card-desc">Профессиональная обработка звука для идеального звучания.</div>
      </div>
      <div class="card" onclick="location.href='service-recording.html'" role="button" tabindex="0">
        <div class="card-icon" aria-hidden="true">
          <img src="img/microphone.png" alt="Иконка записи вокала">
        </div>
        <div class="card-title">Запись вокала и инструментов</div>
        <div class="card-desc">Запись качества студии с современным оборудованием.</div>
      </div>
      <div class="card" onclick="location.href='service-rental.html'" role="button" tabindex="0">
        <div class="card-icon" aria-hidden="true">
          <img src="img/microroom.png" alt="Иконка аренды студии">
        </div>
        <div class="card-title">Аренда студии</div>
        <div class="card-desc">Уютные помещения и высококлассная техника для вашего проекта.</div>
      </div>
      <div class="card" onclick="location.href='service-sounddesign.html'" role="button" tabindex="0">
        <div class="card-icon" aria-hidden="true">
          <img src="img/sound-design.png" alt="Иконка саунд-дизайна">
        </div>
        <div class="card-title">Саунд-дизайн</div>
        <div class="card-desc">Создание уникальных звуковых образов и эффектов.</div>
      </div>
    </section>

    <section class="why-us" aria-label="Наши преимущества">
      <h2>Почему мы?</h2>
      <div class="why-list">
        <div class="why-item">
          <div class="why-icon">
            <img src="img/man.jpg" alt="Опытные звукорежиссеры">
          </div>
          <div>Опытные звукорежиссеры</div>
        </div>
        <div class="why-item">
          <div class="why-icon">
            <img src="img/acoustic.jpg" alt="Профессиональная акустика зала">
          </div>
          <div>Профессиональная акустика зала</div>
        </div>
        <div class="why-item">
          <div class="why-icon">
            <img src="img/equp.jpg" alt="Редкое и современное оборудование">
          </div>
          <div>Редкое и современное оборудование</div>
        </div>
        <div class="why-item">
          <div class="why-icon">
            <img src="img/pin.jpg" alt="Удобное расположение">
          </div>
          <div>Удобное расположение</div>
        </div>
      </div>
    </section>

    <section class="portfolio" aria-label="Портфолио и отзывы">
      <h2>Наши работы и отзывы</h2>
      <div class="audio-samples" aria-label="Аудио-примеры">
        <div class="audio-sample">
          <h3>Жанр: Рок</h3>
          <audio controls src="audio/rock-sample.mp3">Ваш браузер не поддерживает аудио.</audio>
        </div>
        <div class="audio-sample">
          <h3>Жанр: Поп</h3>
          <audio controls src="audio/pop-sample.mp3">Ваш браузер не поддерживает аудио.</audio>
        </div>
        <div class="audio-sample">
          <h3>Жанр: Электроника</h3>
          <audio controls src="audio/electro-sample.mp3">Ваш браузер не поддерживает аудио.</audio>
        </div>
      </div>
      <div class="reviews" aria-label="Отзывы клиентов">
        <article class="review-card">
          <img src="img/man1.jpg" alt="Фотография клиента" class="review-photo" />
          <p class="review-text">"Отличная студия! Запись прошла быстро, звук идеальный."</p>
          <p class="review-author">— Иван Петров</p>
        </article>
        <article class="review-card">
          <img src="img/girl1.jpeg" alt="Фотография клиента" class="review-photo" />
          <p class="review-text">"Профессиональный подход и комфортная атмосфера."</p>
          <p class="review-author">— Алина Смирнова</p>
        </article>
      </div>
    </section>

    <section class="studio-gallery" aria-label="Фотографии студии">
      <img src="img/control_room.webp" alt="Контрольная комната студии" />
      <img src="img/bio_room.jpg" alt="Живая комната студии" />
      <img src="img/equp.jpg" alt="Оборудование студии крупным планом" />
    </section>
  </main>
  
  <footer class="footer" role="contentinfo">
    <div class="footer__container">
      <div class="footer__content">
        <div class="footer__section">
          <h3 class="footer__title">Gao's Studio</h3>
          <p class="footer__text">Профессиональная звукозапись и сведение</p>
        </div>
        <div class="footer__section">
          <h4 class="footer__subtitle">Контакты</h4>
          <p class="footer__text">+7 (495) 123-45-67</p>
          <p class="footer__text">isip_d.s.gaivoronsky@mpt.ru</p>
          <p class="footer__text">г. Москва, ул. Нежинская, д. 7</p>
        </div>
        <div class="footer__section">
          <h4 class="footer__subtitle">Часы работы</h4>
          <p class="footer__text">Пн-Пт: 10:00 - 22:00</p>
          <p class="footer__text">Сб-Вс: 11:00 - 20:00</p>
        </div>
        <div class="footer__section">
          <h4 class="footer__subtitle">Социальные сети</h4>
          <div class="footer__social">
            <a href="https://t.me/your_channel" target="_blank" title="Telegram" class="footer__social-link">
              <img src="img/telegram_icon.png" alt="Telegram" class="footer__social-icon" />
            </a>
            <a href="https://instagram.com/your_page" target="_blank" title="Instagram" class="footer__social-link">
              <img src="img/instagram_icon.png" alt="Instagram" class="footer__social-icon" />
            </a>
            <a href="https://vk.com/your_page" target="_blank" title="VK" class="footer__social-link">
              <img src="img/vk_icon.png" alt="VK" class="footer__social-icon" />
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <p class="footer__copyright">&copy; 2025 Gao's Studio. Все права защищены.</p>
    </div>
  </footer>
</body>
</html>