--- support/shell/templates/bash-template.sh.orig	2026-10-06 11:41:58 UTC
+++ support/shell/templates/bash-template.sh
@@ -2,7 +2,7 @@ _arcanist_complete_{{{BIN}}} ()
 {
   COMPREPLY=()
 
-  RESULT=$(echo | {{{BIN}}} shell-complete \
+  RESULT=$(echo | "%%PREFIX%%/%%PHP_DESTDIR%%/bin/{{{BIN}}}" shell-complete \
     --current ${COMP_CWORD} \
     -- \
     "${COMP_WORDS[@]}" \
