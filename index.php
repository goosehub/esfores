<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>
  esfores.com
  </title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="esfores">
  <meta name="description" content="esfores">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">

<!-- Style -->
  <link rel="stylesheet" href="resources/tools/bootstrap-grid.min.css" />
  <link rel="stylesheet" href="resources/tools/4chan_yotsuba_style.css" />
  <link rel="stylesheet" href="resources/tools/4chan_global_style.css" />

  <style>
  /* Background image and overflow fix */
  body {
    background: #FFE url("resources/pics/fade.png") repeat-x scroll center top;
    overflow-x: hidden;
  }
  /* Board title */
  .boardTitle {
    letter-spacing: 0em !important;
  }
  #boards .column {
    width: 100%;
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
  /* Green Text */
  .greentext {
    color:green;
  }
  </style>

<!-- Fonts -->

<!-- Icon -->
  <!-- <link rel="shortcut icon" href="resources/images/favicon.ico"> -->
<!-- IE Fallback -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->

<div class="boardBanner">
  <div class="boardTitle">esfores.com</div>
</div>

<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">

    <div class="box-outer top-box" id="boards">
    <div class="box-inner">
    <div class="boxbar">
    <h2>Boards</h2>
    <div id="filter-container" class="yui-skin-sam menubutton"><a id="filter-button" href="#">filter</a><div style="position: absolute; visibility: hidden; width: 200px; z-index: 1; left: -11118.3px; top: -10674.7px;" class="yui-module yui-overlay yuimenu" id="filtermenu"><div class="bd"><ul class="first-of-type"><li index="0" groupindex="0" id="yui-gen0" class="yuimenuitem first-of-type yuimenuitem-checked"><a class="yuimenuitemlabel yuimenuitemlabel-checked" href="#">Show All Boards</a></li><li index="1" groupindex="0" id="yui-gen1" class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Show NSFW Boards Only</a></li><li index="2" groupindex="0" id="yui-gen2" class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Show Worksafe Boards Only</a></li><li index="3" groupindex="0" id="yui-gen3" class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Show All Boards (Classic)</a></li></ul><ul><li index="0" groupindex="1" id="yui-gen4" class="yuimenuitem first-of-type"><a target="_top" class="yuimenuitemlabel" href="//www.4chan.org/frames/">Use Frames</a></li><li index="1" groupindex="1" id="yui-gen5" class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Use Catalog</a></li></ul></div></div></div>
    </div>
    <div class="boxcontent">

    <div class="column">
    <h3 style="text-decoration: underline; display: inline;">Pages</h3>
    <ul>
    <li><a href="are_birds_that_important" class="boardlink" title="Are Birds That Important?">Are Birds That Important?</a></li>
    <li><a href="tribunemagazine" class="boardlink" title="Tribune Magazine">Tribune Magazine</a></li>
    <li><a href="tribune/news" class="boardlink" title="Tribune News Online">Tribune News Online</a></li>
    <li><a href="http://channelcentral.me/esfores" class="boardlink" title="esfores Chat">esfores Chat</a></li>
    <li><a href="radio" class="boardlink" title="radio">Nice Radio</a></li>
    <li><a href="http://landgrab.xyz/world/4chan" class="boardlink" title="4chan world">4chan world</a></li>
    <li><a href="resources/pics/water.png" class="boardlink" title="water">water</a></li>
    <!-- <li><a href="random" class="boardlink" title="random">random</a></li> -->
    </ul>
    </div>
    <br class="clear-bug">
    </div>
    </div>
    </div>

  </div>
</div>

<hr>

<form action="homepage_post.php" method="post">
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
    </tbody>
  </table>
</form>

<br>

<?php
// Get comments

include 'connect.php';

// Not That Important
$homepage_query = "SELECT *
        from homepage
        ORDER BY id ASC
        LIMIT 10000;";
?>

  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

      <?php // Loop through comments
      if ($query_result = mysqli_query($con, $homepage_query)) {
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
  </div>

    <!-- Script -->
  <script type="text/javascript" src="resources/tools/jquery-1.8.3.min.js"></script>
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
  </script>

</body>
</html>