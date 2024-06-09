<?php

class MigrationController {
    public function createTables() {
        require_once('../migrations/createTable.php');
    }
}

?>
