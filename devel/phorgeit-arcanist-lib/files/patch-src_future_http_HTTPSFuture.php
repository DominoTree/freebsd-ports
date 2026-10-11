--- src/future/http/HTTPSFuture.php.orig	2026-10-06 11:41:58 UTC
+++ src/future/http/HTTPSFuture.php
@@ -243,6 +243,8 @@ final class HTTPSFuture extends BaseHTTPFuture {
 
       if (!empty(self::$pool[$domain])) {
         $curl = array_pop(self::$pool[$domain]);
+        // Do not retain per-request CA settings.
+        curl_reset($curl);
       } else {
         $curl = curl_init();
         if (!$curl) {
@@ -379,31 +381,26 @@ final class HTTPSFuture extends BaseHTTPFuture {
       //   means that the user wants to override everything (also because the
       //   user might not have access to change the box's php.ini to add
       //   curl.cainfo).
-      // - Otherwise, try using curl.cainfo. If it's set explicitly, it's
-      //   probably reasonable to try using it before we fall back to what
-      //   Arcanist ships with.
-      // - Lastly, try the default that Arcanist ships with. If it doesn't
-      //   work, give up and yell at the user.
+      // - Otherwise, leave cURL's configured CA defaults in effect.
 
       if (!$this->getCABundle()) {
         $caroot = dirname(phutil_get_library_root('arcanist'));
         $caroot = $caroot.'/resources/ssl/';
 
-        $ini_val = ini_get('curl.cainfo');
         if (self::getGlobalCABundle()) {
           $this->setCABundleFromPath(self::getGlobalCABundle());
         } else if (Filesystem::pathExists($caroot.'custom.pem')) {
           $this->setCABundleFromPath($caroot.'custom.pem');
-        } else if ($ini_val) {
-          // TODO: We can probably do a pathExists() here, even.
-          $this->setCABundleFromPath($ini_val);
-        } else {
-          $this->setCABundleFromPath($caroot.'default.pem');
         }
       }
 
-      if ($this->canSetCAInfo()) {
-        curl_setopt($curl, CURLOPT_CAINFO, $this->getCABundle());
+      $ca_bundle = $this->getCABundle();
+      if ($ca_bundle && $this->canSetCAInfo()) {
+        if (is_dir($ca_bundle)) {
+          curl_setopt($curl, CURLOPT_CAPATH, $ca_bundle);
+        } else {
+          curl_setopt($curl, CURLOPT_CAINFO, $ca_bundle);
+        }
       }
 
       $verify_peer = true;
