<?php


namespace App\Core;


class Filter
{
    protected $records = [];
    protected $language = 'php';
    protected $since = 'weekly';

    public function __construct($records, $language, $since)
    {
        $this->records = $records;
        $this->language = $language;
        $this->since = $since;
    }


    if(isset($_GET['language'])) {
            $language = $_GET['language'];
            $since = $_GET['since'];
            $paginate = $_GET['paginate'];
        }



}