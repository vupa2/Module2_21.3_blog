<h2>Edit post</h2>
<form method="post" action="/index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $post->id; ?>"/>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $post->title ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="teaser">Teaser</label>
        <textarea name="teaser" id="teaser" class="form-control"><?php echo $post->teaser ?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control"><?php echo $post->content ?></textarea>
    </div>
    <div class="form-group">
        <label for="created">Created</label>
        <input type="date" id="created" name="created" value="<?php echo $post->created ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Edit" class="btn btn-primary"/>
        <a href="/" class="btn btn-default">Cancel</a>
    </div>
</form>