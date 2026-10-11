--- src/error/PhutilErrorHandler.php.orig	2026-10-06 11:41:58 UTC
+++ src/error/PhutilErrorHandler.php
@@ -185,6 +185,14 @@ final class PhutilErrorHandler extends Phobject {
    * @task internal
    */
   public static function handleError($num, $str, $file, $line, $ctx = null) {
+    // Ignore PHP 8.1 null-argument deprecations.
+    if ($num === E_DEPRECATED &&
+        preg_match(
+          '/Passing null to parameter #.* of type .* is deprecated/',
+          $str)) {
+      return true;
+    }
+
     foreach (self::$traps as $trap) {
       $trap->addError($num, $str, $file, $line);
     }
