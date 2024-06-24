<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetMusic</title>
    <link rel="stylesheet" href="lichkab.css ">
</head>
<body>
    <header class="header">
        <a class="header_logo" href="main.html" ><img src="pic/logo.png" alt="#"></a>
        <div class="header_nav">
            <a href="likes.html" class="header_nav_a">Избранные</a>
            <a href="charts.php" class="header_nav_a">Чарты</a>
            <a href="news.html" class="header_nav_a">Новости</a>
        </div>
        <div class="header_right">
            <a  href="#" class="header_icon"><img src="pic/lupa.svg" alt="#"></a>
            <a href="lichcab.html" class="header_icon"><img src="pic/lichkab.svg" alt="#"></a>
        </div>
    </header>
    <?php
  session_start();
  
  if(isset($_SESSION['user_id'])) {
    $userRole = $_SESSION['user_role'];
    $userName = $_SESSION['user_name'];

    $adminTag = $userRole == 2 ? "<span style='color: red;'>(Администратор)</span>" : "";
  } else {
  
    header('Location: registration.php');
    exit();
  }
?>
<div class="user">
    <h2 class="user_title">Информация об пользователе</h2>
    <div class="user_line"></div>
    <div class="user_content">
      <img src="pic/Ellipse 1.png" class="user_image">
      <div class="user_info">
        <h3 class="user_name"><?php echo $userName . " " . $adminTag; ?></h3>
        <p class="user_city">Moldova, <span id="userCity">Gagausia</span></p>
        <p class="user_text" id="userDescription">Меня зовут Cool Man и я родом из Гагаузии поэтому я cool!!!</p>
    </div>
    </div>
  </div>
  <?php if ($userRole == 2):?>
  <div class="admin-panel" style='text-align: center; padding-bottom:40px'>
          <h2>Добавление трека в бд</h2>
          <form action="add_track.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nameTrack" placeholder="Название трека" required>
            <input type="text" name="artistTrack" placeholder="Исполнитель" required>
            <input type="text" name="timeTrack" placeholder="Длительность трека" required>
            <input type="text" name="janr" placeholder="Жанр" required>
            <input type="file" name="songFile" accept=".mp3" required>
            <input type="submit" value="Добавить трек">
          </form>
        </div>
  <?php endif;?>
  <?php if ($userRole == 2):?>
  <div class="admin-panel" style='text-align: center; padding-bottom:40px'>
          <h2>Добавление жанра в бд</h2>
          <form action="add_track.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nameTrack" placeholder="Название жанра" required>
            <input type="submit" value="Добавить жанр">
          </form>
        </div>
        <?php endif;?>
 <?php if ($userRole == 2):?>
        <h2>Добавление артиста</h2>
          <form action="add_track.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nameTrack" placeholder="Имя артиста" required>
            <input type="submit" value="Добавить артиста">
          </form>
        </div> 
 <?php endif;?>

  <?php if ($userRole == 2):?>
  <?php
  
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'MetMusic');

if (isset($_POST['update'])) {
    $id = $_POST['track_id'];
    $name = $_POST['NameTrack'];
    $price = $_POST['ArtistTrack'];
    $description = $_POST['TimeTrack'];
    $img = $_POST['janr_id'];
    
    $query = "UPDATE `tracks` SET `track_id`='$id', `NameTrack`='$name', `ArtistTrack`='$price', `TimeTrack`='$description', `janr_id`='$img' WHERE `track_id`='$id'";
    mysqli_query($connect, $query);
}

if (isset($_POST['delete'])) {
    $id = $_POST['track_id'];
    $query = "DELETE FROM `tracks` WHERE `track_id`='$id'";
    mysqli_query($connect, $query);
}

$result = mysqli_query($connect, "SELECT * FROM `tracks`");
$models = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result1 = mysqli_query($connect, "SELECT tracks.NameTrack FROM tracks JOIN Janr ON tracks.janr_id = Janr.janr_id WHERE Janr.janr_id = 1");
$tracksByGenre = mysqli_fetch_all($result1, MYSQLI_ASSOC);

