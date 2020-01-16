<?php

namespace Giuga\LaravelNovaSidebar\Tests;

use Giuga\LaravelNovaSidebar\NovaSidebar;
use Giuga\LaravelNovaSidebar\SidebarGroup;
use Giuga\LaravelNovaSidebar\SidebarLink;
use Illuminate\Support\Collection;
use Laravel\Nova\Tool;
use Orchestra\Testbench\TestCase;

class HydrateWithObjectsTest extends TestCase
{
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
        $novaSidebar->addGroup((new SidebarGroup())
            ->setName('Utilities')
            ->addLink((new SidebarLink())
                ->setName('Telescope')
                ->setType('_blank')
                ->setUrl('/telescope')
            )
            ->addLink((new SidebarLink())
                ->setName('Horizon')
                ->setType('_blank')
                ->setUrl('/horizon')
            )
        );

        $this->assertEquals('Utilities', $novaSidebar->linkGroups->first()->name);
        $this->assertTrue($novaSidebar->links instanceof Collection);
        $this->assertTrue($novaSidebar->links->count() == 0);
        $this->assertEquals('_blank', $novaSidebar->linkGroups->first()->links->first()->type);
        $this->assertEquals('Telescope', $novaSidebar->linkGroups->first()->links->first()->name);
        $this->assertEquals('/telescope', $novaSidebar->linkGroups->first()->links->first()->url);
    }

    /** @test */
    public function testAddingLinkResultsInLinks()
    {
        $novaSidebar = new NovaSidebar();
        $novaSidebar->addGroup((new SidebarGroup())
            ->setName('Utilities')
            ->addLink((new SidebarLink())
                ->setName('Telescope')
                ->setType('_blank')
                ->setUrl('/telescope')
            )
        );
        $novaSidebar->addLink((new SidebarLink())
            ->setName('Horizon')
            ->setType('_blank')
            ->setUrl('/horizon')
        );

        $this->assertEquals('Utilities', $novaSidebar->linkGroups->first()->name);
        $this->assertTrue($novaSidebar->links instanceof Collection);
        $this->assertEquals('Horizon', $novaSidebar->links->first()->name);
    }

    /** @test */
    public function testDefaultLinkType()
    {
        $novaSidebar = new NovaSidebar();
        $novaSidebar->addLink((new SidebarLink())
            ->setName('Horizon')
            ->setUrl('/horizon')
        );
        $this->assertEquals('_blank', $novaSidebar->links->first()->type);
    }
}
