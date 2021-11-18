<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;

class ChargesSplitUpdate extends Request
{
    public function __construct($chargeId, $data)
    {
        parent::__construct(
            "POST",
            "/api-integration/charges/{chargeId}/split",
            $this->headers,
            [],
            [
                'json' => [
                    $data
                ]
            ]
        );
        $this->addHeader("Content-Type", "application/json");
        $this->path = str_replace("{chargeId}", urlencode($chargeId), $this->path);
    }
}
