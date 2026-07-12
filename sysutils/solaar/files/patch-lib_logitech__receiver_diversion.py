--- lib/logitech_receiver/diversion.py.orig	2026-06-28 13:55:10 UTC
+++ lib/logitech_receiver/diversion.py
@@ -21,7 +21,6 @@ import os
 import math
 import numbers
 import os
-import platform
 import socket
 import struct
 import subprocess
@@ -39,12 +38,13 @@ from keysyms import keysymdef
 
 from keysyms import keysymdef
 
-# There is no evdev on macOS or Windows. Diversion will not work without
-# it but other Solaar functionality is available.
-if platform.system() in ("Darwin", "Windows"):
-    evdev = None
-else:
+# evdev is not available on every platform, and is an optional dependency
+# elsewhere. Diversion will not work without it but other Solaar
+# functionality is available.
+try:
     import evdev
+except ImportError:
+    evdev = None
 
 from .common import NamedInt
 from .hidpp20 import SupportedFeature
@@ -197,7 +197,7 @@ def gnome_dbus_interface_setup():
         bus = dbus.SessionBus()
         remote_object = bus.get_object("org.gnome.Shell", "/io/github/pwr_solaar/solaar")
         _dbus_interface = dbus.Interface(remote_object, "io.github.pwr_solaar.solaar")
-    except dbus.exceptions.DBusException:
+    except Exception:
         logger.warning(
             "Solaar Gnome extension not installed - some rule capabilities inoperable",
             exc_info=sys.exc_info(),
@@ -257,6 +257,8 @@ def setup_uinput():
 
 def setup_uinput():
     global udevice
+    if evdev is None:
+        return False
     if udevice is not None:
         return udevice
     try:
@@ -337,6 +339,8 @@ def click_uinput(button, count):
 
 
 def click_uinput(button, count):
+    if evdev is None:
+        return False
     if isinstance(count, int):
         for _ in range(count):
             if not simulate_uinput(evdev.ecodes.EV_KEY, button[1], 1):
