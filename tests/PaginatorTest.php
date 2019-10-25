<?php


use App\Core\Paginator;
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
//
//    public function testNext()
//    {
//
//    }
//
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
