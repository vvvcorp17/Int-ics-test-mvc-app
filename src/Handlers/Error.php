<?php

namespace App\Handlers;

/**
 *
 */
class Error
{
    /**
     * @param int $error
     * @param string $errorMessage
     * @param string $file
     * @param string $line
     * @return bool
     */
    public function errorHandler(int $error, string $errorMessage, string $file, string $line): bool
    {
        if (!(error_reporting() & $error)) {
            // This error code is not included in error_reporting, so let it fall
            // through to the standard PHP error handler
            return false;
        }

        // $errstr may need to be escaped:
        $errorMessage = htmlspecialchars($errorMessage);

        switch ($error) {
            case E_USER_ERROR:
                echo "<b>USER ERROR</b> [$error] $errorMessage<br />\n";
                exit(1);

            case E_USER_WARNING:
                echo "<b>WARNING</b> [$error] $errorMessage<br />\n";
                break;

            case E_USER_NOTICE:
                echo "<b>My NOTICE</b> [$error] $errorMessage<br />\n";
                break;

            default:
                echo "Unknown error type: [$error] $errorMessage<br />\n";
                break;
        }

        return true;
    }
}