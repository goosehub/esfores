<h2 id="contributeHeadline"> Contribute </h2>
<!-- Error Display -->
<?php 
//if statement prevents unidentified error variables
if (validation_errors()
	|| $errorCode
	|| $errorInvalid
	|| $errorExists)
	{
	echo '<div class="alert alert-danger" role="alert">';
	echo validation_errors();
	echo $errorCode;
	echo $errorInvalid;
	echo $errorExists;
	echo '</div>';
	}
?>

<?php echo form_open_multipart('news/contribute') ?>

	<div id="inputAuthor" class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon">Author</div>
			<select class="form-control" name="author">
			  <option value="Anonymous">Anonymous</option>
			  <option value="Unknown">Unknown</option>
			  <option value="Undisclosed">Undisclosed</option>
			  <option value="Unidentified">Unidentified</option>
			  <option value="Unacknowledged">Unacknowledged</option>
			  <option value="Uncredited">Uncredited</option>
			  <!-- <option value="Bob">Bob</option> -->
			  <!-- <option value="Jack">Jack</option> -->
			  <!-- <option value="Amy">Amy</option> -->
			</select>
		</div>
	</div>

	<div id="inputCategory" class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon">Category</div>
			<select class="form-control" name="category">
			  <!-- <option value="S4S">S4S</option> -->
			  <!-- <option value="4Chan">4Chan</option> -->
			  <option value="World Wide Web">World Wide Web</option>
			  <option value="Opinion">Opinion</option>
			  <option value="Advice">Advice</option>
			  <option value="Reviews">Reviews</option>
			  <option value="Interviews">Interviews</option>
			  <option value="Investigations">Investigations</option>
			  <option value="Showcase">Showcase</option>
			</select>
		</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Title</div>
	<input class="form-control" type="input" name="title" /><br />
	</div>

    <div class="input-group">
      <div class="input-group-addon">Body</div>
	<textarea class="form-control" name="text" rows="12"></textarea><br />
	</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon contributeFileAddon">Cover Image</div>
		<input class="form-control contributeFile" name="userfile" type="file" />
	</div>


    <div class="input-group">
      <div class="input-group-addon">Caption</div>
	<textarea class="form-control" name="caption" rows="4"></textarea><br />
	</div>
	</div>

	<input class="form-control input-lg" id="contributeSubmit" type="submit" name="submit" value="Contribute" />

</form>