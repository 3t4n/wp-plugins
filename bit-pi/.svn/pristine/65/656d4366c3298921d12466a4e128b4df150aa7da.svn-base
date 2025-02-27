<?php

namespace BitApps\Pi\Helpers;

use BitApps\Pi\Config;

if (!\defined('ABSPATH')) {
    exit;
}

class Utility
{
    /**
     * Gets a value from an array using a path.
     *
     * @param array  $data The array to get the value from.
     * @param string $path The path to the value.
     *
     * @return mixed The value.
     */
    public static function getValueFromPath($data, $path)
    {
        if (empty($data)) {
            return $data;
        }

        if (!\is_null($path) && $path !== '') {
            $keys = explode('.', $path);

            foreach ($keys as $key) {
                $data = \is_object($data) ? (array) $data : $data;

                if (\array_key_exists($key, $data)) {
                    $data = $data[$key];
                }
            }
        }

        return $data;
    }

    public static function formatResponseData($statusCode, $requestBody, $response, $message = null)
    {
        if ($statusCode >= 200 && $statusCode < 300) {
            return [
                'status'  => 'success',
                'message' => $message,
                'output'  => $response ?? [],
                'input'   => $requestBody ?? [],
            ];
        }

        return [
            'status'  => 'error',
            'message' => $message,
            'output'  => $response,
            'input'   => $requestBody,
        ];
    }

    /**
     * Checks if the given array is a multi-dimensional array.
     *
     * @param array $data
     *
     * @return bool Whether the array is a multi-dimensional array.
     */
    public static function isMultiDimensionArray($data)
    {
        if (!\is_array($data) || empty($data)) {
            return false;
        }

        $arrayValuesWithIntegerKeys = array_filter(
            $data,
            fn ($val, $key) => (\is_array($val) || \is_object($val)) && \is_int($key),
            ARRAY_FILTER_USE_BOTH
        );

        return \count($arrayValuesWithIntegerKeys) === \count($data);
    }

    /**
     * get file path in wordpress.
     *
     * @param mixed $file
     */
    public static function getFilePath($file)
    {
        $fileUploadBaseUrl = Config::get('UPLOAD_BASE_URL');

        $fileUploadBaseDir = Config::get('UPLOAD_BASE_DIR');

        if (\is_array($file)) {
            $path = [];
            foreach ($file as $fileIndex => $fileUrl) {
                $path[$fileIndex] = str_replace($fileUploadBaseUrl, $fileUploadBaseDir, $fileUrl);
            }
        } else {
            $path = str_replace($fileUploadBaseUrl, $fileUploadBaseDir, $file);
        }

        return $path;
    }
}
