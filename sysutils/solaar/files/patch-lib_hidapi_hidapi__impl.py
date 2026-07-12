--- lib/hidapi/hidapi_impl.py.orig	2026-06-28 13:55:10 UTC
+++ lib/hidapi/hidapi_impl.py
@@ -60,6 +60,8 @@ _library_paths = (
     "libhidapi-hidraw.so.0",
     "libhidapi-libusb.so",
     "libhidapi-libusb.so.0",
+    "libhidapi.so",
+    "libhidapi.so.0",
     "libhidapi-iohidmanager.so",
     "libhidapi-iohidmanager.so.0",
     "libhidapi.dylib",
