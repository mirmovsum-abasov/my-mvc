<?php

namespace app\Core\Session;

class Session
{
    public function __construct()
    {
        if (isset($_SESSION['flash_message'])) {
            unset($_SESSION['flash_message']);
        }
    }

    public function setFlash($message, $type = 'danger')
    {
        $_SESSION['flash_message'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function flash()
    {
        if (isset($_SESSION['flash_message'])) {
            ?>
            <div id="alert" class="alert alert-<?php echo $_SESSION['flash_message']['type'] ?>" role="alert">
                <strong><?php print_r($_SESSION['flash_message']['message']); ?></strong>
            </div>
            <?php
            unset($_SESSION['flash_message']);
        }
    }

}