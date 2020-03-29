<?php
$cruds = json_decode(file_get_contents("{$api_gateway}/cruds"), true);
?>
<div class="w3-bar w3-black">
<?php foreach($cruds as $index => $crud): ?>
    <a class="w3-bar-item w3-btn <?php echo $_SESSION['crud']==$index?'w3-red':''; ?>" href="index.php?crud=<?php echo $index; ?>"><?php echo $crud[0]; ?></a>
<?php endforeach; ?>
</div>
