<?php


use TrendingRepos\Core\Trending;
use PHPUnit\Framework\TestCase;

class TrendingTest extends TestCase
{
    public function test_fetch_providers()
    {
        $providers = Trending::FetchProviders();
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
            Trending::url($args)
        );
        $url = "https://github-trending-api.now.sh/repositories?language=java&since=monthly";
        $args = [
            'provider' => 'github',
            'language' => 'java',
            'since' => 'monthly'
        ];
        $this->assertEquals(
            $url,
            Trending::url($args)
        );
    }
}
