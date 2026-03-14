PORTNAME=	solaar
DISTVERSION=	1.1.19
PORTREVISION= 1	
CATEGORIES=	sysutils

MAINTAINER=	ports@FreeBSD.org
COMMENT=	Device manager for the Logitech Unifying Receiver
WWW=		https://pwr-solaar.github.io/Solaar/

LICENSE=	GPLv2+
LICENSE_FILE=	${WRKSRC}/LICENSE.txt

# libhidapi.so is only loaded at runtime via ctypes (dlopen)
RUN_DEPENDS=	${LOCALBASE}/lib/libhidapi.so:comms/hidapi

USES=		python
USE_GITHUB=	yes
GH_ACCOUNT=	pwr-Solaar
GH_PROJECT=	Solaar
USE_PYTHON=	autoplist concurrent distutils optsuffix

NO_ARCH=	yes

OPTIONS_DEFINE=	EVDEV GUI
OPTIONS_DEFAULT=	EVDEV

EVDEV_DESC=	Input simulation support (KeyPress/MouseClick/MouseScroll rules)
EVDEV_RUN_DEPENDS=	${PYTHON_PKGNAMEPREFIX}evdev>=1.1.2:devel/py-evdev

GUI_USES=	gnome
GUI_USE=	GNOME=pygobject3:run

post-patch:
	@${REINPLACE_CMD} '/pyudev/d' \
		${WRKSRC}/lib/solaar/gtk.py

post-build:
	${AWK} -f ${FILESDIR}/devd-solaar.awk \
		${WRKSRC}/rules.d/42-logitech-unify-permissions.rules \
		> ${WRKDIR}/solaar.conf.sample

post-install:
	${INSTALL_DATA} ${WRKDIR}/solaar.conf.sample \
		${STAGEDIR}${PREFIX}/etc/devd

.include <bsd.port.mk>
