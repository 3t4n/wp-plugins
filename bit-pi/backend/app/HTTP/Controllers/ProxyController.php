<?php

namespace BitApps\Pi\HTTP\Controllers;

\define('strict_types', 1);

use BitApps\Pi\Deps\BitApps\WPKit\Http\Client\HttpClient;
use BitApps\Pi\Deps\BitApps\WPKit\Http\Response;
use BitApps\Pi\Factories\ProxyRequestParserFactory;
use BitApps\Pi\HTTP\Requests\ProxyRequest;
use BitApps\Pi\src\Integrations\CommonActions\ApiRequestHelper;

final class ProxyController
{
    private const FORM_CONTENT_TYPE = 'multipart/form-data';

    /**
     * Make a proxy request.
     *
     * @param ProxyRequest $request
     *
     * @return Response
     */
    public function proxyRequest(ProxyRequest $request)
    {
        $validated = ProxyRequestParserFactory::parse($request->validated());

        $url = $validated['url'];
        $method = strtoupper($validated['method']);
        $headers = $validated['headers'] ?? null;
        $queryParams = $validated['queryParams'] ?? null;
        $bodyParams = $method === 'POST' ? $validated['bodyParams'] ?? [] : [];

        $contentType = $headers['Content-Type'] ?? null;

        $error = $this->isInvalidURL($url);

        $uuid = null;

        if ($contentType === self::FORM_CONTENT_TYPE) {
            $uuid = uniqid();
            $contentType = self::FORM_CONTENT_TYPE . "; boundary={$uuid}";
        }

        if ($contentType) {
            $bodyParams = ApiRequestHelper::prepareRequestBody($headers['Content-Type'], $bodyParams, $uuid);
            $headers['Content-Type'] = $contentType;
        }

        if ($error) {
            return Response::error($error);
        }

        if (!\is_null($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }

        if ($method === 'GET') {
            $bodyParams = null;
        }

        $response = (new HttpClient())->request($url, $method, $bodyParams, $headers);

        if (is_wp_error($response)) {
            return Response::error('Something went wrong');
        }

        return Response::success($response);
    }

    /**
     * check if the URL is invalid.
     *
     * @param string $url
     *
     * @return string|bool
     */
    private function isInvalidURL($url)
    {
        $parsedUrl = wp_parse_url($url);

        if ($parsedUrl === false || !\in_array($parsedUrl['scheme'], ['http', 'https'], true)) {
            return 'Only HTTP and HTTPS URLs are allowed.';
        }

        if (isset($parsedUrl['host']) && $parsedUrl['host'] === site_url()) {
            return 'Self request is not allowed.';
        }

        return false;
    }
}
