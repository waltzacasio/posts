<h1><?= $title;?></h1>
<ul>
    <?php foreach($posts as $row){?>
    <li><a href="<?= base_url();?><?= $row['id'];?>"><?= $row['title'];?></a></li>
    <?php } ?>
</ul>