--- lib/solaar/listener.py.orig	2026-06-28 13:55:10 UTC
+++ lib/solaar/listener.py
@@ -19,6 +19,7 @@ import logging
 
 import errno
 import logging
+import platform
 import subprocess
 import time
 import typing
@@ -472,7 +473,9 @@ def _process_add(device_info: DeviceInfo, retry):
     except OSError as e:
         if e.errno == errno.EACCES:
             try:
-                output = subprocess.check_output(["getfacl", "-p", device_info.path], text=True)
+                # -p (don't strip leading '/') is a Linux getfacl extension
+                getfacl = ["getfacl", "-p"] if platform.system() == "Linux" else ["getfacl"]
+                output = subprocess.check_output([*getfacl, device_info.path], text=True)
                 logger.warning("Missing permissions on %s\n%s.", device_info.path, output)
             except Exception:
                 pass
