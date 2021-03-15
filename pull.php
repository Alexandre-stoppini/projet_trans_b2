<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

if ( $_POST['payload'] ) {
shell_exec( "cd /var/www/html/projet_trans_b2/ && git reset –hard HEAD && git pull" );
}

?>
