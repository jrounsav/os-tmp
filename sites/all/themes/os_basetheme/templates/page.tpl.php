<div id="page" class="container">
	
<!--header regions beg-->
 <?php if($page['header_left'] || $page['header_right'] || $page['header']): ?>
   <header class="clearfix" role="banner">
   	<div id="header-container">
     <!--header main region beg-->
     <?php print render($page['header']); ?>
     <!--header main region end-->
     <!--header left region beg-->
      <?php print render($page['header_left']); ?>
      <!--header left region end-->
      <!--header right region beg-->
      <?php print render($page['header_right']); ?>
      <!--header left region end-->
    </div>
   </header>
 <?php endif; ?>  
<!--header regions end-->
<!--main menu region beg-->
  <?php print render($page['menu_bar']); ?>
<!--header region beg-->

  <?php print $messages; ?>

  <div id="columns"><div class="columns-inner clearfix">
  	<!--content area beg-->
    <div id="content-column"><div class="content-inner">

      <?php $tag = $title ? 'section' : 'div'; ?>
      <<?php print $tag; ?> id="main-content" role="main">

        <?php print render($title_prefix); ?>
        <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
         <header>
            <?php if (!$is_front && $title): ?>
              <h1 id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>

            <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
              <div id="tasks">
                <?php if ($primary_local_tasks): ?>
                  <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($secondary_local_tasks): ?>
                  <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($action_links = render($action_links)): ?>
                  <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
         </header>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div id="content"><?php print render($page['content']); ?></div>

        <?php print $feed_icons; ?>

      </<?php print $tag; ?>>

  </div></div>
<!--content area end-->

<!--sidebar first region beg-->
    <?php print render($page['sidebar_first']); ?>
<!--sidebar first region end-->
<!--sidebar second region beg-->
    <?php print render($page['sidebar_second']); ?>
<!--sidebar second region end-->
  </div></div>

  <?php if ($page['footer']): ?>
    <footer role="contentinfo"><?php print render($page['footer']); ?></footer>
  <?php endif; ?>

</div><!--page region end-->
