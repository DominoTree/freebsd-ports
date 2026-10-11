--- src/toolset/workflow/ArcanistVersionWorkflow.php.orig	2026-10-06 11:41:58 UTC
+++ src/toolset/workflow/ArcanistVersionWorkflow.php
@@ -36,45 +36,11 @@ EOTEXT
 
     $console = PhutilConsole::getConsole();
 
-    if (!Filesystem::binaryExists('git')) {
-      throw new ArcanistUsageException(
-        pht(
-          'Cannot display current version without "%s" installed.',
-          'git'));
-    }
-
-    $roots = array(
-      'arcanist' => dirname(phutil_get_library_root('arcanist')),
-    );
-
-    foreach ($roots as $lib => $root) {
-      $working_copy = ArcanistWorkingCopy::newFromWorkingDirectory($root);
-
-      $repository_api = $working_copy->getRepositoryAPI();
-      $is_git = ($repository_api instanceof ArcanistGitAPI);
-
-      if (!$is_git) {
-        throw new PhutilArgumentUsageException(
-          pht(
-            'Library "%s" (at "%s") is not a Git working copy, so no version '.
-            'information can be provided.',
-            $lib,
-            Filesystem::readablePath($root)));
-      }
-
-      list($commit) = $repository_api->execxLocal(
-        'log -1 --format=%s',
-        '%ct%x01%H');
-      $commit = trim($commit);
-
-      list($timestamp, $commit) = explode("\1", $commit);
-
-      $console->writeOut(
-        "%s %s (%s)\n",
-        $lib,
-        $commit,
-        date('j M Y', (int)$timestamp));
-    }
+    $console->writeOut(
+      "%s %s (%s)\n",
+      '%%PKGNAME%%',
+      '%%PKGVERSION%%',
+      '%%PKGORIGIN%%');
 
     return 0;
   }
