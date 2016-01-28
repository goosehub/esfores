<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>
  /s4s/ 2016 Film Festival
  </title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="esfores">
  <meta name="description" content="esfores">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">

<!-- Style -->
  <link rel="stylesheet" href="../resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/tools/4chan_yotsuba_style.css" />

  <style>
  /* Background image and overflow fix */
  body {
    background: #FFE url("../resources/pics/fade.png") repeat-x scroll center top;
    overflow-x: hidden;
  }
  /* Board title */
  .boardTitle {
    letter-spacing: 0em !important;
  }
  .reply {
    color: #800000;
    font-family: arial,helvetica,sans-serif;
    font-size: 10pt;
    padding: inherit;
    margin: inherit;
    font-size: inherit;
    border-left: inherit;
  }
  .reply blockquote {
    max-height: 600px;
    overflow: hidden;
  }
  /* Green Text */
  .greentext {
    color:green;
  }

  .film_container {
  }
  .film_box {
    width: 50vw;
    display: inline;
  }
  .film {
  }
  .film_submit_review {

  }
  .film_iframe {
    width: 50vw;
    height: 50vh;
    margin-left: 25vw;
  }
  </style>

<!-- Fonts -->

<!-- Icon -->
  <!-- <link rel="shortcut icon" href="../resources/images/favicon.ico"> -->
<!-- IE Fallback -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

<div class="boardBanner">
  <div class="boardTitle">Welcome to the /s4s/ Film Festival!</div>
</div>

<hr>

<?php
// Connection
include '../connect.php';

// If new post
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST["submit_mail"]) )
{

// Set variables
$name = $_POST['name'];
$name = $name === '' ? 'Anonymous' : $name;
$com = $_POST['com'];
$rating = isset($_POST['rating']) ? $_POST['rating'] : 5;
$film = $_POST['film'];

// Do not allow empty comments
if ($com === '') {
  header('Location: .');
  exit();
}

// Sanitize data
$name = mysqli_real_escape_string($con, $name);
$com = mysqli_real_escape_string($con, $com);
$rating = mysqli_real_escape_string($con, $rating);
$film = mysqli_real_escape_string($con, $film);

// Enter message
$query = "INSERT INTO `film_reviews`(`name`, `comment`, `stars`, `film`) 
VALUES ('" . $name . "','" . $com . "','" . $rating . "','" . $film . "');";
$result = mysqli_query($con, $query);

header('Location: .');

}  
?>

