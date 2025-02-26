<?php

namespace AISummarizer\Models;

use Aws\BedrockRuntime\BedrockRuntimeClient;
use Aws\Exception\AwsException;
use WP_Error;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

class BedrockModel
{
    private $client;
    private $modelId;

    /**
     * Constructor for BedrockModel.
     *
     * @param array $config Configuration parameters.
     */
    public function __construct(array $config)
    {
        $this->modelId = $config['model_id'] ?? '';

        // Initialize the BedrockRuntimeClient with the provided configuration
        $this->client = new BedrockRuntimeClient(
            [
                'version'     => 'latest',
                'region'      => $config['aws_region'] ?? 'us-east-1',
                'credentials' => [
                    'key'    => $config['aws_access_key'] ?? '',
                    'secret' => $config['aws_secret_key'] ?? '',
                ],
            ]
        );
    }

    /**
     * Summarizes the given text using the Bedrock API.
     *
     * @param string $text The text to summarize.
     *
     * @return string The summarized text.
     */
    public function AISummarizer_summarize(string $text, int $length): array
    {
        try {
            $result = $this->client->invokeModel(
                [
                    'modelId'       => $this->modelId,
                    'contentType'   => 'application/json',
                    'accept'        => 'application/json',
                    'body'          => wp_json_encode(
                        [
                            'inputText'             => 'Make a summary of the following content: ' . $text,
                            'textGenerationConfig'   => [
                                'maxTokenCount' => $length,
                                'stopSequences' => [],
                                'temperature'   => 0.7,
                                'topP'          => 1.0
                            ]
                        ]
                    )
                ]
            );

            $responseBody = (string) $result['body'];
            $responseArray = json_decode($responseBody, true);

            $summary = isset($responseArray['results'][0]['outputText'])
                ? wp_strip_all_tags($responseArray['results'][0]['outputText'])
                : __('No summary available', 'ai-summarizer');


            $lastPeriod = strrpos($summary, '.');
            if ($lastPeriod !== false) {
                $summary = substr($summary, 0, $lastPeriod + 1); // Trim to the last full sentence
            }

            return [
                'summary' => $summary,
                'success' => isset($responseArray['results'][0]['outputText']) // success is true if summary exists
            ];
        } catch (AwsException $e) {
            // Log the AWS error with context for better debugging
            // error_log(
            //     sprintf(
            //         'AWS Bedrock Error: [%s] %s',
            //         $e->getStatusCode(),
            //         $e->getAwsErrorMessage()
            //     )
            // );

            // Prepare a user-friendly error message
            $errorMessage = sprintf(
                // Translators: %s is the AWS error message, and %d is the HTTP status code
                __('AWS Bedrock Error: %1$s (HTTP %2$d)', 'ai-summarizer'),
                $e->getAwsErrorMessage(),
                $e->getStatusCode()
            );

            // Return the formatted error message
            return ['summary' => $errorMessage, 'success' => false];
        } catch (\Exception $e) {
            // Log general exceptions
            // error_log('General Error: ' . $e->getMessage());
            // Return an error message as a string
            return __('Error: ', 'ai-summarizer') . $e->getMessage();
        }
    }
}
