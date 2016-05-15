<!DOCTYPE html>
<html lang="ja">
<head>

	<meta charset="utf-8">
	<title><?php echo $this->fetch('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		echo $this->element('css');
		echo $this->element('script');
	?>

</head>
<body>

<?php if($this->Session->read('msgContent') && $this->Session->read('msgType')): ?>
	<script type="text/javascript">
		$(function() {
			noty({text: '<?php echo $this->Session->read('msgContent'); ?>', layout: 'top', type: '<?php echo $this->Session->read('msgType'); ?>', timeout: 4000});
		});
	</script>
	<?php
	var_dump($this->Session->read('msgContent'));
		$this->Session->delete('msgContent');
		$this->Session->delete('msgType');
	var_dump($this->Session->read('msgContent'));
	?>
<?php endif; ?>

<?php echo $this->element('header'); ?>
<?php //echo $this->element('dialog'); ?>
<div class="ch-container">
	<div class="row">
<!--		@if( !isset($page_type) || $page_type !== "login")-->
<!--		@include("base/menu")-->
<!--		@endif-->
<!--		@yield("content")-->
		<?php echo $this->fetch('content'); ?>
	</div>
	<hr>
	<?php echo $this->element('footer'); ?>
</div>
</body>
