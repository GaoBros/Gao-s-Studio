<?php
include "DB.php";

// Предположим, что у вас есть система авторизации, и ID текущего клиента хранится в сессии
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit();
}
$current_client_id = $_SESSION['user_id'];

// Загрузка списка услуг и студий для формы
$services = $conn->query("SELECT ID_Service, Name FROM services");
$studios = $conn->query("SELECT ID_Studio, Name FROM studios");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_service = $_POST['id_service'];
    $id_studio = $_POST['id_studio'];
    $date_session = $_POST['date_session'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $stmt = $conn->prepare("INSERT INTO sessions (ID_Client, ID_Service, ID_Studio, Date_session, Start_time, End_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisss", $current_client_id, $id_service, $id_studio, $date_session, $start_time, $end_time);

    if ($stmt->execute()) {
        $msg = "Запись на сеанс успешно создана!";
    } else {
        $msg = "Произошла ошибка при записи на сеанс.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Запись на сеанс — Lavender Sound Studio</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #1a1a2e;
      color: #c8cce6;
      min-height: 100vh;
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

    main {
      max-width: 485px;
      margin: 50px auto;
      background: #201f2b;
      border-radius: 20px;
      box-shadow: 0 0 32px #6a5ed544;
      padding: 38px 30px;
    }

    h1 {
      color: #b497d6;
      font-weight: 700;
      font-size: 2.3rem;
      margin-bottom: 30px;
      text-align: center;
    }

    .session-form-group {
      margin-bottom: 23px;
      display: flex;
      flex-direction: column;
    }

    .session-form-group label {
      margin-bottom: 8px;
      font-weight: 600;
      font-size: 1.1rem;
    }

    .session-form-group input,
    .session-form-group select {
      padding: 12px 14px;
      border-radius: 10px;
      border: none;
      background: #2a2645;
      color: #ddd;
      font-size: 1rem;
    }

    .session-form-group input:focus,
    .session-form-group select:focus {
      outline: 2px solid #b497d6;
      background: #3a3270;
    }

    .session-form-btn {
      margin-top: 20px;
      background: linear-gradient(90deg, #8971f9, #b08bfd);
      color: #fff;
      border: none;
      padding: 16px 0;
      font-size: 1.2rem;
      font-weight: 700;
      cursor: pointer;
      border-radius: 14px;
      box-shadow: 0 5px 15px rgba(147, 112, 219, 0.6);
      transition: background 0.3s, box-shadow 0.3s;
      text-align: center;
      width: 100%;
    }

    .session-form-btn:hover {
      background: linear-gradient(90deg, #b08bfd, #8971f9);
      box-shadow: 0 7px 25px rgba(179, 142, 253, 0.8);
    }

    .session-success {
      color: #8fd6b2;
      text-align: center;
      margin-bottom: 18px;
      font-size: 1.17rem;
      font-weight: 600;
    }

    .session-error {
      color: #ef9385;
      text-align: center;
      margin-bottom: 18px;
      font-size: 1.17rem;
      font-weight: 600;
    }

    @media (max-width: 700px) {
      main {
        width: 98%;
        padding: 20px;
      }

      h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="top-header">
    <div class="logo">
      <img src="img/logo.png" alt="Логотип Lavender Sound Studio" />
    </div>
    <nav>
      <a href="index.php">Главная</a>
      <a href="services.php">Услуги</a>
      <a href="about.php">О нас</a>
      <a href="contacts.php">Контакты</a>
      <a href="auth.php">Войти</a>
    </nav>
  </div>

  <main>
    <h1>Запись на сеанс</h1>
    <?php if ($msg) : ?>
      <div class="<?= ($msg === 'Запись на сеанс успешно создана!') ? 'session-success' : 'session-error' ?>"><?= $msg ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="session-form-group">
        <label for="id_service">Услуга</label>
        <select name="id_service" id="id_service" required>
          <option value="">Выберите услугу</option>
          <?php while ($service = $services->fetch_assoc()) : ?>
            <option value="<?= $service['ID_Service'] ?>"><?= htmlspecialchars($service['Name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="session-form-group">
        <label for="id_studio">Студия</label>
        <select name="id_studio" id="id_studio" required>
          <option value="">Выберите студию</option>
          <?php while ($studio = $studios->fetch_assoc()) : ?>
            <option value="<?= $studio['ID_Studio'] ?>"><?= htmlspecialchars($studio['Name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="session-form-group">
        <label for="date_session">Дата сеанса</label>
        <input type="date" name="date_session" id="date_session" required />
      </div>
      <div class="session-form-group">
        <label for="start_time">Время начала</label>
        <input type="time" name="start_time" id="start_time" required />
      </div>
      <div class="session-form-group">
        <label for="end_time">Время окончания</label>
        <input type="time" name="end_time" id="end_time" required />
      </div>
      <button type="submit" class="session-form-btn">Записаться</button>
    </form>
  </main>
</body>

</html>
