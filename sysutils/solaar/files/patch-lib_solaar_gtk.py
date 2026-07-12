--- lib/solaar/gtk.py.orig	2026-06-28 13:55:10 UTC
+++ lib/solaar/gtk.py
@@ -157,7 +157,8 @@ def main():
 
 
 def main():
-    if platform.system() not in ("Darwin", "Windows"):
+    # Only the Linux HID backend uses pyudev; other platforms use the hidapi backend.
+    if platform.system() == "Linux":
         _require("pyudev", "python3-pyudev")
 
     args = _parse_arguments()
