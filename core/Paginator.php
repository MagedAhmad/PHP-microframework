<?php


namespace App\Core;


class Paginator
{
    /**
     * Keeps pagination numbers
     * @var array
     */
    public $pagination = [
        'total_pages' => '',
        'current_page' => '',
        'next_page' => '',
        'prev_page' => '',
        'last_page' => ''
    ];


    /**
     * @param $records
     * @param $limit
     * @return array of limited records
     */
    public function get($records, $limit) {

        $this->pagination['total_pages'] = $this->getPages(count($records), $limit);

        $this->pagination['current_page'] = $this->getCurrentPage();
        $this->pagination['prev_page'] = $this->pagination['current_page'] - 1 ;
        $this->pagination['next_page'] = $this->pagination['current_page'] + 1 ;
        $this->pagination['last_page'] = $this->pagination['total_pages'] - 1 ;

        return array_slice($records, $this->pagination['prev_page']*$limit, $limit);

    }


    /**
     *  get the current page number
     * @return int|mixed
     */
    protected function getCurrentPage() {
        if (isset($_GET['page']) && $_GET['page'] != "") {
             return $_GET['page'];
        } else {
            return 1;
        }
    }

    /**
     * Get array of <li> pagination links
     */
    public function links() {
        for($counter = 1; $counter <= $this->pagination['total_pages']; $counter ++) {
            echo "<div class='pagination'>";
                if($this->pagination['current_page'] == $counter) {
                     echo "<li><a class='active' href=" . $this->Baseurl().$counter . ">" . $counter . "</a></li>";
                }else {
                     echo "<li><a href=" . $this->Baseurl().$counter . ">" . $counter . "</a></li>";
                }
            echo "</div>";
        }
    }


    /**
     * Check if there is a next page
     * @return bool
     */
    public function next() {
        return ($this->pagination['next_page'] != ($this->pagination['total_pages']+1));
    }


    /**
     * Check if there is a previous page
     * @return bool
     */
    public function prev() {
        return ($this->pagination['prev_page'] != 0);

    }


    /**
     * Get previous page url
     * @return string
     */
    public function prevUrl() {

         return $this->Baseurl() . $this->pagination['prev_page'];
    }

    /**
     * Get next page url
     * @return string
     */
    public function nextUrl() {
        return $this->Baseurl() . $this->pagination['next_page'];
    }

    /**
     * get the number of pages to paginate
     * @param $records_number
     * @param $limit
     * @return float
     */
    private function getPages($records_number, $limit) {
        return ceil($records_number / $limit);
    }

    

    /**
     * @return string
     */
    public function Baseurl() {
        if($_SERVER['QUERY_STRING'] != null && $_SERVER['QUERY_STRING'] != "page=".$this->pagination['current_page']) {

            if(strpos($_SERVER['QUERY_STRING'], '&page=' . $this->pagination['current_page'])) {
                $url = trim($_SERVER['QUERY_STRING'], '&page='. $this->pagination['current_page']);
                return '?' . $url . '&page=';
            }
            $url = $_SERVER['QUERY_STRING'];
            return '?' . $url . '&page=' ;
        }else {
            $url = trim($_SERVER['QUERY_STRING'], 'page='. $this->pagination['current_page']);
            return $url . "?page=";
        }
    }




}