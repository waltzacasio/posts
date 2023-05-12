<h1><?= $title;?></h1>
<hr>
<p><?= $body;?></p>
<br>
<p>Date published : <?= $date; ?></p>
<div class="btn-group">
    <a href="edit/<?= $id;?>" class="btn btn-primary">Edit</a>
    <a href="delete/<?= $id;?>" class="btn btn-danger">Delete</a>
</div>