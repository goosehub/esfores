<div id="indexCon">
<?php foreach ($news as $news_item): ?>

<?php
//Sanitize for HTML characters
$news_item['title'] = htmlentities($news_item['title']);
$news_item['author'] = htmlentities($news_item['author']);
$news_item['filename'] = htmlentities($news_item['filename']);
$news_item['caption'] = htmlentities($news_item['caption']);
$news_item['text'] = htmlentities($news_item['text']);
?>

	<div class="row indexItem">
	  <div class="col-md-3">

	<?php echo '<img class="coverImage" src="/tribune/images/'.$news_item['filename'].'">'; ?>

	</div><div class="col-md-9">

    <h2 class="indexHeadline"><?php echo $news_item['title'] ?></h2>
	<h4 class="articleAuthor">By <strong><?php echo $news_item['author'] ?></strong></h4>

    <div class="indexText">
        <p><?php echo $news_item['text'] ?></p>
    </div>
    <a href="/tribune/news/<?php echo $news_item['slug'] ?>" class="readMoreLink" >
	<button type="button" class="readMore btn btn-default">Read More</button>
	</a>
	<button class="articleCategory btn btn-disabled" disabled="disabled"><?php echo $news_item['category'] ?></button>

	  </div>
	  </div>
<?php endforeach ?>
</div>