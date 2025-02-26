<?php

namespace Foxlis\Geo\Services\Redirect;

use Foxlis\Geo\Helpers\RedirectHelper;

class FoxlisGeoRedirectOptionHandler
{
    private $redirectOption;
    private $currentUri;

    public function __construct(
        $redirectOption,
        $currentUri
    ) {
        $this->redirectOption = $redirectOption;
        $this->currentUri = $currentUri;
    }

    /**
     * @return array
     */
    public function getRedirectOption()
    {
        return $this->redirectOption;
    }

    public function getUri()
    {
        if ($this->isOptionRedirectImpossible()) {
            return strval(false);
        }

        // get prepared redirect uri
        $preparedRedirectUriArray = $this->getPreparedRedirectUri();

        // don't redirect if link is same as current uri
        if ($this->isRedirectLinkSameAsCurrentUri($preparedRedirectUriArray)) {
            return strval(false);
        }

        // check from condition
        if ($this->isFromConditionViolate()) {
            return strval(false);
        }

        // return redirect uri
        return $this->getLinkForRedirect($preparedRedirectUriArray);
    }

    private function isOptionRedirectImpossible()
    {
        if (
            $this->redirectOption['status'] === 'disable'
            || (empty($this->redirectOption['redirect']) && empty($this->redirectOption['from']))
        ) {
            return true;
        }

        // for once redirect
        if ($this->redirectOption['status'] === 'once') {
            $redirectOptionHash = sha1(serialize($this->redirectOption));
            if (isset($_SESSION['foxlis_geo_redirect_once'][$redirectOptionHash])) {
                return true;
            }
        }

        return false;
    }

    private function getPreparedRedirectUri()
    {
        $redirectUriPreparedArray = explode('?', $this->redirectOption['redirect'], 2);
        $redirectUriPreparedArrayUrn = isset($redirectUriPreparedArray[0]) ? $redirectUriPreparedArray[0] : '';

        $redirectUriPreparedArray['urn'] = strpos($redirectUriPreparedArrayUrn, 'http') !== 0
            // surround slashes and remove double slashes
            ? RedirectHelper::getUrnSurroundedBySashes($redirectUriPreparedArrayUrn)
            // redirect url is new host
            : trim($redirectUriPreparedArrayUrn);

        $redirectUriPreparedArray['query'] =
            isset($redirectUriPreparedArray[1]) ? trim($redirectUriPreparedArray[1]) : '';

        return $redirectUriPreparedArray;
    }

    private function getLinkForRedirect($preparedRedirectUriArray)
    {
        $redirectUriPreparedString = $preparedRedirectUriArray['urn'];
        $redirectUriPreparedString .= $preparedRedirectUriArray['query'] ? "?{$preparedRedirectUriArray['query']}" : '';

        $redirectUriParsed = parse_url($redirectUriPreparedString);
        $redirectUriParsed['scheme'] = isset($redirectUriParsed['scheme']) ? $redirectUriParsed['scheme'] : '';
        $redirectUriParsed['host'] = isset($redirectUriParsed['host']) ? $redirectUriParsed['host'] : '';
        $redirectUriParsed['path'] = isset($redirectUriParsed['path']) ? $redirectUriParsed['path'] : '';
        $redirectUriParsed['query'] = isset($redirectUriParsed['query']) ? $redirectUriParsed['query'] : '';
        $redirectUriParsed['fragment'] = isset($redirectUriParsed['fragment']) ? $redirectUriParsed['fragment'] : '';

        // redirect urn
        if (isset($this->redirectOption['urn'])) {
            $redirectUriParsed['path'] = RedirectHelper::getUrnWithRemovedDoubleSlashes(
                $redirectUriParsed['path'] . $this->currentUri['urn']
            );
        }

        // redirect query
        if (isset($this->redirectOption['query'])) {
            // if current uri already have redirect param
            if ($redirectUriParsed['query'] && false !== strpos($this->currentUri['query'], $redirectUriParsed['query'])) {
                $redirectUriParsed['query'] = '';
            }

            if ($redirectUriParsed['query']) {
                $redirectUriParsed['query'] .= $this->currentUri['query'] ? "&{$this->currentUri['query']}" : '';
            } else {
                $redirectUriParsed['query'] .= $this->currentUri['query'];
            }
        }

        // link for redirect
        return implode(
            [
                $redirectUriParsed['host'] ? "{$redirectUriParsed['scheme']}://" : '',
                $redirectUriParsed['host'],
                $redirectUriParsed['path'] ? $redirectUriParsed['path'] : '/',
                $redirectUriParsed['query'] ? "?{$redirectUriParsed['query']}" : '',
                $redirectUriParsed['fragment'] ? "#{$redirectUriParsed['fragment']}" : '',
            ]
        );
    }

