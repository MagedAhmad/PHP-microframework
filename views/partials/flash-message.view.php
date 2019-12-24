<!-- Success Alert -->
<?php if($message = (new TrendingRepos\Core\Session)->get('success')) { ?>
<div id="flash" class="fixed bottom-0 mb-2 right-0 mr-2 bg-green-200 border-l-4 border-green-500 text-green-600 p-4 w-3/4 md:w-1/5 " role="alert">
    <p> <?= $message ?> </p>
</div>
<?php } ?>

<!-- Error Alert -->
<?php if($message = (new TrendingRepos\Core\Session)->get('danger')){ ?>
  <div id="flash" class="fixed bottom-0 mb-2 right-0 mr-2 bg-red-200 border-l-4 border-red-500 text-red-600 p-4 w-3/4 md:w-1/5 " role="alert">
    <p> <?= $message ?> </p>
  </div>
<?php } ?>

<!-- Info Alert -->
<?php if($message = (new TrendingRepos\Core\Session)->get('info')){ ?>
  <div id="flash" class="fixed bottom-0 mb-2 right-0 mr-2 bg-blue-200 border-l-4 border-blue-500 text-blue-600 p-4 w-3/4 md:w-1/5 " role="alert">
    <p> <?= $message ?></p>
  </div>
<?php } ?>
