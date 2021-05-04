<h2>Create new post</h2>

<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>

<form method="post" action="/?page=add">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="teaser">Teaser</label>
        <textarea name="teaser" id="teaser" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="created">Created</label>
        <input type="date" id="created" name="created" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Create" class="btn btn-primary"/>
        <a href="/" class="btn btn-default">Cancel</a>
    </div>
</form>