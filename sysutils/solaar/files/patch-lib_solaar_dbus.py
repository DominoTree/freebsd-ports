--- lib/solaar/dbus.py.orig	2026-06-28 13:55:10 UTC
+++ lib/solaar/dbus.py
@@ -61,7 +61,9 @@ def watch_suspend_resume(
     global _resume_callback, _suspend_callback
     _suspend_callback = on_suspend_callback
     _resume_callback = on_resume_callback
-    if bus is not None and on_resume_callback is not None or on_suspend_callback is not None:
+    if bus is None:
+        return
+    if on_resume_callback is not None or on_suspend_callback is not None:
         bus.add_signal_receiver(
             _suspend_or_resume,
             "PrepareForSleep",
