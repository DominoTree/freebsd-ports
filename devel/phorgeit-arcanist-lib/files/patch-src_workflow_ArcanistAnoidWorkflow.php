--- src/workflow/ArcanistAnoidWorkflow.php.orig	2026-10-06 11:41:58 UTC
+++ src/workflow/ArcanistAnoidWorkflow.php
@@ -24,11 +24,12 @@ EOTEXT
   }
 
   protected function runWorkflow() {
-    if (!Filesystem::binaryExists('python3')) {
+    if (!Filesystem::binaryExists('%%PYTHON_CMD%%')) {
       throw new PhutilArgumentUsageException(
         pht(
-          'The "arc anoid" workflow requires "python3" to be available '.
-          'in your $PATH.'));
+          'The "arc anoid" workflow requires "%s" to be available '.
+          'in your $PATH.',
+          '%%PYTHON_CMD%%'));
     }
 
     $support_dir = phutil_get_library_root('arcanist');
