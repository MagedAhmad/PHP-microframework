<?php

for($counter = 1; $counter <= $paginator->pagination['total_pages']; $counter ++) {
    echo "<div class='pagination'>";
        if($paginator->pagination['current_page'] == $counter) {
             echo "<li><a class='active' href=" . $paginator->Baseurl().$counter . ">" . $counter . "</a></li>";
        }else {
             echo "<li><a href=" . $paginator->Baseurl().$counter . ">" . $counter . "</a></li>";
        }

    echo "</div>";
}
