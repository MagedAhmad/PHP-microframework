<?php


use TrendingRepos\Core\Paginator;
use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{

    protected $paginator;

    protected function setUp(): void
    {
        $this->paginator = new Paginator();
    }


    public function test_get_current_page() {
        $current_page = $_GET['page'] = 3;

        $this->assertEquals(
            $current_page,
            $this->paginator->getCurrentPage()
        );

        $_GET['page'] = null;
        $this->assertEquals(
            1,
            $this->paginator->getCurrentPage()
        );
    }
    public function test_get_next_page_if_current_page_is_not_set(){
        $this->paginator->setPages();
        $this->assertEquals(
            2,
            $this->paginator->pagination['next_page']
        );
    }

    public function test_get_next_page_if_current_page_is_set() {
        $current_page = $_GET['page'] = 4;
        $this->paginator->setPages();
        $this->assertEquals(
            $current_page + 1,
            $this->paginator->pagination['next_page']
        );
    }





//    public function testGet()
//    {
//
//
//    }

//    public function testNextUrl()
//    {
//
//    }

//    public function testLinks()
//    {
//
//    }
//
//    public function testPrev()
//    {
//
//    }


//    public function testBaseurl()
//    {
//
//    }
//
//    public function testPrevUrl()
//    {
//
//    }
}
