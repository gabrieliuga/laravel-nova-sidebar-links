<?php

namespace Giuga\LaravelNovaSidebar;

use Illuminate\Support\Collection;
use Laravel\Nova\Tool;

class NovaSidebar extends Tool
{
    public Collection $linkGroups;
    public Collection $links;

    public function __construct($component = null)
    {
        parent::__construct($component);
        $this->links = collect([]);
        $this->linkGroups = collect([]);
    }

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-sidebar::navigation', ['groups' => $this->linkGroups, 'links' => $this->links]);
    }

    /**
     * Add a new sidebar group.
     * @param SidebarGroup $group
     * @return $this
     */
    public function addGroup(SidebarGroup $group): self
    {
        $this->linkGroups->add($group);

        return $this;
    }

    /**
     * Add a standalone link to the sidebar.
     * @param SidebarLink $link
     * @return $this
     */
    public function addLink(SidebarLink $link): self
    {
        $this->links->add($link);

        return $this;
    }

    /**
     * Hydrate the menu without creation of classes manually.
     * @param array $data
     * @return $this
     */
    public function hydrate(array $data): self
    {
        if (count($data)) {
            foreach ($data as $key => $links) {
                if (is_array($links)) {
                    $group = new SidebarGroup();
                    $group->setName($key);
                    foreach ($links as $link) {
                        $type = '_blank';
                        if (count($link) == 3) {
                            [$name, $url, $type] = $link;
                        } else {
                            [$name, $url] = $link;
                        }
                        $group->addLink((new SidebarLink())->setName($name)->setUrl($url)->setType($type));
                    }
                    $this->addGroup($group);
                } else {
                    $this->addLink((new SidebarLink())->setName($key)->setUrl($links));
                }
            }
        }

        return $this;
    }
}
