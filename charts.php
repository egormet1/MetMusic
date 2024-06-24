<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetMusic</title>
    <link rel="stylesheet" href="charts.css">
</head>
<body>
  <header class="header">
    <a class="header_logo" href="main.html" ><img src="pic/logo.png" alt="#"></a>
    <div class="header_nav">
      <a href="likes.html" class="header_nav_a">Избранные</a>
      <a href="charts.html" class="header_nav_a">Чарты</a>
      <a href="news.html" class="header_nav_a">Новости</a>
    </div>
    <div class="header_right">
      <a href="#" class="header_icon"><img src="pic/lupa.svg" alt="#"></a>
      <a href="javascript:void(0);" class="header_lichcab" id="openRegistrationPopup"><img src="pic/lichkab.svg" alt="Личный кабинет"></a>
     </div>
    <button class="burger-menu" id="burgerMenu">
      <span class="burger-menu__line"></span>
      <span class="burger-menu__line"></span>
      <span class="burger-menu__line"></span>
    </button>
    <div class="mobile-nav" id="mobileNav">
      <a href="likes.html" class="mobile-nav__link">Избранные</a>
      <a href="charts.html" class="mobile-nav__link">Чарты</a>
      <a href="news.html" class="mobile-nav__link">Новости</a>
    </div>
  </header>
      <div class="popup" id="registrationPopup">
        <span class="close" id="closeRegistrationPopup">&times;</span>
        <h2>Регистрация</h2>
        <form>
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye show-password" id="showPassword"></i>
            </div>
            <div class="form-group">
                <label for="confirm-password">Подтверждение пароля</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <i class="fas fa-eye show-password" id="showConfirmPassword"></i>
            </div>
            <button type="submit" class="button">Создать аккаунт</button>
        </form>
        <a id="switchToLogin" class="down">Есть аккаунт</a>
      </div>
    </div>
    <div class="popup" id="loginPopup">
      <span class="close" id="closeLoginPopup">&times;</span>
      <h2>Авторизация</h2>
      <form>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" id="password" name="password" required>
              <i class="fas fa-eye show-password" id="showPassword"></i>
          </div>
          <div class="form-group">
              <label for="confirm-password">Подтверждение пароля</label>
              <input type="password" id="confirm-password" name="confirm-password" required>
              <i class="fas fa-eye show-password" id="showConfirmPassword"></i>
          </div>
          <button type="submit" class="button1">Войти</button>
      </form>
      <a id="switchToRegistration" class="down1">У меня нет аккаунта</a>
    </div>
  </div>
    <div class="chart">
        <h2 class="chart_title">Лучшие треки</h2>
        <div class="chart_images">
          <div class="chart_images_f">
            <h3 class="chart_h">2 место</h3>
            <img src="pic/og1.png">
            <p class="chart_p">Бандиты</p>
            <p class="chart_p1">Исполнитель:OG Buda</p>
          </div>
          <div class="chart_images_s">
            <h3 class="chart_h">1 место</h3>
            <img src="pic/lsp1.png" >
            <p class="chart_p">Тело</p>
            <p class="chart_p1">Исполнитель:LSP</p>
          </div>
          <div class="chart_images_t">
            <h3 class="chart_h">3 место</h3>
            <img src="pic/dt1.png">
            <p class="chart_p">Монополия</p>
            <p class="chart_p1">Исполнитель:Дайте танк</p>
          </div>
        </div>
      </div>
      <div class="track_list">
      <div class="track">
          <audio id="music"  src="muz/Gnida-SM.mp3"></audio>
          <img class="track_img" src="pic/lsp1.png" onclick="togglePlayStop(this.parentNode)">
          <div class="play-icon">▶</div>
          <div class="stop-icon">■</div>
          <div class="track_info">
            <div class="track_info_h" id="like-2">Тело</div>
            <div class="track_info_p">ЛСП</div>
          </div>
          <div class="heart" id="heart">♥</div>
          <div class="track_time">1:44</div>
        </div>
        <div class="track">
          <audio id="music"  src="muz/demon-SM.mp3"></audio>
          <img class="track_img" src="pic/ogCHARTS.png" onclick="togglePlayStop(this.parentNode)">
          <div class="play-icon">▶</div>
          <div class="stop-icon">■</div>
          <div class="track_info">
            <div class="track_info_h">Бандиты</div>
            <div class="track_info_p">OG Buda</div>
          </div>
          <div class="heart" id="heart">♥</div>
          <div class="track_time">2:12</div>
        </div>
        <div class="track">
            <audio id="music" src="muz/SWAG-SM,163.mp3"></audio>
            <img class="track_img" src="pic/dt1.png" onclick="togglePlayStop(this.parentNode)">
            <div id="play-icon" class="play-icon">▶</div>
            <div id="stop-icon" class="stop-icon">■</div>
            <div class="track_info">
                <div class="track_info_h">Монополия</div>
                <div class="track_info_p">Дайте танк </div>
            </div>
            <div class="heart" id="heart">♥</div>
            <div class="track_time">2:31</div>
        </div>          
        <div class="track">
            <audio id="music" src="muz/Kotleta-SM.mp3"></audio>
            <img class="track_img" src="pic/albom.png" onclick="togglePlayStop(this.parentNode)">
            <div id="play-icon" class="play-icon">▶</div>
            <div id="stop-icon" class="stop-icon">■</div>
            <div class="track_info">
                <div class="track_info_h">Котлета</div>
                <div class="track_info_p">Scally Milano</div>
            </div>
            <div class="heart" id="heart">♥</div>
            <div class="track_time">1:56</div>
        </div>          
        <?php include 'display_tracks.php'; ?>            
    </div>
    <footer class="footer">
      <img src="pic/logo.png" class="footer_logo">
      <ul class="footer_links">
        <li class="footer_links_li"><a class="footer_links_a" href="likes.html">Избранные</a></li>
        <li class="footer_links_li"><a class="footer_links_a" href="charts.html">Чарты</a></li>
        <li class="footer_links_li"><a class="footer_links_a" href="news.html">Новости</a></li>
      </ul>
    </footer>
      <script src="main.js"></script>
</body>
</html>