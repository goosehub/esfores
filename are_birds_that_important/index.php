<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>
  Are Birds Important?
  </title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="esfores">
  <meta name="description" content="esfores">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">

<!-- Style -->
  <link rel="stylesheet" href="../resources/tools/bootstrap-grid.min.css" />
  <link rel="stylesheet" href="../resources/tools/4chan_yotsuba_style.css" />

  <style>
  /* Background image and overflow fix */
  body {
    background: #FFE url("../resources/pics/fade.png") repeat-x scroll center top;
    overflow-x: hidden;
  }
  /* Opinion titles */
  .birds_are_important, .birds_are_not_that_important {
    border: 1px solid #222;
    overflow: hidden;
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
  <div class="boardTitle">Are Birds That Important?</div>
</div>

<br>

<form action="birds.php" method="post">
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
      <tr data-type="birds">
        <td>Birds</td>
        <td>
          <span class="desktop">

            <?php
            // To ensure fairness
            if (rand(0, 99) >= 50) { ?>

            <label>
              <input name="birds" value="1" tabindex="8" type="radio">
                Are important!
            </label>
            <br>
            <label>
              <input name="birds" value="0" tabindex="8" type="radio">
                Are not that important.
            </label>

            <?php } else { ?>

            <label>
              <input name="birds" value="0" tabindex="8" type="radio">
                Are not that important.
            </label>
            <br>
            <label>
              <input name="birds" value="1" tabindex="8" type="radio">
                Are important!
            </label>

            <?php } ?>

          </span>
        </td>
      </tr>
    </tbody>
  </table>
</form>

<br>

<?php
// Get opinions

include '../connect.php';

// Important
$important_query = "SELECT *
        from birds
        WHERE important = 1
        ORDER BY id DESC
        LIMIT 10000;";

// Not That Important
$not_that_important_query = "SELECT *
        from birds
        WHERE important = 0
        ORDER BY id DESC
        LIMIT 10000;";
?>

  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="birds_are_important col-md-4">

      <h2 class="text-center">Birds are important!</h2>

      <hr>

      <?php // Loop through comments
      if ($query_result = mysqli_query($con, $important_query)) {
        while($row = mysqli_fetch_assoc($query_result)) { ?>

        <div id="p4070865" class="post reply">
          <div class="postInfo desktop">
            <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
            <span class="dateTime"><?php echo date('d/m/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
            <span class="postNum desktop">
              <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
            </span>
          </div><blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
        </div>

      <?php } } ?>

    </div>
    <div class="col-md-2">
    </div>
    <div class="birds_are_not_that_important col-md-4">

      <h2 class="text-center">Birds are not that important.</h2>

      <hr>

      <?php // Loop through comments
      if ($query_result = mysqli_query($con, $not_that_important_query)) {
        while($row = mysqli_fetch_assoc($query_result)) { ?>

        <div id="p4070865" class="post reply">
          <div class="postInfo desktop">
            <span class="nameBlock"><span class="name"><?php echo htmlentities($row['name']); ?></span> </span> 
            <span class="dateTime"><?php echo date('d/m/Y(D)H:i:s', strtotime($row['timestamp'])); ?></span> 
            <span class="postNum desktop">
              <a href="#" title="Link to this post">No.</a><a href="#" title="This link does nothing"><?php echo $row['id']; ?></a>
            </span>
          </div><blockquote class="postMessage"><?php echo nl2br(htmlentities($row['comment'])); ?></blockquote>
        </div>

      <?php } } ?>

    </div>
    <div class="col-md-1">
    </div>
  </div>

    <!-- Script -->
  <script type="text/javascript" src="../resources/tools/jquery-1.8.3.min.js"></script>
  <script>
  // Geenntext
  $.fn.tweetify = function() {
    this.each(function() {
      $(this).html( 
        $(this).html()
          .replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi,'<a href="$1">$1</a>')
          .replace(/(^|\s)#(\w+)/g,'$1<a href="http://search.twitter.com/search?q=%23$2">#$2</a>')
          .replace(/(^|\s)@(\w+)/g,'$1<a href="http://twitter.com/$2">@$2</a>')
          .replace(/(^|\s)&gt;&gt;(\w+)/g,'$1<a href="$2">>>$2</a>')
          .replace(/(^|\s)&gt;(.*?)(<br( )*(\/)?( )*>|\n|$)/g,'$1<span class="greentext">>$2</span>$3')       
      );
    });
    return $(this);
  };
  $('blockquote').tweetify();

  // Require radio button
  $("#submit_button").click(function (e) {
      var none_answered = true;
      $("input:radio").each(function () {
          var name = $(this).attr("name");
          if ($("input:radio[name]:checked").length == 0) {
              e.preventDefault();
              none_answered = false;
          }
      });
      if (none_answered == false) {
          alert("Please decide if birds are that important");
      }
  })  
  </script>

</body>
</html>