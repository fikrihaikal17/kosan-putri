import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';
import './kost.js';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize Lucide Icons
function initLucide() {
    createIcons({ icons });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLucide);
} else {
    initLucide();
}

// Re-init when chat opens or new elements are added
window.initLucide = initLucide;
document.addEventListener('DOMContentLoaded', () => {
    initLucide();
    setTimeout(initLucide, 100);
});
