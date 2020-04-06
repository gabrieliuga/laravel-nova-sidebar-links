<?php

namespace Giuga\LaravelNovaSidebar\Tests;

use Giuga\LaravelNovaSidebar\NovaSidebar;
use Giuga\LaravelNovaSidebar\SidebarGroup;
use Giuga\LaravelNovaSidebar\SidebarLink;
use Orchestra\Testbench\TestCase;

class MakeableTest extends TestCase
{
    /** @test */
    public function testNovaSidebarIsMakeable()
    {
        $novaSidebar = NovaSidebar::make();
        $this->assertTrue($novaSidebar instanceof NovaSidebar);
    }

    /** @test */
    public function testSidebarGroupIsMakeable()
    {
        $sidebarGroup = SidebarGroup::make();
        $this->assertTrue($sidebarGroup instanceof SidebarGroup);
    }

    /** @test */
    public function testSidebarLinkIsMakeable()
    {
        $sidebarLink = SidebarLink::make();
        $this->assertTrue($sidebarLink instanceof SidebarLink);
    }
}
