<?php


use TrendingRepos\Core\Trending;
use PHPUnit\Framework\TestCase;
use TrendingRepos\App;

class TrendingTest extends TestCase
{
    protected $trending;

    public function setUp(): void
    {
        $this->trending = new Trending();    
    }

    public function test_fetch_supported_providers()
    {
        $providers = (new App())->registry['config']['providers'];

        $this->assertEquals($providers, ['github', 'gitlab', 'bitbucket']);
    }

    public function test_api_url()
    {
        $url = "https://github-trending-api.now.sh/repositories?language=PHP&since=weekly";
        $args = [
            'provider' => 'github',
            'language' => 'PHP',
            'since' => 'weekly'
        ];

        $this->assertEquals(
            $url,
            $this->trending->url($args)
        );
        $url = "https://github-trending-api.now.sh/repositories?language=java&since=monthly";
        $args = [
            'provider' => 'github',
            'language' => 'java',
            'since' => 'monthly'
        ];

        $this->assertEquals(
            $url,
            $this->trending->url($args)
        );
    }
}
