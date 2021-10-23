<?php

//入力された値の設定

if (isset($_POST['times'])) {
  $times = $_POST['times'];
} else {
  //エラー
  $times = 0;
}
if (isset($_POST['num_correct'])) {
  $num_correct = $_POST['num_correct'];
} else {
  //エラー
  $num_correct = 0;
}
?>

<?php
$question0 = [
  "世界で2番目に高い山は？", "富士山", "K2", "エベレスト",
  "img/huzi.jpg", "img/k2.jpg", "img/everest.jfif"
];
$question1 = [
  "最初に桃太郎の仲間になったのは？", "老夫婦", "犬", "サル",
  "img/grandpm.jpg", "img/dog.jpg", "img/monky.jpg"
];
$question2 = [
  "円周率の5番目の数字は？", "3", "2", "5",
  "img/3.png", "img/2.png", "img/5.png"
];
$question3 = [
  "イングランド出身の猫は？", "アメリカン・ショートヘア", "シャム猫", "マンチカン",
  "img/cat_1.jpg", "img/cat_2.jpeg", "img/cat_3.jpeg"
];

?>
<?php

$arr = [$question0, $question1, $question2, $question3];

$response_left = $arr[$times][1];
$response_center = $arr[$times][2];
$response_right = $arr[$times][3];

$response_pic_left = $arr[$times][4];
$response_pic_center = $arr[$times][5];
$response_pic_right = $arr[$times][6];
?>

<?php
$response = $_POST['response'];
//答えが正解のときの順番
$answer = ["center", "left", "right", "right"];

if ($response == $answer[$times]) {
  $t_or_f = 1;
  $num_correct = $num_correct + 1;
} else {
  $t_or_f = 0;
}

if ($t_or_f == 1) {
?>
  <div class="true">
    正解です
  </div>
<?php
} else {
?>
  <div class="false">
    不正解です
  </div>
<?php }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>QUIZ</title>
  <link rel="stylesheet" type="text/css" href="quiz_result.css">
</head>

<body>
  <div class="main">
    <div class="site-logo">
      <img src="img/quiz.png" alt="logo">
    </div>
    <div class="question-title">
      <?php
      $a = $times + 1;
      echo "第", "$a", "問";
      ?>
    </div>
    <div class="border-hedder"></div>

    <div class="question-instruction">
      <?php echo $arr[$times][0]; ?>
    </div>

    <div class="q-logo">
      <img src="img/q.png" alt="logo">
    </div>


    <div class="question-box">
      <!-- 左の選択肢が正解のとき -->
      <?php if ($answer[$times] == "left") { ?>
        <div class="question-box-left">
          <div class="c-mark">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
            </svg>
          </div>
          <div class="question-number1">①</div>
          <div class="question-text"><?php echo $response_left; ?>
            <input id="check-a" type="radio" name="response" value="left" checked><label for="check-a"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_left; ?>" alt="logo"></div>
        </div>

        <!-- 不正解 -->
      <?php } else { ?>

        <div class="question-box-left-white">
          <div class="question-number1">①</div>
          <div class="question-text"><?php echo $response_left; ?>
            <input id="check-a" type="radio" name="response" value="left" checked><label for="check-a"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_left; ?>" alt="logo"></div>
        </div>

      <?php } ?>



      <?php if ($answer[$times] == "center") { ?>
        <div class="question-box-center">
          <div class="c-mark">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
            </svg>
          </div>
          <div class="question-number2">②</div>
          <div class="question-text"><?php echo $response_center; ?>
            <input id="check-b" type="radio" name="response" value="center"><label for="check-b"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_center; ?>" alt="logo"></div>
        </div>

      <?php } else { ?>
        <div class="question-box-center-white">
          <div class="question-number2">②</div>
          <div class="question-text"><?php echo $response_center; ?>
            <input id="check-b" type="radio" name="response" value="center"><label for="check-b"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_center; ?>" alt="logo"></div>
        </div>
      <?php } ?>



      <?php if ($answer[$times] == "right") { ?>
        <div class="question-box-right">
          <div class="c-mark">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
            </svg>
          </div>
          <div class="question-number3">③</div>
          <div class="question-text"><?php echo $response_right; ?>
            <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_right; ?>" alt="logo"></div>
        </div>
      <?php } else { ?>
        <div class="question-box-right-white">
          <div class="question-number3">③</div>
          <div class="question-text"><?php echo $response_right; ?>
            <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
          </div>
          <div class="question-image"><img src="<?php echo $response_pic_right; ?>" alt="logo"></div>
        </div>
      <?php } ?>

      <?php $times = $times + 1; ?>
      <?php if ($times != 3) { ?>
        <form method="POST" class="form" action="quiz.php">
          <input type="hidden" name="times" value=<?php echo $times; ?>>
          <input id="send_button" type="submit" value="次の問題へ" style="background-color:#FFFF99;">
          <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
        </form>
      <?php } else { ?>
        <form method="POST" class="form" action="result.php">
          <input id="send_button" type="submit" value="結果を表示" style="background-color:#FFFF99;">
          <input type="hidden" name="num_correct" value=<?php echo $num_correct; ?>>
        </form>
      <?php } ?>







      </div>

    </div>
</body>

</html>
