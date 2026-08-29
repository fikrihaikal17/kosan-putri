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
    MessageCircle,
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
    Shield,
    Clock,
    Phone,
    ArrowRight,
    ArrowLeft,
    Star,
    Info,
    AlertCircle,
    RefreshCw,
    Search,
    User,
    Compass,
    SlidersHorizontal,
    Heart,
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
    MessageCircle,
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
    Shield,
    Clock,
    Phone,
    ArrowRight,
    ArrowLeft,
    Star,
    Info,
    AlertCircle,
    RefreshCw,
    Search,
    User,
    Compass,
    SlidersHorizontal,
    Heart,
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

