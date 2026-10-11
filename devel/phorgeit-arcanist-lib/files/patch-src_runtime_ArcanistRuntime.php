--- src/runtime/ArcanistRuntime.php.orig	2026-10-06 11:41:58 UTC
+++ src/runtime/ArcanistRuntime.php
@@ -231,7 +231,7 @@ final class ArcanistRuntime {
     $bin = $arcanist_root.'/scripts/arcanist.php';
 
     $err = phutil_passthru(
-      'php -f %R -- %Ls',
+      '%%PHP_CMD%% -f %R -- %Ls',
       $bin,
       array_slice($argv, 1));
 
