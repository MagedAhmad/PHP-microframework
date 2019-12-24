<?php


namespace TrendingRepos\Core;


class Paginator
{
    public $pagination = [
        'total_pages' => '',
        'current_page' => '',
        'next_page' => '',
        'prev_page' => '',
    ];

    public function get(array $records, int $limit) 
    {
        $this->pagination['total_pages'] = $this->getPages(count($records), $limit);
        $this->setPages();

        return array_slice($records, $this->pagination['prev_page']*$limit, $limit);
    }

    public function setPages() {
        $this->pagination['current_page'] = $this->getCurrentPage();
        $this->pagination['prev_page'] = $this->pagination['current_page'] - 1 ;

        $this->pagination['next_page'] = $this->pagination['current_page'] + 1 ;
    }

    public function getCurrentPage() {
        if (isset($_GET['page']) && $_GET['page'] != "") {
             return $_GET['page'];
        } else {
            return 1;
        }
    }

    public function hasNext(): bool
    {
        return ($this->pagination['next_page'] != ($this->pagination['total_pages']+1));
    }

    public function hasPrev(): bool
    {
        return ($this->pagination['prev_page'] != 0);
    }

    public function prevUrl(): string
    {
         return $this->Baseurl() . $this->pagination['prev_page'];
    }

    public function nextUrl(): string
    {
        return $this->Baseurl() . $this->pagination['next_page'];
    }

    private function getPages(int $records_number, int $limit): int 
    {
        return ceil($records_number / $limit);
    }

    public function Baseurl(): string
    {
        if(preg_match('(.\?page=)', $_SERVER['REQUEST_URI'])) {
            $url =  trim($_SERVER['REQUEST_URI'], '?page='. $this->pagination['current_page']);

            return $url . "?page=";
        }
        
        if(preg_match('(.\&page=)', $_SERVER['REQUEST_URI']) OR preg_match('(.\&offset=)', $_SERVER['REQUEST_URI'])) {
            $url = trim($_SERVER['REQUEST_URI'], '&page='. $this->pagination['current_page']);
        
            return $url . '&page=';
        }

        return '?page=' ;
    }
}
