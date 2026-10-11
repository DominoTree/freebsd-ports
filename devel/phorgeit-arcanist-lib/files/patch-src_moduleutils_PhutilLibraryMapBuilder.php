--- src/moduleutils/PhutilLibraryMapBuilder.php.orig	2026-10-06 11:41:58 UTC
+++ src/moduleutils/PhutilLibraryMapBuilder.php
@@ -269,7 +269,7 @@ final class PhutilLibraryMapBuilder extends Phobject {
     }
 
     return new ExecFuture(
-      'php -f %R -- --ugly %Ls -- %Ls',
+      '%%PHP_CMD%% -f %R -- --ugly %Ls -- %Ls',
       $bin,
       $flags,
       $paths);
