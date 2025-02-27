<?php
/**
 * User: Damian Zamojski (br33f)
 * Date: 22.06.2021
 * Time: 11:10
 */

namespace Rich4rdMuvirimi\ForceReinstall\Vendor\Br33f\Ga4\MeasurementProtocol\Dto\Response;


use Rich4rdMuvirimi\ForceReinstall\Vendor\Br33f\Ga4\MeasurementProtocol\Dto\HydratableInterface;
use Rich4rdMuvirimi\ForceReinstall\Vendor\Br33f\Ga4\MeasurementProtocol\Exception\HydrationException;
use Rich4rdMuvirimi\ForceReinstall\Vendor\Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse implements HydratableInterface
{
    /**
     * AbstractResponse constructor.
     * @param ResponseInterface|null $blueprint
     * @throws HydrationException
     */
    public function __construct(ResponseInterface $blueprint = null)
    {
        if ($blueprint !== null) {
            $this->hydrate($blueprint);
        }
    }
}