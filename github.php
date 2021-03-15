<?php

if ($_POST && $_POST['payload']) {
    $payload = json_decode($_POST['payload'], true);
    if (isset($payload['ref']) && $payload['ref'] == 'refs/heads/master') {
//         exec("rm /var/www/git-stuward/webhook.log");
        exec("cd /var/www/html/ && rm -R projet_trans_b2/* && rm -R projet_trans_b2/.git");
        exec("cd /var/www/html/ && git clone git clone https://github.com/Alexandre-stoppini/projet_trans_b2.git && echo $(date) ' : Success' >> ./webhook.log || echo $(date)' : Error' >> ./webhook.log");
        exec("tail -1 /var/www/html/projet_trans_b2/webhook.log | wall --nobanner $1");
    }
}

?>