<div class="film_container">



  <span class="film_box">
    <h2 class="text-center">ses sitcom</h2>
    <h3 class="text-center">by Anonymous</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/WeVnt_JwBsE" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="1"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 1
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">Meditation.exe</h2>
    <h3 class="text-center">by Anonymous</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/hosqaSIKOvk" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="2"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 3
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">Allahu Akbar Especia...</h2>
    <h3 class="text-center">by I want to die</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/v8iu8iDyIIE" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="3"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 3
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>






  <span class="film_box">
    <h2 class="text-center">Trash to the future</h2>
    <h3 class="text-center">by The Riker</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/rTKmF82G5sY" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="4"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 4
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>


  <span class="film_box">
    <h2 class="text-center">ses</h2>
    <h3 class="text-center">by AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/TSFyHxFIJFc" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="5"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 5
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">wew lad</h2>
    <h3 class="text-center">by Anonymous</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/LWimm0ModPU" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="6"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 6
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">Awoo in london</h2>
    <h3 class="text-center">by me on the left</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/szsCFjihRsA" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="7"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 7
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">Shiggy Diggy</h2>
    <h3 class="text-center">by Anonymous</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/lP1KntHF90E" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="8"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 8
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>



  <span class="film_box">
    <h2 class="text-center">SPider bITe</h2>
    <h3 class="text-center">by Anonymous</h3>
    <div class="film">
      <iframe class="film_iframe" src="https://www.youtube.com/embed/99hDl0eQMR8" frameborder="0" allowfullscreen></iframe>
    </div>
    <br><br>
    <div class="film_submit_review">
      <form action="index.php" method="post">
        <input type="hidden" name="film" value="9"/>
        <table style="display: table;" class="postForm hideMobile" id="postForm">
          <tbody>
            <tr data-type="Name">
              <td>Name</td>
              <td><input name="name" tabindex="1" placeholder="Anonymous" type="text"><input id="submit_button" value="Post" tabindex="6" type="submit"></td>
            </tr>
            <tr data-type="Comment">
              <td>Comment</td>
              <td><textarea name="com" cols="48" rows="4" tabindex="4" wrap="soft"></textarea></td>
            </tr>
            <tr>
              <td>Rating</td>
              <td>
                <span class="starRating">
                  <input id="rating5" type="radio" name="rating" value="5" checked>
                  <label for="rating5">5</label>
                  <input id="rating4" type="radio" name="rating" value="4">
                  <label for="rating4">4</label>
                  <input id="rating3" type="radio" name="rating" value="3">
                  <label for="rating3">3</label>
                  <input id="rating2" type="radio" name="rating" value="2">
                  <label for="rating2">2</label>
                  <input id="rating1" type="radio" name="rating" value="1">
                  <label for="rating1">1</label>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="film_reviews">
      <?php
      // Get reviews
      $homepage_query = "SELECT *
              from film_reviews
              WHERE film = 9
              ORDER BY id DESC
              LIMIT 10000;";
      ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="reply_col col-md-8">
            <?php // Loop through comments
            if ($query_result = mysqli_query($con, $homepage_query)) {
              while($row = mysqli_fetch_assoc($query_result)) { ?>
              <div id="p4070865" class="post reply">
              <strong><?php echo $row['stars']; ?> Stars</strong><br>
                <div class="postInfo desktop">
                  <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
                  <span class="dateTime"><?php echo date('m/d/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
                  <span class="postNum desktop">
                    <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
                  </span>
                </div>
                <blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
    </div>
  </span>




</div>

<?php
    // https://bootstrapbay.com/blog/working-bootstrap-contact-form/
        $result = '';
        if (isset($_POST["submit_mail"])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $youtube = $_POST['youtube'];
            $message = $_POST['message'];
            $human = $_POST['human'];
            $from = 'Potential Film Maker'; 
            $to = 'goosepostbox@gmail.com'; 
            $subject = '/s4s/ Film Festival ';
     
            // Check if name has been entered
            if (!$_POST['name']) {
                echo $errName = 'Please enter your name';
            }
            
            // Check if email has been entered and is valid
            if (!$_POST['email']) {
                echo $errEmail = 'Please enter a valid email address';
            }
            
            //Check if message has been entered
            if (!$_POST['youtube']) {
                echo $errYoutube = 'Please enter your youtube URL';
            }
            
            //Check if message has been entered
            if (!$_POST['message']) {
                echo $errMessage = 'Please enter your message';
            }
            //Check if simple anti-bot test is correct
            if (strtolower($human) != 'topkek') {
                echo $errHuman = 'The answer is topkek';
            }
            // If there are no errors, send the email
            if (!isset($errName) && !isset($errEmail) && !isset($errYoutube) && !isset($errMessage) && !isset($errHuman)) {
              // Load PHPMailer
              require_once '../resources/PHPMailer-5.2.9/PHPMailerAutoload.php';
              $mail = new PHPMailer;
              // Configure
              $mail->CharSet = 'UTF-8';
              $mail->isHTML(false);
              $mail->From = 'webform@esfores.com';
              $mail->FromName = '/s4s/ Director';
              // Add recipitants
              $mail->addAddress('goosepostbox@gmail.com');
              // Construct the email
              $mail->Subject = '/s4s/ Film Festival';
            
              $body = "From: $name\n E-Mail: $email\n Youtube URL: $youtube\n Message:\n $message";
              // Attach message
              $mail->Body = $body;
              // Send mail
              if(!$mail->send()) {
                $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
              } 
              else 
              {
                $result = '<div class="alert alert-success">Thank You! I will be in touch</div>';
              }
            }
        }
    ?>

    <hr>

    <h2 class="text-center">Submit your film</h2>

    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-6">

        <form class="form-horizontal" role="form" method="post" action="index.php">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Namefig</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="Anonymous">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="moot@4chan.org" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="youtube" class="col-sm-4 control-label">Youtube URL</label>
                <div class="col-sm-8">
                    <input type="youtube" class="form-control" id="youtube" name="youtube" placeholder="https://www.youtube.com/watch?v=Lj9vGuFAJsU" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-4 control-label">Message</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="4" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="human" class="col-sm-4 control-label">Top + Kek = ?</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="human" name="human" placeholder="topkek">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <input id="submit" name="submit_mail" type="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <?php echo $result; ?>  
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-4"></div>

</body>
</html>