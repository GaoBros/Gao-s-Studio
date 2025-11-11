<?php
include "DB.php";

// Обработка POST (добавление, редактирование, удаление)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add' || $action === 'edit') {
        $id = $_POST['session_id'] ?? null;
        $date_session = $_POST['date_session'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $id_service = $_POST['id_service'];
        $id_employee = $_POST['id_employee'];
        $id_studio = $_POST['id_studio'];
        $id_client = $_POST['id_client'];

        if ($action === 'add') {
            $stmt = $conn->prepare("INSERT INTO sessions (Date_session, Start_time, End_time, ID_Service, ID_Employee, ID_Studio, ID_Client) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiiii", $date_session, $start_time, $end_time, $id_service, $id_employee, $id_studio, $id_client);
            $stmt->execute();
            $stmt->close();
        } elseif ($action === 'edit' && $id) {
            $stmt = $conn->prepare("UPDATE sessions SET Date_session=?, Start_time=?, End_time=?, ID_Service=?, ID_Employee=?, ID_Studio=?, ID_Client=? WHERE ID_Session=?");
            $stmt->bind_param("sssiiiii", $date_session, $start_time, $end_time, $id_service, $id_employee, $id_studio, $id_client, $id);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'delete') {
        $id = $_POST['session_id'];
        $stmt = $conn->prepare("DELETE FROM sessions WHERE ID_Session=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: admin_sessions.php");
    exit();
}

// Получение сессий с объединениями
$query = "
SELECT s.ID_Session, s.Date_session, s.Start_time, s.End_time,
       srv.Name AS Service_name,
       CONCAT(emp.First_name, ' ', emp.Last_name) AS Employee_name,
       std.Name AS Studio_name,
       CONCAT(cl.First_name, ' ', cl.Last_name) AS Client_name
FROM sessions s
LEFT JOIN services srv ON s.ID_Service = srv.ID_Service
LEFT JOIN employees emp ON s.ID_Employee = emp.ID_Employee
LEFT JOIN studios std ON s.ID_Studio = std.ID_Studio
LEFT JOIN clients cl ON s.ID_Client = cl.ID_Client
ORDER BY s.Date_session DESC, s.Start_time DESC";

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gao's — Управление сессиями</title>
  <style>
  body {
    margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #1a1a2e; color: #c8cce6; min-height: 100vh; display: flex; flex-direction: column;
  }
  .top-header {
    display:flex; align-items:center; justify-content:space-between; background:#201f2b; padding:12px 24px; box-shadow:0 2px 8px rgba(180,150,214,0.2);
  }
  .logo {
    width:140px; height:40px; background:transparent; display:flex; align-items:center;
  }
  .logo img {
    max-width: 100%; max-height: 100%; object-fit: contain; display: block;
  }
  nav {
    display: flex; gap: 26px;
  }
  nav a {
    font-weight:600; font-size:1.1rem; color:#b497d6; text-decoration:none; position:relative;
  }
  nav a::after {
    content:""; position:absolute; bottom:0; left:0; right:0; height:3px; background:transparent; transition:background-color 0.3s ease; border-radius:2px;
  }
  nav a:hover::after {
    background-color:#b497d6;
  }
  nav a:hover {
    color:#d4c9f9;
  }
  main.container {
    max-width:1200px; margin:40px auto; padding:0 20px 40px; flex:1;
  }
  h1 {
    color:#b497d6; font-weight:700; font-size:2.5rem; margin-bottom:30px;
  }
  table {
    width:100%; border-collapse:collapse;
  }
  th, td {
    padding:12px 16px; border-bottom:1px solid #402f82; text-align:left; font-size:1.1rem;
  }
  th {
    background:#201f2b; color:#b497d6; font-weight:700;
  }
  tbody tr:hover {
    background:#2e2a55; cursor:pointer;
  }
  button {
    background:#b497d6; color:#1a1a2e; border:none; padding:6px 14px; font-weight:700; border-radius:8px; cursor:pointer; font-size:0.9rem; margin-right:8px;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background:#9b87c3;
  }
  .form-modal {
    position: fixed; top:50%; left:50%; transform: translate(-50%, -50%);
    background: #201f2b; padding: 20px 30px; border-radius: 16px;
    box-shadow: 0 0 40px #6a5ed5dd; min-width: 320px; z-index: 1000;
    display: none; flex-direction: column;
  }
  .form-modal.active {
    display: flex;
  }
  .form-modal h2 {
    color:#b497d6; margin-bottom:16px; font-size:1.8rem;
  }
  .form-group {
    margin-bottom:16px; display:flex; flex-direction:column;
  }
  .form-group label {
    margin-bottom:6px; font-weight:600; font-size:1rem;
  }
  .form-group input, .form-group select {
    padding:10px 14px; border-radius:8px; border:none;
    background:#2a2645; color:#ddd; font-size:1rem;
  }
  .form-group input:focus, .form-group select:focus {
    outline:2px solid #b497d6; background:#3a3270;
  }
  .form-actions {
    display:flex; justify-content:flex-end; margin-top:10px;
  }
  .overlay {
    position: fixed; top:0; left:0; right:0; bottom:0;
    background: rgba(0,0,0,0.75); z-index: 999; display: none;
  }
  .overlay.active {
    display: block;
  }
  </style>
</head>
<body>

<div class="top-header" role="banner" aria-label="Верхняя панель сайта с логотипом и навигацией">
  <div class="logo" aria-label="Логотип студии">
    <img src="logo.png" alt="Логотип Lavender Sound Studio" />
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
  <h1>Управление сессиями</h1>
  <button id="btn-add-session">Добавить сессию</button>
  <table aria-label="Таблица сессий">
    <thead>
      <tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Начало</th>
        <th>Конец</th>
        <th>Услуга</th>
        <th>Сотрудник</th>
        <th>Студия</th>
        <th>Клиент</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['ID_Session'] ?></td>
        <td><?= $row['Date_session'] ?></td>
        <td><?= $row['Start_time'] ?></td>
        <td><?= $row['End_time'] ?></td>
        <td><?= htmlspecialchars($row['Service_name']) ?></td>
        <td><?= htmlspecialchars($row['Employee_name']) ?></td>
        <td><?= htmlspecialchars($row['Studio_name']) ?></td>
        <td><?= htmlspecialchars($row['Client_name']) ?></td>
        <td>
          <form method="POST" style="display:inline;">
            <input type="hidden" name="session_id" value="<?= $row['ID_Session'] ?>" />
            <button type="submit" name="action" value="delete" onclick="return confirm('Удалить сессию?')">Удалить</button>
          </form>
          <button type="button" onclick='editSession(<?= json_encode($row) ?>)'>Редактировать</button>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <div class="overlay" id="overlay"></div>

  <div class="form-modal" id="form-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <h2 id="modal-title">Добавить/Редактировать сессию</h2>
    <form id="session-form" method="POST">
      <input type="hidden" name="session_id" id="session_id" />
      <div class="form-group">
        <label for="date_session">Дата сессии</label>
        <input type="date" id="date_session" name="date_session" required />
      </div>
      <div class="form-group">
        <label for="start_time">Время начала</label>
        <input type="time" id="start_time" name="start_time" required />
      </div>
      <div class="form-group">
        <label for="end_time">Время окончания</label>
        <input type="time" id="end_time" name="end_time" required />
      </div>
      <div class="form-group">
        <label for="id_service">Услуга</label>
        <select id="id_service" name="id_service" required>
          <option value="">Выберите услугу</option>
          <?php
          $services = $conn->query("SELECT ID_Service, Name FROM services");
          while ($service = $services->fetch_assoc()) {
            echo "<option value='{$service['ID_Service']}'>{$service['Name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="id_employee">Сотрудник</label>
        <select id="id_employee" name="id_employee" required>
          <option value="">Выберите сотрудника</option>
          <?php
          $employees = $conn->query("SELECT ID_Employee, First_name, Last_name FROM employees");
          while ($emp = $employees->fetch_assoc()) {
            echo "<option value='{$emp['ID_Employee']}'>{$emp['First_name']} {$emp['Last_name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="id_studio">Студия</label>
        <select id="id_studio" name="id_studio" required>
          <option value="">Выберите студию</option>
          <?php
          $studios = $conn->query("SELECT ID_Studio, Name FROM studios");
          while ($studio = $studios->fetch_assoc()) {
            echo "<option value='{$studio['ID_Studio']}'>{$studio['Name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="id_client">Клиент</label>
        <select id="id_client" name="id_client" required>
          <option value="">Выберите клиента</option>
          <?php
          $clients = $conn->query("SELECT ID_Client, First_name, Last_name FROM clients");
          while ($client = $clients->fetch_assoc()) {
            echo "<option value='{$client['ID_Client']}'>{$client['First_name']} {$client['Last_name']}</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-actions">
        <button type="submit" name="action" value="add" class="btn">Сохранить</button>
        <button type="button" class="btn" id="btn-cancel">Отмена</button>
      </div>
    </form>
  </div>
</main>

<script>
const modal = document.getElementById('form-modal');
const overlay = document.getElementById('overlay');
const btnAdd = document.getElementById('btn-add-session');
const btnCancel = document.getElementById('btn-cancel');
const form = document.getElementById('session-form');

btnAdd.addEventListener('click', () => {
  modal.classList.add('active');
  overlay.classList.add('active');
  document.getElementById('modal-title').textContent = 'Добавить сессию';
  form.session_id.value = '';
  form.reset();
  form.action.value = 'add';
});

btnCancel.addEventListener('click', () => {
  modal.classList.remove('active');
  overlay.classList.remove('active');
});

overlay.addEventListener('click', () => {
  modal.classList.remove('active');
  overlay.classList.remove('active');
});

function editSession(session) {
  modal.classList.add('active');
  overlay.classList.add('active');
  document.getElementById('modal-title').textContent = 'Редактировать сессию';
  form.session_id.value = session.ID_Session;
  form.date_session.value = session.Date_session;
  form.start_time.value = session.Start_time;
  form.end_time.value = session.End_time;

  setSelectValue('id_service', session.Service_name);
  setSelectValue('id_employee', session.Employee_name);
  setSelectValue('id_studio', session.Studio_name);
  setSelectValue('id_client', session.Client_name);

  form.action.value = 'edit';
}

function setSelectValue(selectId, text) {
  const select = document.getElementById(selectId);
  for (let option of select.options) {
    if (option.text === text) {
      select.value = option.value;
      break;
    }
  }
}
</script>

</body>
</html>
