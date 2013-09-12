<?php require('header.php');?>

<style type="text/css">
    .comments {
        margin-bottom:20px;
        font-size: 0.8em;
    }
    .date, .author {

        margin-right: 10px;    
    }
    .content {
        padding: 5px 0 0 20px;
    }
    .entry {
        padding-left: 20px;
    }
    h1 {
        margin-bottom: 10px;
    }
    .pages {
        margin-bottom: 40px;
    }
</style>

<h1>Записи в моем блоге</h1>

<?php foreach ($records as $row): ?>
    <div class="entry">
        <h3>
            <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['header']?></a>
            <?php if (IS_ADMIN): ?>
            <a href="?act=edit-entry&id=<?=$row['id']?>"<i class="icon-edit"></i></a>
            <a href="?act=delete-entry&id=<?=$row['id']?>"<i class="icon-trash"></i></a>
            <?php endif ?>
        </h3>
        <p class="content"><?=$row['content']?></p>
        <div class="comments">
            <span class="date"><?=$row['date']?></span>
            <span class="author"><?=$row['author']?></span>
            <a href="?act=view-entry&id=<?=$row['id']?>"><?=$row['comments']?> comments</a>
        </div>
    </div>
<?php endforeach ?>

<div class="pages">
<strong>Pages:</strong>
<?php for ($i = 1; $i <= $pages; $i++): ?>
    <?php if ($i == $page): ?> <strong><?=$i?></strong>
    <?php else: ?><a href="?page=<?=$i?>"><?=$i?></a>
    <?php endif ?>
<?php endfor ?>
</div>

<?php if (IS_ADMIN): ?> 
<h1>Add new entry:</h1>
<form action="?act=do-new-entry" method="POST" class="well">
    <label>Author</label>
    <input name="author" type="text"/>
    <label>Header</label>
    <input name="header" type="text"/>
    <label>Content</label>
    <textarea name="content" ></textarea>
    <div style="padding-top: 10px;">
    <button type="submit" class="btn">
        Post
    </button>
    </div>
</form>
<?php endif ?>
<?php require('footer.php');?>
