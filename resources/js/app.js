import Alpine from 'alpinejs';
import {
    createIcons,
    Home,
    Bed,
    Wifi,
    Zap,
    Droplets,
    Utensils,
    Bike,
    Sun,
    Lock,
    Key,
    Bath,
    Wind,
    Sparkles,
    Check,
    CheckCircle,
    ShieldCheck,
    Users,
    MessageCircle,
    MessageSquare,
    MessageSquareText,
    Send,
    X,
    Menu,
    ChevronLeft,
    ChevronRight,
    ChevronDown,
    ChevronUp,
    MapPin,
    Map,
    Navigation,
    ExternalLink,
    Copy,
    Image,
    Calendar,
    HelpCircle,
    Clock,
    Phone,
    ArrowRight,
    ArrowLeft,
    ArrowDown,
} from 'lucide';
import './kost.js';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

const appIcons = {
    Home,
    Bed,
    Wifi,
    Zap,
    Droplets,
    Utensils,
    Bike,
    Sun,
    Lock,
    Key,
    Bath,
    Wind,
    Sparkles,
    Check,
    CheckCircle,
    ShieldCheck,
    Users,
    MessageCircle,
    MessageSquare,
    MessageSquareText,
    Send,
    X,
    Menu,
    ChevronLeft,
    ChevronRight,
    ChevronDown,
    ChevronUp,
    MapPin,
    Map,
    Navigation,
    ExternalLink,
    Copy,
    Image,
    Calendar,
    HelpCircle,
    Clock,
    Phone,
    ArrowRight,
    ArrowLeft,
    ArrowDown,
};

// Initialize Lucide Icons
function initLucide() {
    createIcons({ icons: appIcons });
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

