<?php
//Sanitize for HTML characters
$news_item['title'] = htmlentities($news_item['title']);
$news_item['author'] = htmlentities($news_item['author']);
$news_item['filename'] = htmlentities($news_item['filename']);
$news_item['caption'] = htmlentities($news_item['caption']);
$news_item['text'] = htmlentities($news_item['text']);

echo '<h1 id="viewTitle">'.$news_item['title'].'</h1>';
echo '<h5 class="articleAuthor">By <strong>'.$news_item['author'].'</strong></h5>';
echo '<h6 class="articleDate">Submitted on '.$news_item['date'].' EST</h6>';
echo '<img class="coverImage img-thumbnail" src="/tribune/images/'.$news_item['filename'].'">';
echo '<em id="caption">'.$news_item['caption'].'</em>';
echo '<p id="articleBody">'.nl2br($news_item['text']).'</p>';
?>
<a href="../news"><button type="button" class="btn btn-default">Return to News Feed</button></a>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">

<h2>Join the Discussion</h2>

<?php 
	if (validation_errors() )
	{
	echo '<div class="alert alert-danger" role="alert">';
	echo validation_errors(); 
	echo '</div>';
	}

	$link = $this->uri->uri_string();
	echo form_open($link);
?>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Name</div>
	<input type="input" class="form-control" name="name" value="Anonymous" /><br />
	</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Comment</div>
	<textarea class="form-control" name="text" rows="4"></textarea><br />
	</div>
	</div>

	<input id="commentSubmit" class="form-control input-lg" type="submit" name="submit" value="Comment" />

</form>
<?php
foreach ($comments as $row) {

//Sanitize for HTML characters
$row['name'] = htmlentities($row['name']);
$row['text'] = htmlentities($row['text']);

echo '<h3>'.$row['name'].'</h3>';
echo nl2br($row['text']);
}
?>
</div>
<div class="col-md-2"></div>
</div>
