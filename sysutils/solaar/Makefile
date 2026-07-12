PORTNAME=	solaar
DISTVERSION=	1.1.20
CATEGORIES=	sysutils

MAINTAINER=	ports@FreeBSD.org
COMMENT=	Device manager for Logitech Unifying and Bolt receivers
WWW=		https://pwr-solaar.github.io/Solaar/

LICENSE=	GPLv2+
LICENSE_FILE=	${WRKSRC}/LICENSE.txt

# hidapi is dlopen'd through ctypes, so it is not a linked dependency.
# logitech_receiver imports Gdk, so the GTK typelib is needed even for the
# command line interface.
RUN_DEPENDS=	${LOCALBASE}/lib/libhidapi.so:comms/hidapi \
		${LOCALBASE}/lib/girepository-1.0/Gdk-3.0.typelib:x11-toolkits/gtk30 \
		${PYTHON_PKGNAMEPREFIX}psutil>=5.4.3:sysutils/py-psutil@${PY_FLAVOR} \
		${PYTHON_PKGNAMEPREFIX}pycairo>0:graphics/py-pycairo@${PY_FLAVOR} \
		${PYTHON_PKGNAMEPREFIX}pygobject>0:devel/py-pygobject@${PY_FLAVOR} \
		${PYTHON_PKGNAMEPREFIX}python-xlib>=0.27:x11-toolkits/py-python-xlib@${PY_FLAVOR} \
		${PYTHON_PKGNAMEPREFIX}pyyaml>=3.12:devel/py-pyyaml@${PY_FLAVOR}

USES=		python
USE_GITHUB=	yes
GH_ACCOUNT=	pwr-Solaar
GH_PROJECT=	Solaar
USE_PYTHON=	autoplist concurrent distutils optsuffix

NO_ARCH=	yes

PLIST_FILES=	etc/devd/solaar.conf

OPTIONS_DEFINE=		DBUS EVDEV
OPTIONS_DEFAULT=	DBUS EVDEV

DBUS_DESC=		Desktop notifications and suspend/resume handling
DBUS_RUN_DEPENDS=	${PYTHON_PKGNAMEPREFIX}dbus>0:devel/py-dbus@${PY_FLAVOR}

EVDEV_DESC=		Input simulation (KeyPress, MouseClick and MouseScroll rules)
EVDEV_RUN_DEPENDS=	${PYTHON_PKGNAMEPREFIX}evdev>=1.1.2:devel/py-evdev@${PY_FLAVOR}

post-install:
	@${MKDIR} ${STAGEDIR}${PREFIX}/etc/devd
	${INSTALL_DATA} ${FILESDIR}/solaar.conf \
		${STAGEDIR}${PREFIX}/etc/devd/solaar.conf

.include <bsd.port.mk>
