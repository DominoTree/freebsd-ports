--- src/utils/PhutilExecutionEnvironment.php.orig	2026-10-06 11:41:58 UTC
+++ src/utils/PhutilExecutionEnvironment.php
@@ -36,7 +36,7 @@ final class PhutilExecutionEnvironment extends Phobjec
     }
 
     list($env) = execx(
-      'php -d variables_order=E -r %s',
+      '%%PHP_CMD%% -d variables_order=E -r %s',
       'echo json_encode($_ENV);');
     $env = phutil_json_decode($env);
 
