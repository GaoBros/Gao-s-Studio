<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Личный кабинет — Gao's</title>
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
    
    .user-info {
      background: #2a2645;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 0 16px #5b4b8a;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    
    .user-details h3 {
      color: #c2affd;
      font-size: 1.8rem;
      margin-bottom: 20px;
    }
    
    .user-details p {
      font-size: 1.1rem;
      margin: 12px 0;
      color: #d0c0f0;
      display: flex;
      align-items: center;
    }
    
    .user-details strong {
      color: #b497d6;
      min-width: 180px;
      display: inline-block;
    }
    
    .services-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 25px;
    }
    
    .service-card {
      background: #2a2645;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 0 12px rgba(147, 112, 219, 0.4);
      transition: transform 0.3s ease;
    }
    
    .service-card:hover {
      transform: translateY(-5px);
    }
    
    .service-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .service-name {
      color: #c2affd;
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
    }
    
    .service-status {
      background: #4a3f78;
      color: #d0c0f0;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
    }
    
    .service-details {
      margin-bottom: 15px;
    }
    
    .service-detail {
      display: flex;
      margin-bottom: 8px;
    }
    
    .service-label {
      color: #b497d6;
      font-weight: 600;
      min-width: 120px;
    }
    
    .service-value {
      color: #d0c0f0;
    }
    
    .btn {
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .btn-primary {
      background: #b497d6;
      color: #1a1a2e;
    }
    
    .btn-primary:hover {
      background: #c2affd;
      transform: translateY(-2px);
    }
    
    /* Модальное окно */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
    }
    
    .modal-content {
      background-color: #2a2645;
      margin: 5% auto;
      padding: 30px;
      border-radius: 16px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 0 20px rgba(180, 150, 214, 0.3);
    }
    
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    
    .modal-title {
      color: #c2affd;
      font-size: 1.5rem;
      margin: 0;
    }
    
    .close {
      color: #b497d6;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }
    
    .close:hover {
      color: #c2affd;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-label {
      display: block;
      color: #b497d6;
      margin-bottom: 8px;
      font-weight: 600;
    }
    
    .form-input {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #4a3f78;
      background: #1a1a2e;
      color: #d0c0f0;
      font-size: 1rem;
      box-sizing: border-box;
    }
    
    .form-input:focus {
      outline: none;
      border-color: #b497d6;
    }
    
    .form-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 30px;
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
      .user-info {
        grid-template-columns: 1fr;
      }
      
      .services-list {
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
      
      .service-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
      
      .user-details p {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .user-details strong {
        min-width: auto;
        margin-bottom: 5px;
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
      <a href="register.php">Выйти</a>
    </nav>
  </div>

  <main class="container" role="main">
    <h1>Личный кабинет</h1>
    
    <section class="user-profile" aria-label="Профиль пользователя">
      <h2>Мой профиль</h2>
      <div class="user-info">
        <div class="user-details">
          <h3>Александр Петров</h3>
          <p><strong>Email:</strong> alex.petrov@example.com</p>
          <p><strong>Телефон:</strong> +7 (999) 123-45-67</p>
          <p><strong>Дата регистрации:</strong> 15.03.2024</p>
          <p><strong>Статус:</strong> Постоянный клиент</p>
          <button class="btn btn-primary" id="editProfileBtn" style="margin-top: 15px;">Редактировать профиль</button>
        </div>
      </div>
    </section>
    
    <section class="user-services" aria-label="Мои услуги">
      <h2>Мои записи на услуги</h2>
      <div class="services-list">
        <div class="service-card">
          <div class="service-header">
            <h3 class="service-name">Запись вокала</h3>
            <span class="service-status">Запланировано</span>
          </div>
          <div class="service-details">
            <div class="service-detail">
              <span class="service-label">Дата:</span>
              <span class="service-value">15.11.2025</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Время:</span>
              <span class="service-value">14:00 - 16:00</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Студия:</span>
              <span class="service-value">Основная студия</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Инженер:</span>
              <span class="service-value">Алексей Иванов</span>
            </div>
          </div>
        </div>
        
        <div class="service-card">
          <div class="service-header">
            <h3 class="service-name">Сведение трека</h3>
            <span class="service-status">В работе</span>
          </div>
          <div class="service-details">
            <div class="service-detail">
              <span class="service-label">Дата начала:</span>
              <span class="service-value">05.11.2025</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Ориентировочная дата готовности:</span>
              <span class="service-value">20.11.2025</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Проект:</span>
              <span class="service-value">"Осенний ветер"</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Инженер:</span>
              <span class="service-value">Мария Смирнова</span>
            </div>
          </div>
        </div>
        
        <div class="service-card">
          <div class="service-header">
            <h3 class="service-name">Мастеринг альбома</h3>
            <span class="service-status">Завершено</span>
          </div>
          <div class="service-details">
            <div class="service-detail">
              <span class="service-label">Дата завершения:</span>
              <span class="service-value">28.10.2025</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Проект:</span>
              <span class="service-value">"Городские ритмы"</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Инженер:</span>
              <span class="service-value">Олег Петров</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Оценка:</span>
              <span class="service-value">★★★★★</span>
            </div>
          </div>
        </div>
        
        <div class="service-card">
          <div class="service-header">
            <h3 class="service-name">Аранжировка</h3>
            <span class="service-status">Запланировано</span>
          </div>
          <div class="service-details">
            <div class="service-detail">
              <span class="service-label">Дата:</span>
              <span class="service-value">22.11.2025</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Время:</span>
              <span class="service-value">11:00 - 13:00</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Студия:</span>
              <span class="service-value">Студия №2</span>
            </div>
            <div class="service-detail">
              <span class="service-label">Инженер:</span>
              <span class="service-value">Мария Смирнова</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Модальное окно редактирования профиля -->
  <div id="editProfileModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Редактирование профиля</h3>
        <span class="close">&times;</span>
      </div>
      <form id="profileForm">
        <div class="form-group">
          <label class="form-label" for="firstName">Имя</label>
          <input type="text" id="firstName" class="form-input" value="Александр" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="lastName">Фамилия</label>
          <input type="text" id="lastName" class="form-input" value="Петров" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" class="form-input" value="alex.petrov@example.com" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="phone">Телефон</label>
          <input type="tel" id="phone" class="form-input" value="+7 (999) 123-45-67" required>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-secondary" id="cancelEdit">Отмена</button>
          <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
      </form>
    </div>
  </div>

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

  <script>
    // Получаем элементы модального окна
    const modal = document.getElementById('editProfileModal');
    const editBtn = document.getElementById('editProfileBtn');
    const closeBtn = document.querySelector('.close');
    const cancelBtn = document.getElementById('cancelEdit');
    const profileForm = document.getElementById('profileForm');
    
    // Открытие модального окна
    editBtn.addEventListener('click', function() {
      modal.style.display = 'block';
    });
    
    // Закрытие модального окна через крестик
    closeBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });
    
    // Закрытие модального окна через кнопку отмены
    cancelBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });
    
    // Закрытие модального окна при клике вне его
    window.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
    
    // Обработка отправки формы
    profileForm.addEventListener('submit', function(event) {
      event.preventDefault();
      
      // Получаем значения из формы
      const firstName = document.getElementById('firstName').value;
      const lastName = document.getElementById('lastName').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      
      // Здесь должен быть код для отправки данных на сервер
      // В демо-версии просто обновляем данные на странице
      
      // Обновляем данные на странице
      const userDetails = document.querySelector('.user-details');
      userDetails.querySelector('h3').textContent = `${firstName} ${lastName}`;
      
      const details = userDetails.querySelectorAll('p');
      details[0].innerHTML = `<strong>Email:</strong> ${email}`;
      details[1].innerHTML = `<strong>Телефон:</strong> ${phone}`;
      
      // Закрываем модальное окно
      modal.style.display = 'none';
      
      // Показываем уведомление об успешном сохранении
      alert('Данные профиля успешно обновлены!');
    });
  </script>
</body>
</html>