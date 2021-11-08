<?php

namespace Webgopher\Juno\Core\Http;

use Webgopher\Juno\Core\Http\Request;

interface Injector
{
    public function inject($request);
}
