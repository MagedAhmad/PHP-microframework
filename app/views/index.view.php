<html>
<head>
    <title>Trending Repos</title>
</head>
<body>
<a href="/">Home</a>


<table>
   <th>
       <td>Name</td>
       <td>author</td>
       <td>avatar</td>
       <td>url</td>
       <td>stars</td>
       <td>current Period Stars</td>
       <td>Description</td>
   </th>
    <?php
        foreach($repos as $repo) {
            echo "<tr>";
                echo "<td></td>";
                echo "<td>". $repo->name ."</td>";
                echo "<td>".$repo->author."</td>";
                echo "<td>".$repo->avatar."</td>";
                echo "<td>".$repo->url."</td>";
                echo "<td>".$repo->stars."</td>";
                echo "<td>".$repo->currentPeriodStars ."</td>";
                echo "<td>".$repo->description ."</td>";
            echo "</tr>";
        }
    ?>
</table>



    
</body>
</html>