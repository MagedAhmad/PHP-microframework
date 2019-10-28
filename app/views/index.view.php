<?php include('app/views/partials/header.view.php') ?>


          <div class="border flex justify-center ">
              <form action="/" method="GET">
                <div class="flex flex-col md:flex-row my-4 mx-2">
                  <div class="relative mx-2">

                    <select name="provider" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">

                        <?php foreach(App\Core\Trending::FetchProviders() as $prov) { ?>

                            <option <?php if ($args['provider'] == $prov) echo 'selected'; ?>
                                    value="<?php echo $prov ?>"><?php echo $prov ?></option>
                        <?php }?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

                  <div class="relative mx-2">
                      <?php
                        (isset($_GET["offset"])) ? $offset = $_GET["offset"] : $offset='10';
                      ?>
                    <select name="offset" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                      <option <?php if ($offset == 5 ) echo 'selected' ; ?> value="5">5</option>
                      <option <?php if ($offset == 10 ) echo 'selected' ; ?> value="10">10</option>
                      <option <?php if ($offset == 15 ) echo 'selected' ; ?> value="15">15</option>
                      <option <?php if ($offset == 20 ) echo 'selected' ; ?> value="20">20</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

                  <div class="relative mx-2">


                    <select name="language" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">


                        <?php foreach(App\Core\Trending::FetchLanguages() as $lang) { ?>

                            <option <?php if ($args['language'] == $lang->name) echo 'selected'; ?>
                                    value="<?php echo $lang->name ?>"><?php echo $lang->name ?></option>
                        <?php }?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                  <div class="relative mx-2">

                    <select name="since" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option <?php if ($args['since'] == 'daily' ) echo 'selected' ; ?> value="daily" >Daily</option>
                        <option <?php if ($args['since'] == 'weekly' ) echo 'selected' ; ?> value="weekly">Weekly</option>
                        <option <?php if ($args['since'] == 'monthly' ) echo 'selected' ; ?> value="monthly">Monthly</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

                <input type="submit" class="bg-blue-500 rounded text-white px-4 py-2 hover:bg-blue-800" value="Filter">

                </div>
              </form>
          </div>


          <?php if(empty($repos)) {
                  echo "Couldn't find any repositories, Try different Language";
              }else {
          ?>
          <table class="myTable w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5" id="myTable">
              <thead class="text-white">
                <tr class="bg-blue-500 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                  <th class="px-4 py-2">Name</th>
                  <th class="px-4 py-2">Url</th>
                  <th class="px-4 py-2">Author</th>
                  <th class="px-4 py-2">Avatar</th>
                  <th class="px-4 py-2">Stars<br>
                      <i class="arrow up mr-4 sort" onclick="sortStarsUp()"></i>
                      <i class="arrow down sort" onclick="sortStarsDown()"></i>
                  </th>
                  <th class="px-4 py-2" title="current period stars">C.P.S<br>
                      <i class="arrow up mr-4" onclick="sortCurrentStarsUp()"></i>
                      <i class="arrow down" onclick="sortCurrentStarsDown()"></i>
                  </th>
<!--                      <th class="px-4 py-2">Description</th>-->
                </tr>
              </thead>
              <tbody class="flex-1 sm:flex-none">
              <?php foreach($repos as $repo) {
                echo "<tr class='flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0'>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3'>" . $repo->name ."</td>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3'><a target='_blank' href='".$repo->url."'>" . $repo->url. "</a></td>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3'>". $repo->author ."</td>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3'>". $repo->avatar ."</td>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3 sort_stars'>". $repo->stars ."</td>";
                  echo "<td class='border-grey-light border hover:bg-gray-100 p-3 sort_current'>". $repo->currentPeriodStars ."</td>";
//                      echo "<td class='border px-4 py-2'>". $repo->description ."</td>";
                echo "</tr>";
              }
              ?>

              </tbody>
              <tfoot class="my-4">

              </tfoot>
          </table>
                  <!--     Start Pagination         -->
                <ul class="flex justify-center font-sans">
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

          <?php } ?>



      <script src="/public/js/main.js"></script>


<?php include('app/views/partials/footer.view.php') ?>