$result2 = mysqli_query($connect, "SELECT tracks.NameTrack FROM tracks JOIN Artists ON tracks.ArtistTrack = Artists.NameArtist WHERE Artists.artist_id = 1");
$tracksByArtist = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$result3 = mysqli_query($connect, "SELECT Alboms.NameAlbom FROM Alboms JOIN Artists ON Alboms.artist_id = Artists.artist_id WHERE Artists.artist_id = 1");
$albumsByArtist = mysqli_fetch_all($result3, MYSQLI_ASSOC);

echo "<h3>1 ЗАПРОС Треки по жанру:</h3>";
echo "<ul>";
foreach ($tracksByGenre as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . "</li>";
}
echo "</ul>";

echo "<h3>2 ЗАПРОС Треки по артисту:</h3>";
echo "<ul>";
foreach ($tracksByArtist as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . "</li>";
}
echo "</ul>";

echo "<h3>3 ЗАПРОС Альбомы по артисту:</h3>";
echo "<ul>";
foreach ($albumsByArtist as $album) {
    echo "<li>" . htmlspecialchars($album['NameAlbom']) . "</li>";
}
echo "</ul>";

$result4 = mysqli_query($connect, "SELECT tracks.NameTrack FROM tracks JOIN Alboms ON tracks.track_id = Alboms.track_id WHERE Alboms.alboms_id = 2");
$tracksByAlbumId = mysqli_fetch_all($result4, MYSQLI_ASSOC);
echo "<h3>4 ЗАПРОС Треки по ID альбома:</h3>";
echo "<ul>";
foreach ($tracksByAlbumId as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . "</li>";
}
echo "</ul>";

// Запрос 5
$result5 = mysqli_query($connect, "SELECT Alboms.NameAlbom FROM Alboms");
$allAlboms = mysqli_fetch_all($result5, MYSQLI_ASSOC);
echo "<h3>5 ЗАПРОС Все альбомы:</h3>";
echo "<ul>";
foreach ($allAlboms as $album) {
    echo "<li>" . htmlspecialchars($album['NameAlbom']) . "</li>";
}
echo "</ul>";

// Запрос 6
$result6 = mysqli_query($connect, "SELECT login, email FROM accounts");
$accountsInfo = mysqli_fetch_all($result6, MYSQLI_ASSOC);
echo "<h3> 6 ЗАПРОС Логин и email всех аккаунтов:</h3>";
echo "<ul>";
foreach ($accountsInfo as $account) {
    echo "<li>" . htmlspecialchars($account['login']) . " - " . htmlspecialchars($account['email']) . "</li>";
}
echo "</ul>";

// Запрос 7
$result7 = mysqli_query($connect, "SELECT Alboms.NameAlbom FROM Alboms WHERE Alboms.artist_id = 1");
$albomsByArtistId = mysqli_fetch_all($result7, MYSQLI_ASSOC);
echo "<h3>7 ЗАПРОС Альбомы по ID артиста:</h3>";
echo "<ul>";
foreach ($albomsByArtistId as $album) {
    echo "<li>" . htmlspecialchars($album['NameAlbom']) . "</li>";
}
echo "</ul>";

// Запрос 8
$result8 = mysqli_query($connect, "SELECT tracks.NameTrack FROM tracks JOIN likes ON tracks.track_id = likes.track_id WHERE likes.account_id = 7");
$likedTracks = mysqli_fetch_all($result8, MYSQLI_ASSOC);
echo "<h3>8 ЗАПРОС Треки, которые нравятся пользователю с ID 7:</h3>";
echo "<ul>";
foreach ($likedTracks as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . "</li>";
}
echo "</ul>";