    private function isRedirectLinkSameAsCurrentUri($preparedRedirectUriArray)
    {
        $redirectOptionUriArray = [
            'urn' => isset($preparedRedirectUriArray['urn'])
                ? RedirectHelper::getUrnWithoutSlashes($preparedRedirectUriArray['urn'])
                : '',
            'query' => $preparedRedirectUriArray['query'],
        ];

        $currentUri = [
            'urn' => RedirectHelper::getUrnWithoutSlashes($this->currentUri['urn']),
            'query' => $this->currentUri['query']
        ];

        $isCurrentQueryEmpty = empty($currentUri['query']);
        $isRedirectQueryEmpty = empty($redirectOptionUriArray['query']);

        $isUrnExist =
            $currentUri['urn']
            && $redirectOptionUriArray['urn']
            && preg_match(
            // find first URN path exact as redirect URN to avoid infinite redirects
                '/^(' . preg_quote($redirectOptionUriArray['urn'], '/') . '\b)(?=[^-.]|$)/ui',
                $currentUri['urn']
            );

        $isQueryExist =
            $currentUri['query']
            && $redirectOptionUriArray['query']
            && false !== strpos($currentUri['query'], $redirectOptionUriArray['query']);

        $isOnlyQueryExist =
            empty($redirectOptionUriArray['urn'])
            && $isQueryExist;

        if (($isUrnExist && ($isQueryExist || $isCurrentQueryEmpty || $isRedirectQueryEmpty)) || $isOnlyQueryExist) {
            return true;
        }

        return false;
    }

    private function isFromConditionViolate()
    {
        if (empty($this->getRedirectOption()['from_as_regex'])) {
            return $this->isFromConditionViolateCommon();
        }

        return $this->isFromConditionViolateRegex();
    }

    private function isFromConditionViolateCommon()
    {
        $redirectFromOptionUriArray = explode('?', $this->redirectOption['from'], 2);

        $redirectFromOptionUriArray['urn'] = isset($redirectFromOptionUriArray[0]) && $redirectFromOptionUriArray[0]
            // surround slashes
            ? RedirectHelper::getUrnSurroundedBySashes($redirectFromOptionUriArray[0])
            : '';

        $redirectFromOptionUriArray['query'] = isset($redirectFromOptionUriArray[1]) ? $redirectFromOptionUriArray[1] : '';

        $redirectFromOptionUriString = $redirectFromOptionUriArray['query']
            ? "{$redirectFromOptionUriArray['urn']}?{$redirectFromOptionUriArray['query']}"
            : $redirectFromOptionUriArray['urn'];

        $isSameQuery =
            isset($this->redirectOption['ignore_query'])
            || trim($redirectFromOptionUriArray['query']) === $this->currentUri['query'];

        $isSameUrn =
            RedirectHelper::getUrnWithoutSlashes($redirectFromOptionUriArray['urn'])
            === RedirectHelper::getUrnWithoutSlashes($this->currentUri['urn']);

        $isSameUri = $isSameQuery && $isSameUrn;

        if (empty($redirectFromOptionUriString) || $isSameUri) {
            return false;
        }

        return true;
    }

    private function isFromConditionViolateRegex()
    {
        $currentUriString = $this->currentUri['urn'] ? $this->currentUri['urn'] : '';
        $currentUriString .= $this->currentUri['query'] ? "?{$this->currentUri['query']}" : '';

        if (preg_match(
            "/{$this->redirectOption['from']}/ui",
            $currentUriString
        )) {
            return false;
        }

        return true;
    }
}
