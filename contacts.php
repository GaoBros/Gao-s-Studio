<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Контакты — Gao's Studio</title>
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
      font-weight: 600;
    }
    a:hover {
      text-decoration: underline;
    }

    /* Хедер с навигацией */
    .top-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #201f2b;
      padding: 12px 24px;
      box-shadow: 0 2px 8px rgba(180, 150, 214, 0.2);
      position: relative;
      z-index: 10;
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
      display: block;
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
      color: #b497d6;
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

    /* Контейнер */
    .container {
      width: 90%;
      max-width: 1200px;
      margin: 40px auto 0 auto;
      padding-bottom: 60px;
      flex: 1;
    }

    h1 {
      color: #b497d6;
      font-size: 2.7rem;
      font-weight: 900;
      margin-bottom: 32px;
      margin-top: 0;
      letter-spacing: 0.03em;
    }

    /* Контактные блоки */
    .contacts-info {
      background: linear-gradient(90deg, #232440 82%, #201f2b 100%);
      border-radius: 14px;
      box-shadow: 0 0 38px rgba(111,91,166,.17);
      padding: 35px 36px;
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(270px,1fr));
      gap: 36px;
      color: #ede6fd;
      margin-bottom: 50px;
    }
    .contact-item {
      display: flex;
      gap: 18px;
      align-items: flex-start;
      min-width: 225px;
    }
    .contact-icon {
      width: 52px;
      height: 52px;
      background: linear-gradient(135deg, #4B3D85 60%, #b497d6 100%);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #ede6fd;
      font-size: 27px;
      box-shadow: 0 2px 18px #6d5b9e3c;
      flex-shrink: 0;
    }
    .contact-text {
      display: flex;
      flex-direction: column;
    }
    .contact-text__title {
      font-weight: 700;
      margin-bottom: 4px;
      color: #b497d6;
      font-size: 1.07rem;
    }
    .contact-text__link, .contact-text__phone {
      font-size: 1rem;
      color: #b497d6;
      cursor: pointer;
      margin-bottom: 1px;
      transition: text-decoration 0.2s;
    }
    .contact-text__link:hover, .contact-text__phone:hover {
      text-decoration: underline;
      color: #cabcf3;
    }
    /* Промо-блок клиента */
    .client-prompt {
      background: linear-gradient(90deg, #32295b 75%, #928def 110%);
      border-radius: 16px;
      box-shadow: 0 0 25px #47376f31;
      padding: 32px 40px;
      color: #ede7fd;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
      margin-bottom: 0;
    }
    .client-prompt__text {
      font-size: 1.45rem;
      font-weight: 700;
      margin-bottom: 7px;
      color: #fff;
      letter-spacing: 0.01em;
    }
    .client-prompt__subtext {
      font-size: 1.09rem;
      color: #e0dbf8;
      margin-top: 2px;
      margin-bottom: 7px;
    }
    .client-prompt__btn {
      background: #b497d6;
      color: #312751;
      font-weight: 700;
      font-size: 1.11rem;
      border: none;
      border-radius: 45px;
      padding: 15px 42px;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(180, 151, 214, 0.21);
      transition: background 0.3s;
      margin-left: 20px;
    }
    .client-prompt__btn:hover {
      background: #cabcf3;
      color: #2a1d47;
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

    @media (max-width: 700px) {
      .container {
        width: 98%;
        padding: 0;
      }
      .contacts-info {
        grid-template-columns: 1fr;
        gap: 22px;
        padding: 20px 7px;
      }
      .contact-item {
        min-width: 0;
      }
      .client-prompt {
        flex-direction: column;
        align-items: flex-start;
        padding: 22px 7px 22px 14px;
        gap: 16px;
      }
      .client-prompt__btn {
        width: 100%;
        text-align: center;
        margin-left: 0;
        padding: 17px 0;
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
  <div class="top-header" role="banner" aria-label="Верхняя панель сайта с логотипом и навигацией">
    <div class="logo" aria-label="Логотип студии">
      <img src="img/logo.png" alt="Логотип Lavender Sound Studio" />
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
    <h1>Контакты</h1>
    <section class="contacts-info" aria-label="Контактная информация">
      <div class="contact-item">
        <div class="contact-icon" aria-hidden="true">📝</div>
        <div class="contact-text">
          <div class="contact-text__title">Напишите на почту</div>
          <a href="mailto:isip_d.s.gaivoronskiy@mpt.ru" class="contact-text__link">isip_d.s.gaivoronskiy@mpt.ru</a>
        </div>
      </div>
      <div class="contact-item">
        <div class="contact-icon" aria-hidden="true">📍</div>
        <div class="contact-text">
          <div class="contact-text__title">Приходитеd нашу студию</div>
          <a href="stores.html" class="contact-text__link">г. Москва, ул. Нежинская, д. 7</a>
        </div>
      </div>
      <div class="contact-item">
        <div class="contact-icon" aria-hidden="true">📞</div>
        <div class="contact-text">
          <div class="contact-text__title">Позвоните по номеру</div>
          <a href="tel:+78007777771" class="contact-text__phone">8 999 999-99-99</a>
        </div>
      </div>
    </section>
    <section class="client-prompt" aria-label="Запрос авторизации клиента">
      <div>
        <div class="client-prompt__text">Являетесь ли вы клиентом Студии Звукозаписи?</div>
        <div class="client-prompt__subtext">Авторизуйтесь для заполнения меньшего количества полей</div>
      </div>
      <button class="client-prompt__btn" onclick="location.href='auth.php'">Авторизоваться</button>
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