// Запрос 9
$result9 = mysqli_query($connect, "SELECT tracks.NameTrack, tracks_count.play_count
FROM tracks 
JOIN tracks_count  ON tracks.track_id = tracks_count.track_id
ORDER BY tracks_count.play_count DESC;
");
$tracksByPlayCount = mysqli_fetch_all($result9, MYSQLI_ASSOC);
echo "<h3>9 ЗАПРОС Треки с наибольшим количеством воспроизведений:</h3>";
echo "<ul>";
foreach ($tracksByPlayCount as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . " - " . htmlspecialchars($track['play_count']) . "</li>";
}
echo "</ul>";

// Запрос 10
$result10 = mysqli_query($connect, "SELECT tracks.NameTrack, trackYear.year
FROM tracks 
JOIN trackYear  ON tracks.track_id = trackYear.track_id
WHERE trackYear.year = 2021
ORDER BY tracks.NameTrack;");
$tracksByYear = mysqli_fetch_all($result10, MYSQLI_ASSOC);
echo "<h3> 10 ЗАПРОС Треки, выпущенные в 2020 году:</h3>";
echo "<ul style=' padding-bottom:80px'>";
foreach ($tracksByYear as $track) {
    echo "<li>" . htmlspecialchars($track['NameTrack']) . "</li>";
}
echo "</ul>";

?>
    <h1 style=' padding-bottom:50px'>Управление Таблицей Треков</h1>
    <h2 style=' padding-bottom:20px'>Удаление трека из БД</h2>
    <table style='padding-bottom:40px'>
        <tr  style='text-align: center;'>
            <th>ID Трека</th>
            <th>Название трека</th>
            <th>Артист</th>
            <th>Время</th>
            <th>Жанр(ID)</th>
        </tr>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model['track_id'] ?></td>
            <td><?= $model['NameTrack'] ?></td>
            <td><?= $model['ArtistTrack'] ?></td>
            <td><?= $model['TimeTrack'] ?></td>
            <td><?= $model['janr_id'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="track_id" value="<?= $model['track_id'] ?>">
                    <input type="submit" name="delete" value="Удалить">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2 style=' padding-bottom:20px'>Изменить данные трека</h2>
    <form method="post" style=' padding-bottom:40px' >
    ID Трека <input type="number" name="track_id">
    Название трека: <input type="text" name="NameTrack">
    Артист: <input type="text" name="ArtistTrack">
    Время: <input type="text" name="TimeTrack">
    Жанр(ID): <input type="number" name="janr_id">
        <input type="submit" name="update" value="Изменить">
    </form>
    <h2  style=' padding-bottom:20px'>Добавить трек в БД</h2>
    <form class="hid" action="yourscript.php" method="post" style=' padding-bottom:40px'>
    Название трека:<br>
      <input type="text" name="NameTrack">
      <br>
      Время:<br>
      <input type="text" name="TimeTrack">
      <br>
      Артист:<br>
      <input type="text" name="ArtistTrack">
      <br><br>
      Жанр(ID)<br>
      <input type="text" name="janr_id">
      <br><br>
      <input type="submit" value="Submit">
    </form>
    <?php endif;?>
      <div class="album">
        <h2 class="album_title">Ваши альбомы</h2>
        <div class="album_container">
            <div class="album_card">
                <img  class="album_img" src="pic/likeee.png" >
                <div class="album_info">
                    <h3 class="album_sub">Ваши любимые треки </h3>
                    <a href="likes.html" class="album_a">Слушать</a>
                </div>
            </div>

            <div class="album_card">
                <img  class="album_img" src="pic/charteee.png">
                <div class="album_info">
                    <h3 class="album_sub">Чарты MetMusic</h3>
                    <a href="charts.php" class="album_a">Слушать</a>
                </div>
            </div>

            <div class="album_card">
                <img  class="album_img" src="pic/sooneee.png">
                <div cclass="album_info">
                    <h3 class="album_sub">Новостной релиз</h3>
                    <a href="news.html" class="album_a">Слушать</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sub">
        <p  class="sub_p">Напишите вашу почту ниже, чтобы получать рассылку от <br> MetMusic и быть в курсе каждого события.</p>
        <div class="sub_input">
          <input type="text" value="Ваш email" id="textbox" onfocus="if(this.value == 'Ваш email') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Ваш email'; }">
          <button class="sub_btn" onclick="submitFunction()">Подписаться</button>
        </div>
        <p class="sub_pre">Нажимая на кнопку “Подписаться”, вы принимаете правила пользовательского соглашения</p>
      </div>
    <footer class="footer">
        <img src="pic/logo.png" class="footer_logo">
        <ul class="footer_links">
          <li class="footer_links_li"><a class="footer_links_a" href="likes.html">Избранные</a></li>
          <li class="footer_links_li"><a class="footer_links_a" href="charts.php">Чарты</a></li>
          <li class="footer_links_li"><a class="footer_links_a" href="news.html">Новости</a></li>
        </ul>
      </footer>
    <script src="main.js"></script>
</body>
</html>