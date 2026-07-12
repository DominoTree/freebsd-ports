--- setup.py.orig	2026-06-28 13:55:10 UTC
+++ setup.py
@@ -1,3 +1,4 @@
+import platform
 import subprocess
 import textwrap
 
@@ -35,7 +36,8 @@ def _data_files():
         yield dirname(mo), [mo]
 
     yield "share/applications", ["share/applications/solaar.desktop"]
-    yield "lib/udev/rules.d", ["rules.d/42-logitech-unify-permissions.rules"]
+    if platform.system() == "Linux":  # udev is Linux-only
+        yield "lib/udev/rules.d", ["rules.d/42-logitech-unify-permissions.rules"]
     yield "share/metainfo", ["share/solaar/io.github.pwr_solaar.solaar.metainfo.xml"]
 
 
@@ -64,13 +66,14 @@ setup(
         "Natural Language :: English",
         "Programming Language :: Python :: 3 :: Only",
         "Operating System :: POSIX :: Linux",
+        "Operating System :: POSIX :: BSD :: FreeBSD",
         "Topic :: Utilities",
     ],
-    platforms=["linux"],
+    platforms=["linux", "freebsd"],
     python_requires=">=3.8",
     install_requires=[
         'evdev (>= 1.1.2) ; platform_system=="Linux"',
-        "pyudev (>= 0.13)",
+        'pyudev (>= 0.13) ; platform_system=="Linux"',
         "PyYAML (>= 3.12)",
         "python-xlib (>= 0.27)",
         "psutil (>= 5.4.3)",
