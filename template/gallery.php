<div class="vision">
	<a href="index.php?ctrl=Image&act=prev&img=<?php echo --$_GET['img'] ?>"><i class="image-left fa
	fa-caret-left"></i></a>
	<a href="#"><img title="<?php echo $image->alt ?>" class="photo" src="/images/<?php echo $image->url ?>"></a>
	<a href="index.php?ctrl=Image&act=next&img=<?php echo 2+$_GET['img'] ?>"><i class="image-right fa
	fa-caret-right"></i></a>
	<p><?php echo $image->id ?></p>
</div>