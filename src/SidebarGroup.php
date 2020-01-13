<?php

namespace Giuga\LaravelNovaSidebar;

use Illuminate\Support\Collection;

class SidebarGroup
{
    public string $name;
    public Collection $links;

    public function __construct()
    {
        $this->links = collect([]);
    }

    /**
     * Set the name of the group to be rendered on the Nova sidebar.
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add a new link to the collection inside this group.
     * @param SidebarLink $link
     * @return $this
     */
    public function addLink(SidebarLink $link): self
    {
        $this->links->add($link);

        return $this;
    }
}
