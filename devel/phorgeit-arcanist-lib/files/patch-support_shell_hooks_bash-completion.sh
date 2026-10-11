--- support/shell/hooks/bash-completion.sh.orig	2026-10-06 11:41:58 UTC
+++ support/shell/hooks/bash-completion.sh
@@ -1,9 +1,10 @@
-SCRIPTDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" > /dev/null && pwd )"
-GENERATED_RULES_FILE="${SCRIPTDIR}/../rules/bash-rules.sh"
+ARCANIST_INSTALL_DIR="%%PREFIX%%/%%PHP_DESTDIR%%"
+GENERATED_RULES_FILE="${ARCANIST_INSTALL_DIR}/support/shell/rules/bash-rules.sh"
 
 # Try to generate the shell completion rules if they do not yet exist.
 if [ ! -f "${GENERATED_RULES_FILE}" ]; then
-  arc shell-complete --generate >/dev/null 2>/dev/null
+  "${ARCANIST_INSTALL_DIR}/bin/arc" \
+    shell-complete --generate -- >/dev/null 2>/dev/null
 fi;
 
 # Source the shell completion rules.
