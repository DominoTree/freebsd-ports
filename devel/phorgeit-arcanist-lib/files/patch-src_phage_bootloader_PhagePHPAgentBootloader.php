--- src/phage/bootloader/PhagePHPAgentBootloader.php.orig	2026-10-06 11:41:58 UTC
+++ src/phage/bootloader/PhagePHPAgentBootloader.php
@@ -26,7 +26,7 @@ final class PhagePHPAgentBootloader extends PhageAgent
     // reads and evaluates the main agent program.
 
     return csprintf(
-      'php -r %s',
+      '%%PHP_CMD%% -r %s',
       "eval(fread(\$I=fopen('php://stdin', 'r'), {$len})); /* phage! */");
   }
 
