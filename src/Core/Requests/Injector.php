<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Requests\Request;

interface Injector
{
    public function inject(Request $request);
}
