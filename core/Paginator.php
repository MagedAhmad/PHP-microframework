<?php


namespace App\Core;


class Paginator
{
    public $pagination = [
        'total_pages' => '',
        'current_page' => '',
        'next_page' => '',
        'prev_page' => '',
    ];

    /**
     * @param $records
     * @param $limit
     * @return array
     */
    public function get($records, $limit) {

        $this->pagination['total_pages'] = $this->getPages(count($records), $limit);


        if (isset($_GET['page'])) {
            $this->pagination['current_page'] = $_GET['page'];
        } else {
            $this->pagination['current_page'] = 1;
        }

        $this->pagination['prev_page'] = $this->pagination['current_page'] - 1 ;
        $this->pagination['next_page'] = $this->pagination['current_page'] + 1 ;

        return array_slice($records, $this->pagination['prev_page']*$limit, $limit);

    }



    public function next() {
        return ($this->pagination['next_page'] != ($this->pagination['total_pages']+1));
    }



    public function prev() {
        return ($this->pagination['prev_page'] != 0);

    }

    private function getPages($records_number, $limit) {
        return ceil($records_number / $limit);
    }




}