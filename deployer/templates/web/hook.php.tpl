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

    $secret = '{{app.webhook.secret}}';//getenv('WEBHOOK_SECRET');

    $hash = 'sha1=' . hash_hmac( 'sha1', $postBody, $secret, false );

    if($hash !== $signature){
        echo 'Secret does not match';
        return false;
    }

    // check if the push came from the right repository
    if ($payload->repository->url == 'https://github.com/{{app.github.owner}}/{{app.github.repo}}'
        && $payload->ref == 'refs/heads/{{app.github.branch}}') {

        // execute update script
        passthru('{{app.webhook.php}} {{app.webhook.yii}} mdpages/pages/update');

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
