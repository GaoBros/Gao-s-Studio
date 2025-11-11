<?php
include "DB.php";

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$email || !$password) {
        $errors[] = "Все поля обязательны для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email указан неверно.";
    }

    if (empty($errors)) {
        // Проверка клиента с проверкой пароля
        $stmt = $conn->prepare("SELECT ID_Client, First_name, Last_name, Email, Phone, Password FROM clients WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Проверяем пароль (в текущей базе пароли хранятся в открытом виде)
            if ($password === $user['Password']) {
                $_SESSION['user'] = [
                    'id' => $user['ID_Client'],
                    'first_name' => $user['First_name'],
                    'last_name' => $user['Last_name'],
                    'email' => $user['Email'],
                    'phone' => $user['Phone'],
                    'type' => 'client'
                ];
                $success = "Успешный вход! Перенаправляем...";
                header('Refresh: 2; URL=account.php');
            } else {
                $errors[] = "Неверный email или пароль.";
            }
        } else {
            $errors[] = "Неверный email или пароль.";
        }
        $stmt->close();
    }
}

// Если пользователь уже авторизован, перенаправляем в профиль
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Авторизация — Gao's Studio</title>
<style>
  body {
    background-color: #121212;
    color: #ddd;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin:0;
    padding:0; 
    display:flex; 
    flex-direction: column;
    min-height:100vh;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  .top-header {
    display: flex; 
    align-items: center;
    justify-content: space-between;
    background: #201f2b;
    padding: 12px 24px;
    box-shadow: 0 2px 8px rgba(180,150,214,0.2);
  }
  .logo {
    width: 140px; 
    height: 40px;
     background: transparent; 
    display: flex; 
    align-items:center;
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
    text-decoration: none;
    transition: color 0.3s ease;
  }
  nav a::after {
    content: ''; position: absolute; bottom: 0; left:0; right:0; height: 3px; background-color: transparent; transition: background-color 0.3s ease; border-radius: 2px;
  }
  nav a:hover::after {
    background-color: #b497d6;
  }
  nav a:hover {
    color: #d4c9f9;
  }
  .main-content {
    flex: 1; display: flex; justify-content: center; align-items: flex-start; padding: 20px;
  }
  .auth-container {
    background-color: #1e1e2d; border-radius: 14px; box-shadow: 0 0 40px rgba(147,112,219,0.6); width: 500px; padding: 30px 35px; box-sizing: border-box;
  }
  h1 {
    margin: 0 0 30px; color: #b39ddb; font-weight: 700; font-size: 1.8rem; text-align: center;
  }
  .form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
  }
  .full-width {
    grid-column: 1 / -1;
  }
  label {
    display: flex; flex-direction: column; font-weight: 600; font-size: 1.1rem;
  }
  input[type="email"],
  input[type="password"] {
    margin-top: 8px; padding: 14px 16px; font-size: 1.3rem; border-radius: 8px; border: none; background-color: #312f57;
    color: #eee; font-weight: 500; box-shadow: inset 0 0 5px rgba(147,112,219,0.8);
    transition: background-color 0.3s ease, box-shadow 0.3s ease; width: 100%; box-sizing: border-box;
  }
  input[type="email"]:focus,
  input[type="password"]:focus {
    background-color: #433f75; box-shadow: 0 0 10px 3px #a58ffb; outline: none; color: #fff;
  }
  button {
    padding: 16px; font-size: 1.5rem; font-weight: 700; color: #fff; background: linear-gradient(90deg, #8971f9, #b08bfd);
    border: none; border-radius: 10px; cursor: pointer; box-shadow: 0 5px 20px rgba(147,112,219,0.7);
    transition: background 0.3s ease, box-shadow 0.3s ease; margin-top: 10px;
  }
  button:hover {
    background: linear-gradient(90deg, #b08bfd, #8971f9); box-shadow: 0 8px 28px rgba(179,142,253,0.9);
  }
  .auth-messages {
    margin-bottom: 20px; font-weight: 600; font-size: 1rem; color: #ef9385; text-align: center;
  }
  .auth-success {
    color: #8fd6b2;
  }
  .register-link {
    text-align: center; margin-top: 20px; font-weight: 600; font-size: 1rem;
  }
  .register-link a {
    color: #b497d6; text-decoration: none;
  }
  .register-link a:hover {
    text-decoration: underline;
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

  @media (max-width: 550px) {
    .auth-container {
      width: 95%; padding: 25px 20px;
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
    <img src="img/logo.png" alt="Логотип Gao's Studio" />
  </div>
  <nav role="navigation" aria-label="Основное меню сайта">
    <a href="index.php">Главная</a>
    <a href="services.php">Услуги</a>
    <a href="about.php">О нас</a>
    <a href="contacts.php">Контакты</a>
    <a href="auth.php">Войти</a>
  </nav>
</div>
<div class="main-content">
  <section class="auth-container">
    <h1>Авторизация</h1>
    <?php if($success): ?>
    <div class="auth-messages auth-success"><?= $success ?></div>
    <?php elseif (!empty($errors)): ?>
    <div class="auth-messages"><?= implode('<br>', $errors) ?></div>
    <?php endif; ?>

    <form method="POST" novalidate>
      <div class="form-grid">
        <label for="email" class="full-width">Email
          <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
        </label>
        <label for="password" class="full-width">Пароль
          <input type="password" id="password" name="password" required />
        </label>
        <button type="submit" class="full-width">Войти</button>
      </div>
    </form>
    <p class="register-link">Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
  </section>
</div>

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