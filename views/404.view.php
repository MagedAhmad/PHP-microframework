<?php include('partials/header.view.php') ?>
    <p class="text-5xl text-center md:mt-32">
        <span class="text-blue-700 md:text-6xl font-bold">404</span> 
        <br> 
        <?php 
            if(!empty($data)) {
                foreach($data as $error) {
                    echo $error;
                }
            } 
        ?>
    </p>
<?php include('partials/footer.view.php') ?>
