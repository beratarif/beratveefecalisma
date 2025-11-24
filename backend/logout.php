<?php
require_once 'session.php';

switch ($_GET['hangi_cikis']) {
    case 'normal': CikisYap(); break;
    case 'yetkili': CikisYapYetkili(); break;
}
?>