<html>
<head>
    <title>Tasks</title>
</head>
<body>
<a href="/">Home</a>
<a href="/about">About</a>
<a href="/profile">Profile</a>

<ul>
    <?php foreach($users as $user) { ?>
      <li><?php echo $user->name ?></li>
    <?php }?>

</ul>


<form method="POST" action="/names">
    <input type="text" name="name">
    <input type="submit" value="Enter">
</form>
    
</body>
</html>