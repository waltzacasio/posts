<h1><?= $title;?></h1>
<hr>
<p><?= $body;?></p>
<br>
<p>Date published : <?= $date; ?></p>
<div class="btn-group">
    <a href="edit/<?= $id;?>" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
</div>