--- src/configuration/ArcanistSettings.php.orig	2026-10-06 11:41:58 UTC
+++ src/configuration/ArcanistSettings.php
@@ -95,7 +95,7 @@ final class ArcanistSettings extends Phobject {
       'https.cabundle' => array(
         'type' => 'string',
         'help' => pht(
-          "Path to a custom CA bundle file to be used for cURL calls. ".
+          "Path to a custom CA file or hashed CA directory for cURL calls. ".
           "This is used primarily when your conduit endpoint is ".
           "behind HTTPS signed by your organization's internal CA."),
         'example' => 'support/yourca.pem',
