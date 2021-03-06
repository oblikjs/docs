<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $page->title() ?> &bull; Example &bull; <?= $site->title() ?>
	</title>

	<?= css('assets/main.css') ?>

	<?php if ($sheet = $page->getStylesheetURL()) : ?>
		<?= css($sheet) ?>
	<?php endif ?>

	<style>
		<?= $page->getStyles() ?>
	</style>
</head>

<body class="overflow-x-hidden">
	<?= $page->getMarkup() ?>

	<?php if ($page->inlineScript()->isTrue()) : ?>
		<script>
			<?= $page->getScriptText() ?>
		</script>
	<?php else : ?>
		<?= js('assets/polyfills.js') ?>
		<?= js($page->getScriptURL()) ?>
	<?php endif ?>
</body>

</html>
