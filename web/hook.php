<?php
/*
 * Endpoint for Github Webhook URLs
 *
 * see: https://help.github.com/articles/post-receive-hooks
 *
 */

function run($postBody) {

    $payload = json_decode($postBody);

    // check if the request comes from github server
    $github_ips = array('207.97.227.253', '50.57.128.197', '108.171.174.178', '50.57.231.61');
    //if (in_array($_SERVER['REMOTE_ADDR'], $github_ips)) {

    if (1 === 1) {
        // check if the push came from the right repository
        if ($payload->repository->url == 'https://github.com/jacmoe/mdpages-pages') {

            // execute update script, and record its output
            passthru('/usr/local/php56/bin//php /home/jacmoe1/pype.jacmoe.dk/current/yii mdpages/pages/update');

            // // prepare and send the notification email
            // if (isset($config['email'])) {
            //     // send mail to someone, and the github user who pushed the commit
            //     $body = '<p>The Github user <a href="https://github.com/'
            //     . $payload->pusher->name .'">@' . $payload->pusher->name . '</a>'
            //     . ' has pushed to ' . $payload->repository->url
            //     . ' and consequently, ' . $endpoint['action']
            //     . '.</p>';
            //
            //     $body .= '<p>Here\'s a brief list of what has been changed:</p>';
            //     $body .= '<ul>';
            //     foreach ($payload->commits as $commit) {
            //         $body .= '<li>'.$commit->message.'<br />';
            //         $body .= '<small style="color:#999">added: <b>'.count($commit->added)
            //             .'</b> &nbsp; modified: <b>'.count($commit->modified)
            //             .'</b> &nbsp; removed: <b>'.count($commit->removed)
            //             .'</b> &nbsp; <a href="' . $commit->url
            //             . '">read more</a></small></li>';
            //     }
            //     $body .= '</ul>';
            //     $body .= '<p>What follows is the output of the script:</p><pre>';
            //     $body .= $output. '</pre>';
            //     $body .= '<p>Cheers, <br/>Github Webhook Endpoint</p>';
            //
            //     mail($config['email']['to'], $endpoint['action'], $body, $headers);
            // }
            return true;
        }
    } else {
        throw new Exception("This does not appear to be a valid requests from Github.\n");
    }
}

try {
    $payload = file_get_contents( 'php://input' );
    if (!isset($payload)) {
        echo "Works fine.";
    } else {
        run($payload);
    }
} catch ( Exception $e ) {
    $msg = $e->getMessage();
    //mail($error_mail, $msg, ''.$e);
}
