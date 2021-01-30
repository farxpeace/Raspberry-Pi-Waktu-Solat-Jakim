<?php
    class PHPFatalError {

    public function setHandler() {
            register_shutdown_function('handleShutdown');
        }

    }

    function handleShutdown() {
        if (($error = error_get_last())) {
            ob_start();
                echo "<pre>";
            var_dump($error);
                echo "</pre>";
            $message = ob_get_clean();
            sendEmail($message);
            ob_start();
            echo '{"status":"error","message":"Internal application error!"}';
            ob_flush();
            exit();
        }
    }