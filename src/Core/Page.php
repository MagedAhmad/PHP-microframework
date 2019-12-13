<?php

namespace TrendingRepos\Core;

class Page 
{
    public function view(string $page, array $templateVars = []) {
        extract($templateVars);
        $file =  dirname(__DIR__) . "/../views/$page.view.php";

        if(!file_exists($file)){
            throw new \Exception("Couldnot find this view page");
        }

        return include($file);
    }
}
