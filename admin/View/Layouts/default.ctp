<!DOCTYPE html>
<html lang="ja">
<head>

	<meta charset="utf-8">
	<title><?php echo $this->fetch('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">)

	<?php echo $this->element('css'); ?>
	@include("base/css")
	@include("base/script")

</head>
<body>
@if(Session::get('messageContent') != null && Session::get('messageType') != null)
<script type="text/javascript">
	$(function() {
		noty({text: '{{Session::get("messageContent")}}', layout: 'top', type: '{{Session::get("messageType")}}', timeout: 5000});
	});
</script>
@endif

@include("base/header")
@include("base/dialog")
<div class="ch-container">
	<div class="row">
		@if( !isset($page_type) || $page_type !== "login")
		@include("base/menu")
		@endif
		@yield("content")
	</div>
	<hr>
	@include("base/footer")
</div>
</body>
