<?php include('partials/header.view.php') ?>
    <p class="text-5xl text-center md:mt-32">
        <span class="text-blue-700 md:text-6xl font-bold">404</span> 
        <br> 
        
        <?php 
            if(!empty($errors)) {

                foreach($errors as $error) {
                    echo '<div class="inline-flex items-center bg-white leading-none text-blue-600 rounded-full p-2 shadow text-teal text-sm">';                
                        echo '<span class="inline-flex bg-blue-600 text-white rounded-full h-6 px-3 justify-center items-center">Error</span>';
                        echo '<span class="inline-flex px-2">'. $error .'</span>';
                    echo '</div>';
                }
                echo '<div class="text-center">';
                    echo '<br>';
                    echo '<span class="text-center text-sm"><a href="/">Back to Home page?</a></span>';
                echo '</div>';
            } 
        ?>
    </p>
<?php include('partials/footer.view.php') ?>
