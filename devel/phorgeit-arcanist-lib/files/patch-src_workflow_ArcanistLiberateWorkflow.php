--- src/workflow/ArcanistLiberateWorkflow.php.orig	2026-10-06 11:41:58 UTC
+++ src/workflow/ArcanistLiberateWorkflow.php
@@ -174,7 +174,7 @@ EOTEXT
     }
 
     return phutil_passthru(
-      'php -f %R -- %Ls %R',
+      '%%PHP_CMD%% -f %R -- %Ls %R',
       $bin,
       $argv,
       $path);
