<header id="header" role="banner">
	<div class="clearfix wrapper">
		<div>
			<h2><a href="<?php echo url_for('@homepage'); ?>">Forge</a></h2>
			<p>Welcome to the MooTools Forge, the resource for plugins for <a href="/core">MooTools Core</a> and <a href="/more">More</a>.</p>
			<p>For plugins, applications and modules for the new line of MooTools modules, you are encouraged to use the <a href="https://npmjs.org">the NPM registry</a> instead.</p>
		</div>
	</div>
</header>

<div class="block">	
	<h3 class="blue"><span>Recently added (<?php echo link_to('all', '@browse') ?>) <?php echo link_to(image_tag('/images/feed.gif'), 'recentfeed', array('format' => 'rss201')) ?></span></h3>	
	
	<?php if ($hot->count()): ?>	
	<ul class="projects">
		<?php foreach ($recent as $i => $plugin): ?>
		<?php include_partial('plugin/bit', array('plugin' => $plugin, 'i' => $i)) ?>
		<?php endforeach ?>
	</ul>
	<?php else: ?>
	<p>No plugins to show</p>
	<?php endif ?>
</div>

<hr class="clear" />

<div class="block">
	<h3 class="blue"><span>Most downloaded (<?php echo link_to('all', '@browse?sort=downloads_count') ?>)</span></h3>
	
	<?php if ($hot->count()): ?>
	<ul class="projects">
		<?php foreach ($hot as $i => $plugin): ?>
		<?php include_partial('plugin/bit', array('plugin' => $plugin, 'i' => $i)) ?>
		<?php endforeach ?>
	</ul>	
	<?php else: ?>
	<p>No plugins to show</p>
	<?php endif ?>
</div>

<hr class="clear" />

<div class="block span-8 colborder" id="home-recent-active">
	<h3 class="blue"><span>Recently active</span></h3>
		
	<div class="meta">
		<?php echo link_to('View all', '@developers') ?>
	</div>
	
	<?php if ($authors->count()): ?>
	<ul class="authors">
		<?php foreach ($authors as $author): ?>
		<li>
			<a href="<?php echo url_for('user', array('username' => $author->getUsername())) ?>">
				<span class="avatar"><?php echo avatar_for($author) ?></span>
				<span class="name"><?php echo $author->getFullName() ?></span>
				<?php if ($author->getPluginsCount()): ?><span class="badge"><?php echo $author->getPluginsCount() ?></span><?php endif ?>				
			</a>
		</li>	
		<?php endforeach ?>
	</ul>
	<?php else: ?>
	<p>No recently active users</p>
	<?php endif ?>
	
</div>

<div class="block span-8 last">
	<h3 class="blue"><span>Popular tags</span></h3>
	
	<?php if ($terms->count()): ?>
	<ul class="tags-list">
		<?php foreach ($terms as $term): ?>
		<li><?php echo link_to($term, 'browse', array('tag' => $term->getSlug())) ?></li>
		<?php endforeach ?>
	</ul>
	<?php else: ?>
	<p>No tags to show</p>
	<?php endif; ?>
</div>
