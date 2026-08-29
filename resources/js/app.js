import Alpine from 'alpinejs';
import {
    createIcons,
    Check,
    ShieldCheck,
    MessageCircle,
    ArrowDown,
    Lock,
    Zap,
    ArrowRight,
    Menu,
    X,
} from 'lucide';

// Initialize Alpine.js immediately (needed for FAQ accordion x-data)
window.Alpine = Alpine;
Alpine.start();

// Critical above-the-fold icons only
const criticalIcons = {
    Check,
    ShieldCheck,
    MessageCircle,
    ArrowDown,
    Lock,
    Zap,
    ArrowRight,
    Menu,
    X,
};

// Initialize critical icons immediately
function initCriticalIcons() {
    createIcons({ icons: criticalIcons });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCriticalIcons);
} else {
    initCriticalIcons();
}

// Defer loading of all remaining icons and kost.js modules
// This runs after the page has rendered (requestIdleCallback or setTimeout fallback)
function loadDeferredModules() {
    import('./app-deferred.js').then(({ initDeferredIcons, initKostModules }) => {
        initDeferredIcons();
        initKostModules();
        // Re-init for any icons that weren't in the critical set
        window.initLucide = initDeferredIcons;
    });
}

if ('requestIdleCallback' in window) {
    requestIdleCallback(loadDeferredModules);
} else {
    setTimeout(loadDeferredModules, 200);
}
