<?php


namespace Attrace\Connector\Constants;


class Constants
{
    const VERSION                           = "1.5.3";
    const CONFIG_ATTRACE_KEY                = 'attrace_key';
    const CONFIG_ATTRACE_NETWORK            = 'attrace_network';
    const CONFIG_ATTRACE_DISCOVERY_MANIFEST = 'attrace_discovery_manifest';

    //default manifest
    const DISCOVERY_MANIFEST                = "https://discovery.attrace.network/{{network}}/manifest.json";
    const CONTRACT_ID_ATTRACE_AFFILIATE_USD = "gitlab.com/attrace/core/contracts/affiliate/v1::ContractAttraceAffiliateV1";

    const INDEX_BASE_PATH = "https://rollingidx.betanet.attrace.com";
    const INDEX_ROOTS     = "/api/v1/roots";
    const INDEX_HISTORY   = "/api/v1/root/history";

    const HTTP_TIMEOUT = 5.0;

    const RETRIES = 5;
    //for json transactions
    const NETWORK_API_TRANSACTIONS = '/api/v1/transactions';

    //for binary protobuf transaction
    const NETWORK_BIN_TRANSACTION = '/transaction';

    const NETWORK_API_BLOCKCHAIN_ADDRESS    = '/api/v1/blockchain/address';
    const NETWORK_API_BLOCKCHAIN_AGREEMENTS = '/api/v1/blockchain/agreements';

    const FIVE_MIN_IN_MLS = 5 * 60 * 1000;
    const HOUR_IN_MLS     = 60 * 60 * 1000;

    const DEFAULT_EXPIRE_DAYS = 30;
    const COOKIE_AKEY         = "A_AG";
    const COOKIE_RKEY         = "A_RT";
    const COOKIE_ACPKEY       = "A_PAG";
    const COOKIE_ATX          = "atx";
    const HEADER_SIGNATURE    = 'x-attr-signature';
    const HEADER_TIMESTAMP    = 'x-attr-timestamp';
    const HEADER_ACCOUNT      = 'x-attr-account';

    const TABLE_TX                 = 'attr_transaction';
    const TABLE_CONFIG             = 'attr_config';
    const TABLE_INTEGRATION_CONFIG = 'attr_integration_config';

    const TX_RETRIES = 5;
    const TX_BATCH   = 20;
    const TX_LIMIT   = 100;


    const API_PATH_DEBUG              = 'debug';
    const API_PATH_TRANSACTIONS       = 'transactions';
    const API_PATH_STATUS             = 'status';
    const API_PATH_ACCOUNT            = 'account';
    const API_PATH_CONFIG             = 'config';
    const API_PATH_INTEGRATIONCONFIGS = 'integrationconfigs';
    const API_PATH_ACTION             = 'action';
    const API_PATH_MONITORS           = 'monitors';
    const API_PATH_POST_REQUEST       = 'req';
    const API_PATH_RESET              = 'reset';

    const ROLE_PUBLISHER  = 'publisher';
    const ROLE_ADVERTISER = 'advertiser';

    const AUTH_ADMIN   = 'admin';
    const AUTH_MONITOR = 'monitor';
    const AUTH_NONE    = 'none';
    const AUTH_BLOCKED = 'blocked';

    const HTTP_GET    = 'GET';
    const HTTP_DELETE = 'DELETE';
    const HTTP_PUT    = 'PUT';
    const HTTP_POST   = 'POST';
    const HTTP_PATCH  = 'PATCH';

    //https://gitlab.com/attrace/core/-/blob/develop/currency.go#L27
    const CURRENCY = [1 => 'USD', 2 => 'EUR'];

}