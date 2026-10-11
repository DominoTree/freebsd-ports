--- src/lint/linter/ArcanistPhpLinter.php.orig	2026-10-06 11:41:58 UTC
+++ src/lint/linter/ArcanistPhpLinter.php
@@ -44,7 +44,7 @@ final class ArcanistPhpLinter extends ArcanistExternal
   }
 
   public function getDefaultBinary() {
-    return 'php';
+    return '%%PHP_CMD%%';
   }
 
   public function getVersion() {
