<?php

/**
 * MessageManager show messages on top of admin page
 *
 * @param $message: message to be displayed
 * @param $isError: boolean value
 *
 * @author Roberto Ratti <roberto.ratti@netjas.com>
 *
 */
class MessageManager {

    private $message;
    private $isError;

    /*
     * @param $message: message to be displayed.
     * @param $isError: if TRUE shows an error, otherwise shows a message
     */

    public function __construct($message = '', $isError = FALSE) {
        $this->message = $message;
        $this->isError = $isError;
    }

    /*
     * Set the message as an error
     * @return void
     */

    public function set_error() {
        $this->isError = TRUE;
    }

    /**
     * Set the message to be displayed
     * @param String $message
     * @return void
     */
    public function set_message($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return '<div class="' . (($this->isError) ? 'error' : 'updated') . '"><p>' . $this->message . '</p></div>';
    }

}

?>