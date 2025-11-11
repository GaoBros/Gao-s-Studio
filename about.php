<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>О нас — Gao's</title>
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
    main.container {
      width: 90%;
      max-width: 1200px;
      margin: 40px auto 80px;
      padding: 0 20px;
    }
    h1 {
      color: #b497d6;
      font-size: 2.8rem;
      font-weight: 900;
      text-align: center;
      margin-bottom: 40px;
      margin-top: 0;
    }
    section {
      margin-bottom: 60px;
    }
    h2 {
      font-size: 2.3rem;
      font-weight: 700;
      margin-bottom: 20px;
      border-left: 6px solid #b497d6;
      padding-left: 12px;
    }
    p {
      max-width: 760px;
      line-height: 1.6;
      font-size: 1.2rem;
      margin: 0 auto;
      color: #d0c0f0;
    }
    .team {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }
    .team__member {
      width: 280px;
      background: #2a2645;
      border-radius: 16px;
      box-shadow: 0 0 16px #5b4b8a;
      padding: 20px;
      text-align: center;
      color: #ccc;
      transition: transform 0.3s ease;
    }
    .team__member:hover {
      transform: translateY(-5px);
    }
    .team__photo {
      width: 160px;
      height: 160px;
      border-radius: 12px;
      object-fit: cover;
      margin-bottom: 16px;
      box-shadow: 0 0 12px #aa99dd;
      transition: transform 0.3s ease;
    }
    .team__member:hover .team__photo {
      transform: scale(1.05);
    }
    .team__name {
      font-weight: 700;
      font-size: 1.4rem;
      margin-bottom: 6px;
      color: #c2affd;
    }
    .team__role {
      font-size: 1.1rem;
      margin-bottom: 14px;
      color: #b497d6;
    }
    .team__bio {
      font-size: 1rem;
      color: #bbb;
      line-height: 1.4;
    }
    .equipment {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 24px;
    }
    .equipment__item {
      width: 240px; /* Немного увеличил ширину */
      background: #2a2645;
      border-radius: 12px;
      padding: 25px 20px; /* Увеличил вертикальные отступы */
      text-align: center;
      box-shadow: 0 0 12px rgba(147, 112, 219, 0.4);
      transition: transform 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center; /* Центрируем содержимое */
      min-height: 320px; /* Увеличил минимальную высоту */
    }
    .equipment__item:hover {
      transform: translateY(-3px);
    }
    .equipment__photo-container {
      background: #ffffff;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px; /* Увеличил отступ */
      height: 140px;
      width: 100%; /* Занимает всю ширину карточки */
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .equipment__photo {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      transition: transform 0.3s ease;
    }
    .equipment__item:hover .equipment__photo {
      transform: scale(1.08);
    }
    .equipment__name {
      font-weight: 600;
      color: #d1c4fb;
      font-size: 1.3rem; /* Увеличил размер шрифта */
      line-height: 1.5; /* Улучшил межстрочный интервал */
      margin: 0;
      text-align: center;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-grow: 1; /* Равномерное распределение пространства */
      padding: 0 5px; /* Небольшие боковые отступы */
      word-wrap: break-word;
      hyphens: auto; /* Автоматическая расстановка переносов */
    }
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }
    .gallery__photo {
      width: 100%;
      height: 220px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 0 20px #6e63aa;
      transition: transform 0.3s ease;
      cursor: pointer;
    }
    .gallery__photo:hover {
      transform: scale(1.03);
    }

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
  font-size: 1rem;
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
  font-size: 1rem;
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
    @media (max-width: 768px) {
      .team {
        flex-direction: column;
        align-items: center;
      }
      .equipment {
        flex-direction: column;
        align-items: center;
      }
      .equipment__item,
      .team__member {
        width: 90%;
        max-width: 320px;
      }
      .gallery {
        grid-template-columns: 1fr;
      }
      h1 {
        font-size: 2.2rem;
      }
      h2 {
        font-size: 1.8rem;
      }
      
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
  <div class="top-header" role="banner" aria-label="Верхняя панель сайта с логотипом и навигацией">
    <div class="logo" aria-label="Логотип студии">
      <img src="img/logo.png" alt="Gao's studio" />
    </div>
    <nav role="navigation" aria-label="Основное меню сайта">
      <a href="index.php">Главная</a>
      <a href="services.php">Услуги</a>
      <a href="about.php">О нас</a>
      <a href="contacts.php">Контакты</a>
      <a href="register.php">Войти</a>
    </nav>
  </div>

  <main class="container" role="main">
    <h1>О нас</h1>
    <section class="about__story" aria-label="История компании">
      <h2>Наша история</h2>
      <p>Наша студия звукозаписи родилась из страсти к музыке и качественному звуку. С момента основания мы ставили своей целью помогать артистам и творческим личностям воплощать свои музыкальные мечты в реальность. За годы работы мы превратились в современное творческое пространство, где пересекаются талант, опыт и инновации. Каждый проект для нас — как уникальное произведение искусства, в котором мы видим смысл и душу.</p>
    </section>

    <section class="about__mission" aria-label="Философия и миссия">
      <h2>Наша миссия</h2>
      <p>Мы не просто студия звукозаписи — мы ваш надежный партнер в создании звука, который трогает сердца и задает тренды. Наша задача — раскрыть потенциал каждого артиста, предложить лучшие решения и обеспечить комфортную атмосферу для творчества. Качество, инновации и индивидуальный подход — вот основные принципы нашей работы.</p>
    </section>

    <section class="about__team" aria-label="Наша команда">
      <h2>Команда профессионалов</h2>
      <div class="team">
        <article class="team__member">
          <img class="team__photo" src="img/man1.jpg" alt="Алексей, главный звукоинженер" />
          <h3 class="team__name">Алексей Иванов</h3>
          <p class="team__role">Главный звукоинженер</p>
          <p class="team__bio">Опыт более 12 лет, участвовал в создании более 200 альбомов разных жанров, специализируется на сведении и мастерингe.</p>
        </article>
        <article class="team__member">
          <img class="team__photo" src="img/girl1.jpeg" alt="Мария, продюсер" />
          <h3 class="team__name">Мария Смирнова</h3>
          <p class="team__role">Музыкальный продюсер</p>
          <p class="team__bio">Эксперт по музыкальному продакшену и аранжировке, помогает артистам раскрывать свой стиль и находить свой звук.</p>
        </article>
        <article class="team__member">
          <img class="team__photo" src="img/man2.jpg" alt="Олег, специалист по звуковому дизайну" />
          <h3 class="team__name">Олег Петров</h3>
          <p class="team__role">Специалист по саунд-дизайну</p>
          <p class="team__bio">Создает уникальные звуковые эффекты и атмосферу, работает с проектами из кино, игр и рекламы.</p>
        </article>
      </div>
    </section>

    <section class="about__equipment" aria-label="Оборудование студии">
      <h2>Оборудование и софт</h2>
      <div class="equipment">
        <div class="equipment__item">
          <div class="equipment__photo-container">
            <img class="equipment__photo" src="img/microphone.jpg" alt="Микрофон Neumann U87" />
          </div>
          <p class="equipment__name">Микрофон Neumann U87</p>
        </div>
        <div class="equipment__item">
          <div class="equipment__photo-container">
            <img class="equipment__photo" src="img/monitor.jpg" alt="Мониторы Genelec" />
          </div>
          <p class="equipment__name">Мониторы Genelec</p>
        </div>
        <div class="equipment__item">
          <div class="equipment__photo-container">
            <img class="equipment__photo" src="img/interface.jpg" alt="Аудиоинтерфейс Universal Audio Apollo" />
          </div>
          <p class="equipment__name">Аудиоинтерфейс Universal Audio Apollo</p>
        </div>
        <div class="equipment__item">
          <div class="equipment__photo-container">
            <img class="equipment__photo" src="img/pro_tools.jpg" alt="Программное обеспечение Pro Tools" />
          </div>
          <p class="equipment__name">Программное обеспечение Pro Tools</p>
        </div>
      </div>
    </section>

    <section class="about__gallery" aria-label="Галерея студии">
      <h2>Галерея</h2>
      <div class="gallery">
        <img class="gallery__photo" src="img/gallery1.avif" alt="Контрольная комната" />
        <img class="gallery__photo" src="img/gallery2.jpg" alt="Живая комната" />
        <img class="gallery__photo" src="img/gallery3.jpeg" alt="Оборудование крупным планом" />
        <img class="gallery__photo" src="img/gallery4.jpg" alt="Запись сессии" />
      </div>
    </section>
  </main>

  <!-- Футер по методологии БЭМ -->
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