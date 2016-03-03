<?php

setCookie('Usuario', '', time() - 1000);
header('Location: index.php');


