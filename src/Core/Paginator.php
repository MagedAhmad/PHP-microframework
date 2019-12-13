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

    public function next(): bool
    {
        return ($this->pagination['next_page'] != ($this->pagination['total_pages']+1));
    }

    public function prev(): bool
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
        if(!empty($_SERVER['QUERY_STRING']) && isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "page=".$this->pagination['current_page']) {

            if(strpos($_SERVER['QUERY_STRING'], '&page=' . $this->pagination['current_page'])) {
                $url = trim($_SERVER['QUERY_STRING'], '&page='. $this->pagination['current_page']);
                return '?' . $url . '&page=';
            }
            $url = $_SERVER['QUERY_STRING'];
            return '?' . $url . '&page=' ;
        }else {
            if(isset($_SERVER['QUERY_STRING'])) {
                $url = trim($_SERVER['QUERY_STRING'], '?page='. $this->pagination['current_page']);
            }else {
                $url = $_SERVER['REQUEST_URI'];
            }
            return $url . "?page=";
        }
    }
}
