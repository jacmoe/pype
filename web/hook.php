<?php
/*
 * Endpoint for Github Webhook URLs
 *
 * see: https://help.github.com/articles/post-receive-hooks
 *
 */

function run($postBody, $headers) {

    $payload = json_decode($postBody);

    $signature = $headers['X-Hub-Signature'];
    if ( ! isset( $signature ) ){
        echo 'No signature';
        return false;
    }

    $secret = 'PaldaMQ2zFEsAhv2SPRlp2it_XNnSuJz';//getenv('WEBHOOK_SECRET');

    $hash = 'sha1=' . hash_hmac( 'sha1', $postBody, $secret, false );

    if($hash !== $signature){
        echo 'Secret does not match';
        return false;
    }

    // check if the push came from the right repository
    if ($payload->repository->url == 'https://github.com/jacmoe/mdpages-pages'
        && $payload->ref == 'refs/heads/master') {

        // execute update script
        passthru('/usr/local/php56/bin//php /home/jacmoe1/pype.jacmoe.dk/current/yii mdpages/pages/update');

        return true;
    } else {
        throw new Exception("This does not appear to be a valid requests from Github.\n");
    }
}

try {
    $payload = file_get_contents( 'php://input' );
    if (!isset($payload)) {
        echo "Works fine.";
    } else {
        run($payload, getallheaders());
    }
} catch ( Exception $e ) {
    $msg = $e->getMessage();
    //mail($error_mail, $msg, ''.$e);
}
