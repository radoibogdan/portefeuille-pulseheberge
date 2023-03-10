<?php

echo password_hash('Doe', PASSWORD_DEFAULT, ['cost' => 14]); // une clé généré ($2y$10cnsdkfnsdkflsd)
echo password_verify('Doe','clé non conforme'); // => false
echo password_verify('Doe','$2y$10cnsdkfnsdkflsd'); // => true