<?php 

if(TrendingRepos\Core\Flash::has('success')) {?>

<div id="flash" class="fixed bottom-0 mb-2 right-0 mr-2 bg-green-200 border-l-4 border-green-500 text-green-600 p-4 w-3/4 md:w-1/5 " role="alert">
  <p class="font-bold">Flash Message</p>
  <p><?php TrendingRepos\Core\Flash::get('success'); ?></p>
</div>

<?php
}

if(TrendingRepos\Core\Flash::has('danger')) {?>

  <div id="flash" class="fixed bottom-0 mb-2 right-0 mr-2 bg-red-200 border-l-4 border-red-500 text-red-600 p-4 w-3/4 md:w-1/5 " role="alert">
    <p class="font-bold">Flash Message</p>
    <p><?php TrendingRepos\Core\Flash::get('danger'); ?></p>
  </div>
  
  <?php
  }

?>
  
  </div>
</body>
</html>