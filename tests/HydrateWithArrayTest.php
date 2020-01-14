<?php

namespace Giuga\LaravelNovaSidebar\Tests;

use Giuga\LaravelNovaSidebar\NovaSidebar;
use Illuminate\Support\Collection;
use Laravel\Nova\Tool;
use Orchestra\Testbench\TestCase;

class HydrateWithArrayTest extends TestCase
{
    private array $hydrateData = [
        'Utilities' => [
            ['Telescope', '/telescope'],
            ['Horizon', '/horizon'],
            ['Google', 'https://google.com', '_self'],
        ],
        'Google 2' => 'https://google.com',
    ];

    /** @test */
    public function testCanInitNovaSidebarAsNovaTool()
    {
        $novaSidebar = new NovaSidebar();
        $this->assertTrue($novaSidebar instanceof Tool);
    }

    /** @test */
    public function testAddingGroupResultsInGroupLink()
    {
        $novaSidebar = new NovaSidebar();
        $novaSidebar->hydrate($this->hydrateData);

        $this->assertEquals('Utilities', $novaSidebar->linkGroups->first()->name);
        $this->assertTrue($novaSidebar->links instanceof Collection);
        $this->assertTrue($novaSidebar->links->count() == 1);
    }

    /** @test */
    public function testAddingLinkResultsInLinks()
    {
        $novaSidebar = new NovaSidebar();
        $novaSidebar->hydrate($this->hydrateData);
        $this->assertEquals('Utilities', $novaSidebar->linkGroups->first()->name);
        $this->assertTrue($novaSidebar->links instanceof Collection);
        $this->assertEquals('Google 2', $novaSidebar->links->first()->name);
    }

    /** @test */
    public function testDefaultLinkType()
    {
        $novaSidebar = new NovaSidebar();
        $novaSidebar->hydrate($this->hydrateData);
        $this->assertEquals('_blank', $novaSidebar->links->first()->type);
    }
}
