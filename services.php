<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Услуги — Lavender Sound Studio</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #1a1a2e;
      color: #c8cce6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
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
      align-items: center;
    }

    .logo img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      display: block;
    }

    nav {
      display: flex;
      gap: 26px;
    }

    nav a {
      font-weight: 600;
      font-size: 1.1rem;
      color: #b497d6;
      text-decoration: none;
      position: relative;
    }

    nav a::after {
      content: "";
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

    nav a:hover {
      color: #d4c9f9;
    }

    main.container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px 40px;
      flex: 1;
    }

    h1 {
      color: #b497d6;
      font-weight: 700;
      font-size: 2.5rem;
      margin-bottom: 30px;
      text-align: center;
    }

    .services-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
      margin-bottom: 50px;
      align-items: start;
    }

    .service-card {
      display: flex;
      flex-direction: column;
      background: #1e1e2f;
      border-radius: 12px;
      padding: 0;
      box-shadow: 0 0 15px rgba(147, 112, 219, 0.4);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
      overflow: hidden;
    }

    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 30px rgba(179, 142, 253, 0.7);
    }

    .service-card__image-container {
      width: 100%;
      height: 180px;
      overflow: hidden;
      position: relative;
    }

    .service-card__image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .service-card:hover .service-card__image {
      transform: scale(1.05);
    }

    .service-card__content {
      padding: 24px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .service-card__title {
      margin: 0 0 15px;
      color: #d1c4fb;
      font-size: 1.4rem;
      font-weight: 700;
    }

    .service-card__description {
      flex-grow: 1;
      color: #ccc;
      font-size: 1.1rem;
      margin-bottom: 22px;
      line-height: 1.5;
    }

    .service-card__button {
      background: linear-gradient(90deg, #8971f9, #b08bfd);
      color: #fff;
      border: none;
      padding: 14px 0;
      font-size: 1.2rem;
      font-weight: 700;
      cursor: pointer;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(147, 112, 219, 0.6);
      transition: background 0.3s, box-shadow 0.3s;
      text-align: center;
      width: 100%;
      display: inline-block;
      text-decoration: none;
      margin-top: auto;
    }

    .service-card__button:hover {
      background: linear-gradient(90deg, #b08bfd, #8971f9);
      box-shadow: 0 7px 25px rgba(179, 142, 253, 0.8);
    }

    /* Стили для разных типов услуг */
    .service-image-recording {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .service-image-mixing {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .service-image-mastering {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .service-image-vocal {
      background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .service-image-instruments {
      background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .service-image-production {
      background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    }

    .service-icon {
      font-size: 3rem;
      text-align: center;
      margin: 20px 0;
      color: #fff;
    }

    /* Адаптивность для планшетов */
    @media (max-width: 1024px) {
      .services-list {
        grid-template-columns: 1fr;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
      }
      
      .service-card__image-container {
        height: 200px;
      }
    }

    /* Адаптивность для мобильных */
    @media (max-width: 768px) {
      main.container {
        width: 95%;
        padding: 0 10px 40px;
      }

      .services-list {
        grid-template-columns: 1fr;
        gap: 25px;
        max-width: none;
      }

      .service-card__image-container {
        height: 160px;
      }

      .service-card__content {
        padding: 20px;
      }

      .top-header {
        padding: 12px 15px;
        flex-wrap: wrap;
      }

      nav {
        gap: 15px;
        margin-top: 10px;
        width: 100%;
        justify-content: center;
      }

      h1 {
        font-size: 2rem;
        margin-bottom: 20px;
      }
    }

    /* Для очень маленьких экранов */
    @media (max-width: 480px) {
      .service-card__image-container {
        height: 140px;
      }
      
      .service-card__content {
        padding: 16px;
      }
      
      .service-card__title {
        font-size: 1.3rem;
      }
      
      .service-card__description {
        font-size: 1rem;
      }
    }

    /* Стили для футера */
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

    /* Адаптивность футера */
    @media (max-width: 768px) {
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
  <div class="top-header" role="banner">
    <div class="logo">
      <img src="img/logo.png" alt="Логотип Lavender Sound Studio" />
    </div>
    <nav role="navigation">
      <a href="index.php">Главная</a>
      <a href="services.php">Услуги</a>
      <a href="about.php">О нас</a>
      <a href="contacts.php">Контакты</a>
      <a href="register.php">Войти</a>
    </nav>
  </div>
  <main class="container" role="main">
    <h1>Наши услуги</h1>
    <section class="services-list">
      <!-- Статические данные услуг вместо PHP -->
      <article class="service-card">
        <div class="service-card__image-container service-image-recording">
          <div class="service-icon">🎤</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Запись вокала</div>
          <div class="service-card__description">Профессиональная запись вокала в акустически подготовленной студии с использованием премиального оборудования.</div>
          <a href="sign_up.php?service_id=1" class="service-card__button" role="button" aria-label="Записаться на запись вокала">
            Записаться на сеанс
          </a>
        </div>
      </article>

      <article class="service-card">
        <div class="service-card__image-container service-image-mixing">
          <div class="service-icon">🎛️</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Сведение треков</div>
          <div class="service-card__description">Сведение многодорожечных проектов для достижения идеального баланса и профессионального звучания.</div>
          <a href="sign_up.php?service_id=2" class="service-card__button" role="button" aria-label="Записаться на сведение треков">
            Записаться на сеанс
          </a>
        </div>
      </article>

      <article class="service-card">
        <div class="service-card__image-container service-image-mastering">
          <div class="service-icon">📊</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Мастеринг</div>
          <div class="service-card__description">Финальная обработка трека для достижения коммерческого уровня громкости и качества звучания на любых устройствах.</div>
          <a href="sign_up.php?service_id=3" class="service-card__button" role="button" aria-label="Записаться на мастеринг">
            Записаться на сеанс
          </a>
        </div>
      </article>

      <article class="service-card">
        <div class="service-card__image-container service-image-vocal">
          <div class="service-icon">🎵</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Обработка вокала</div>
          <div class="service-card__description">Коррекция pitch, настройка тембра, добавление эффектов и создание профессионального вокального звучания.</div>
          <a href="sign_up.php?service_id=4" class="service-card__button" role="button" aria-label="Записаться на обработку вокала">
            Записаться на сеанс
          </a>
        </div>
      </article>

      <article class="service-card">
        <div class="service-card__image-container service-image-instruments">
          <div class="service-icon">🎸</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Запись инструментов</div>
          <div class="service-card__description">Запись гитар, барабанов, клавишных и других музыкальных инструментов с профессиональным оборудованием.</div>
          <a href="sign_up.php?service_id=5" class="service-card__button" role="button" aria-label="Записаться на запись инструментов">
            Записаться на сеанс
          </a>
        </div>
      </article>

      <article class="service-card">
        <div class="service-card__image-container service-image-production">
          <div class="service-icon">🎧</div>
        </div>
        <div class="service-card__content">
          <div class="service-card__title">Музыкальный продакшн</div>
          <div class="service-card__description">Полный цикл создания музыки: от аранжировки и программирования до финального сведения и мастеринга.</div>
          <a href="sign_up.php?service_id=6" class="service-card__button" role="button" aria-label="Записаться на музыкальный продакшн">
            Записаться на сеанс
          </a>
        </div>
      </article>
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
      <p class="footer__copyright">&copy; Gao's Studio. Все права защищены.</p>
    </div>
  </footer>

  <script>
    // Простой JavaScript для улучшения взаимодействия
    document.addEventListener('DOMContentLoaded', function() {
      // Добавляем плавную прокрутку для всех ссылок
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            target.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });

      // Добавляем обработчики для карточек услуг
      const serviceCards = document.querySelectorAll('.service-card');
      serviceCards.forEach(card => {
        card.addEventListener('click', function(e) {
          if (e.target.classList.contains('service-card__button')) {
            return; // Не обрабатываем клики по кнопке
          }
          
          const link = this.querySelector('.service-card__button');
          if (link) {
            window.location.href = link.href;
          }
        });
      });

      // Улучшаем доступность для клавиатуры
      serviceCards.forEach(card => {
        card.setAttribute('tabindex', '0');
        card.addEventListener('keypress', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            const link = this.querySelector('.service-card__button');
            if (link) {
              window.location.href = link.href;
            }
          }
        });
      });
    });
  </script>
</body>
</html>