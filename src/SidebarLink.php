<?php

namespace Giuga\LaravelNovaSidebar;

use Giuga\LaravelNovaSidebar\Traits\Makeable;

class SidebarLink
{
    use Makeable;

    public string $url;
    public string $type = '_blank';
    public string $name;

    public function __construct()
    {
    }

    /**
     * Set the type of link _blank, _self.
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the external link you wish to the url to go to.
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the publicly visible name for the link.
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
