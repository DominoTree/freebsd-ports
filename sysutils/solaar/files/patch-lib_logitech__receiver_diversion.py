--- lib/logitech_receiver/diversion.py.orig
+++ lib/logitech_receiver/diversion.py
@@ -42,7 +42,7 @@
 # There is no evdev on macOS or Windows. Diversion will not work without
 # it but other Solaar functionality is available.
-if platform.system() in ("Darwin", "Windows"):
+try:
+    import evdev
+except ImportError:
     evdev = None
-else:
-    import evdev
