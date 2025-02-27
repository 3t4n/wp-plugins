<?php
namespace DaReactions;
/**
 *
 */
class Error
{
    private $errors = [];
    /**
     * @param string $message
     */
    public function __construct($message)
    {
        $this->errors[] = $message;
    }
    /**
     * @return string|void
     */
    public function getErrorString() {
        if (count($this->errors) > 0) {
            return implode(', ', $this->errors);
        }
        return __('No errors', 'da-reactions');
    }
}
