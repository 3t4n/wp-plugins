<?php


namespace Attrace\Connector\API\Model;


class ConfigModel implements ModelInterface
{
    //some standard keys
    const ACCOUNT = 'Account';                  //Admin account configured


    const NETWORK_BROADCAST_STRATEGY          = 'NetworkBroadcastStrategy'; //How the connector is broadcasting transactions to the network
    const NETWORK_BROADCAST_STRATEGY_CRON     = 'cron';                     //slower background processing than queue: some periodic job processes pending transactions, not realtime.
    const NETWORK_BROADCAST_STRATEGY_QUEUE    = 'queue';                    //fast background processing, where a background thread or queue is broadcasting to the network near-realtime.
    const NETWORK_BROADCAST_STRATEGY_BLOCKING = 'blocking';                 //broadcast to the network before the user is redirected (and blocks the user).

    const TRACKING_STRATEGY         = 'TrackingStrategy';  //How the connector is setting cookies
    const TRACKING_STRATEGY_BACKEND = 'backend';           //server module adds the necessary Set-Cookie headers.
    const TRACKING_STRATEGY_JS      = 'js';                //javascript master tag sets the cookies.

    const CONVERSION_STRATEGY         = 'ConversionStrategy';         // How the integration tracks conversions
    const CONVERSION_STRATEGY_BACKEND = 'backend';                    //backend module has configuration
    const CONVERSION_STRATEGY_JS      = 'js';                         //javascript tag handles conversions

    const PROFILING_LEVEL      = 'ProfilingLevel';             //Additional tracing level for performance
    const PROFILING_LEVEL_NONE = 'none';                       //no profiling enabled (good)
    const PROFILING_LEVEL_ALL  = 'all';                        //all requests are doing profiling  (degraded performance)

    const NETWORK         = 'Network';                    //The network this connector is talking to eg: betanet or testnet
    const NETWORK_BETANET = 'betanet';
    const NETWORK_TESTNET = 'testnet';

    const MONITORS = 'Monitors';

    const CLICKOUT_PATH         = 'ClickoutPath';             //The url part which handles clickouts eg: /clickout
    const DEFAULT_CLICKOUT_PATH = 'click_out';

    const MASTERTAG_URL         = 'MasterTagUrl';             //The URL where the master tag is available
    const DEFAULT_MASTERTAG_URL = 'attrace/libs/mtag_js';

    const MODE             = 'Mode';
    const MODE_PRODUCTION  = 'production';
    const MODE_DEVELOPMENT = 'development';

    const PROTOCOLMODE          = 'ProtocolMode';
    const PROTOCOLMODE_RESTFUL  = 'restful';
    const PROTOCOLMODE_FALLBACK = 'fallback';

    const API_BASE_PATH = "ApiBasePath";
    const API_BASE_PATH_DEFAULT = '/attrace/v1';


    public static $DEFAULT_SETTINGS =
        [
            self::CLICKOUT_PATH              => self::DEFAULT_CLICKOUT_PATH,
            self::MASTERTAG_URL              => self::DEFAULT_MASTERTAG_URL,
            self::NETWORK                    => self::NETWORK_BETANET,
            self::PROFILING_LEVEL            => self::PROFILING_LEVEL_NONE,
            self::NETWORK_BROADCAST_STRATEGY => self::NETWORK_BROADCAST_STRATEGY_BLOCKING,
            self::TRACKING_STRATEGY          => self::TRACKING_STRATEGY_BACKEND,
            self::CONVERSION_STRATEGY        => self::CONVERSION_STRATEGY_BACKEND,
            self::ACCOUNT                    => "", // so it shows in the config
            self::MONITORS                   => "",
            self::MODE                       => self::MODE_PRODUCTION,
            self::PROTOCOLMODE               => self::PROTOCOLMODE_RESTFUL,
            self::API_BASE_PATH              => self::API_BASE_PATH_DEFAULT,
        ];

    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}