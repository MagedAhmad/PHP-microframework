<?php


use App\Core\Trending;
use PHPUnit\Framework\TestCase;

class ReadRepositoriesTest extends TestCase
{


    public function test_trending_class_return_proper_repositories_url()
    {
        $url = "https://github-trending-api.now.sh/repositories?language=php&since=weekly";

        $this->assertEquals(
            $url,
            Trending::url('php', 'weekly')
        );

        $url = "https://github-trending-api.now.sh/repositories?language=java&since=monthly";
        $this->assertEquals(
            $url,
            Trending::url('java', 'monthly')
        );
    }


}




