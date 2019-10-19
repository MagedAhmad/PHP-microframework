<!DOCTYPE html>
<html lang="en" class="antialiased">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Trending Repos</title>
      <meta name="description" content="">
      <meta name="keywords" content="">
       <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
       <link rel="stylesheet" href="/public/css/main.css">
   </head>
   <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">


      <!--Container-->
      <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

			<!--Title-->
			<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
				Trending Repositories
			</h1>
          <div class="border">
              <form action="/" method="GET">
                <div class="flex my-4 mx-2">
                  <div class="relative mx-2">
                      <?php
                        (isset($_GET["paginate"])) ? $paginate = $_GET["paginate"] : $paginate='10';
                    ?>
                    <select name="paginate" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                      <option <?php if ($paginate == 5 ) echo 'selected' ; ?> value="5">5</option>
                      <option <?php if ($paginate == 10 ) echo 'selected' ; ?> value="10">10</option>
                      <option <?php if ($paginate == 15 ) echo 'selected' ; ?> value="15">15</option>
                      <option <?php if ($paginate == 20 ) echo 'selected' ; ?> value="20">20</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

                  <div class="relative mx-2">
                   <?php
                   (isset($_GET["language"])) ? $language = $_GET["language"] : $language='php';
                    ?>

                    <select name="language" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="">
                                Choose Language
                            </option>
                        <?php foreach(App\Core\Trending::FetchLanguages() as $lang) { ?>

                            <option <?php if ($language == $lang->name) echo 'selected'; ?>
                                    value="<?php echo $lang->name ?>"><?php echo $lang->name?></option>
                        <?php }?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                  <div class="relative mx-2">
                      <?php

                        (isset($_GET["since"])) ? $since = $_GET["since"] : $since='weekly';

                        ?>
                    <select name="since" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option <?php if ($since == 'daily' ) echo 'selected' ; ?> value="daily" >Daily</option>
                        <option <?php if ($since == 'weekly' ) echo 'selected' ; ?> value="weekly">Weekly</option>
                        <option <?php if ($since == 'monthly' ) echo 'selected' ; ?> value="monthly">Monthly</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

                <input type="submit" class="bg-blue-500 rounded text-white px-4 py-2 hover:bg-blue-800" value="Filter">

                </div>
              </form>
          </div>
          <div class="border px-4 py-2 rounded-l">
              <?php if(empty($repos)) {
                      echo "Couldn't find any repositories, Try different Language";
                  }else {
              ?>
              <table class="table-auto" id="myTable">
                  <thead>
                    <tr>
                      <th class="px-4 py-2">Name</th>
                      <th class="px-4 py-2">Url</th>
                      <th class="px-4 py-2">Author</th>
                      <th class="px-4 py-2">Avatar</th>
                      <th class="px-4 py-2">Stars<br>
                          <i class="arrow up mr-4 sort" onclick="sortStarsUp()"></i>
                          <i class="arrow down sort" onclick="sortStarsDown()"></i>
                      </th>
                      <th class="px-4 py-2">Current Period Stars<br>
                          <i class="arrow up mr-4" onclick="sortCurrentStarsUp()"></i>
                          <i class="arrow down" onclick="sortCurrentStarsDown()"></i>
                      </th>
<!--                      <th class="px-4 py-2">Description</th>-->
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($repos as $repo) {
                    echo "<tr>";
                      echo "<td class='border md:px-4 md:py-2'>" . $repo->name ."</td>";
                      echo "<td class='border px-4 py-2'><a target='_blank' href='".$repo->url."'>" . $repo->url. "</a></td>";
                      echo "<td class='border px-4 py-2'>". $repo->author ."</td>";
                      echo "<td class='border px-4 py-2'>". $repo->avatar ."</td>";
                      echo "<td class='border px-4 py-2 sort_stars'>". $repo->stars ."</td>";
                      echo "<td class='border px-4 py-2 sort_current'>". $repo->currentPeriodStars ."</td>";
//                      echo "<td class='border px-4 py-2'>". $repo->description ."</td>";
                    echo "</tr>";


                  }
                  ?>


                  </tbody>
                  <tfoot class="my-4">
                      <!--     Start Pagination         -->
                    <ul class="flex list-reset border border-grey-light rounded font-sans">
                         <?php if($paginator->prev()) { ?>
                             <li><a class="block hover:text-white hover:bg-blue-500 text-blue border-r border-grey-light px-3 py-2" href="<?php echo $paginator->prevUrl() ?>">Prev</a></li>
                         <?php }else { ?>
                             <li><a class="block hover:text-black hover:bg-gray-500 text-black border-r border-grey-light px-3 py-2" href="#" aria-disabled="true">Previous</a></li>
                         <?php } ?>
                         <?php $paginator->links(); ?>

                          <?php if($paginator->next()) { ?>
                             <li><a class="block hover:text-white hover:bg-blue-500 text-blue border-r border-grey-light px-3 py-2" href="<?php echo $paginator->nextUrl() ?>">Next</a></li>
                         <?php }else { ?>
                             <li><a class="block hover:text-black hover:bg-gray-500 text-black border-r border-grey-light px-3 py-2" href="#" aria-disabled="true">Next</a></li>

                         <?php } ?>
                     </ul>
                    <!--     End Navigation         -->
                  </tfoot>
              </table>
              <?php } ?>


          </div>



      </div>
      <!--/container-->

      <script src="/public/js/main.js"></script>
   </body>
</html>

