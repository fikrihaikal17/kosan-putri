/**
 * Kost Putri Ibu Idah - Interactive Modules
 * Clean, lightweight, zero external bloat, accessible
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initMobileMenu();
    initRoomModal();
    initGalleryLightbox();
    initFaqAccordion();
    initTanyaKostAi();
    initLazyMaps();
});

/* --------------------------------------------------------------------------
 * 1. Navbar Scroll Effect
 * -------------------------------------------------------------------------- */
function initNavbar() {
    const navbar = document.getElementById('main-navbar');
    if (!navbar) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-sm', 'bg-white/95', 'py-3');
            navbar.classList.remove('bg-cream-100/90', 'py-5');
        } else {
            navbar.classList.remove('shadow-sm', 'bg-white/95', 'py-3');
            navbar.classList.add('bg-cream-100/90', 'py-5');
        }
    }, { passive: true });
}

/* --------------------------------------------------------------------------
 * 2. Mobile Menu (Drawer)
 * -------------------------------------------------------------------------- */
function initMobileMenu() {
    const toggleBtn = document.getElementById('mobile-menu-toggle');
    const closeBtn = document.getElementById('mobile-menu-close');
    const drawer = document.getElementById('mobile-menu-drawer');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    const navLinks = document.querySelectorAll('.mobile-nav-link');

    if (!toggleBtn || !drawer) return;

    const openMenu = () => {
        drawer.classList.remove('translate-x-full');
        if (backdrop) backdrop.classList.remove('hidden', 'opacity-0');
        document.body.style.overflow = 'hidden';
        toggleBtn.setAttribute('aria-expanded', 'true');
    };

    const closeMenu = () => {
        drawer.classList.add('translate-x-full');
        if (backdrop) backdrop.classList.add('opacity-0');
        setTimeout(() => {
            if (backdrop) backdrop.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
        toggleBtn.setAttribute('aria-expanded', 'false');
    };

    toggleBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (backdrop) backdrop.addEventListener('click', closeMenu);

    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !drawer.classList.contains('translate-x-full')) {
            closeMenu();
        }
    });
}

/* --------------------------------------------------------------------------
 * 3. Room Details Modal
 * -------------------------------------------------------------------------- */
function initRoomModal() {
    const modal = document.getElementById('room-detail-modal');
    if (!modal) return;

    const closeBtns = modal.querySelectorAll('.room-modal-close');
    const modalTitle = document.getElementById('room-modal-title');
    const modalBadge = document.getElementById('room-modal-badge');
    const modalDesc = document.getElementById('room-modal-desc');
    const modalFacilities = document.getElementById('room-modal-facilities');
    const modalNotes = document.getElementById('room-modal-notes');
    const modalWaBtn = document.getElementById('room-modal-wa-btn');
    const modalPrice = document.getElementById('room-modal-price');

    const openBtns = document.querySelectorAll('.open-room-modal');

    const openModal = (data) => {
        if (modalTitle) modalTitle.textContent = data.name || '';
        if (modalBadge) modalBadge.textContent = data.bathroomType || '';
        if (modalDesc) modalDesc.textContent = data.desc || '';
        if (modalNotes) modalNotes.textContent = data.notes || '';
        if (modalPrice) modalPrice.textContent = data.priceLabel || 'Hubungi untuk informasi harga';

        if (modalFacilities && data.facilities) {
            modalFacilities.innerHTML = '';
            const list = Array.isArray(data.facilities) ? data.facilities : JSON.parse(data.facilities);
            list.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-center gap-2 text-sm text-sage-900';
                li.innerHTML = `
                    <svg class="w-4 h-4 text-sage-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>${item}</span>
                `;
                modalFacilities.appendChild(li);
            });
        }

        if (modalWaBtn && data.waUrl) {
            modalWaBtn.href = data.waUrl;
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    const closeModal = () => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    openBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const data = {
                name: btn.dataset.name,
                bathroomType: btn.dataset.bathroomType,
                desc: btn.dataset.desc,
                priceLabel: btn.dataset.priceLabel,
                facilities: btn.dataset.facilities,
                notes: btn.dataset.notes,
                waUrl: btn.dataset.waUrl,
            };
            openModal(data);
        });
    });

    closeBtns.forEach(btn => btn.addEventListener('click', closeModal));

    modal.addEventListener('click', (e) => {
        if (e.target === modal || e.target.classList.contains('modal-backdrop')) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
}

/* --------------------------------------------------------------------------
 * 4. Gallery Lightbox
 * -------------------------------------------------------------------------- */
function initGalleryLightbox() {
    const lightbox = document.getElementById('gallery-lightbox');
    if (!lightbox) return;

    const items = document.querySelectorAll('.gallery-item');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxPlaceholder = document.getElementById('lightbox-placeholder');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const closeBtn = document.getElementById('lightbox-close');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');

    let currentIndex = 0;
    const galleryData = [];

    items.forEach((item, index) => {
        galleryData.push({
            title: item.dataset.title || '',
            caption: item.dataset.caption || '',
            imgSrc: item.dataset.src || item.dataset.img || '',
            category: item.dataset.category || '',
        });

        item.addEventListener('click', () => {
            currentIndex = index;
            showLightbox(currentIndex);
        });
    });

    function showLightbox(index) {
        if (index < 0 || index >= galleryData.length) return;
        const current = galleryData[index];

        if (lightboxTitle) lightboxTitle.textContent = current.title;
        if (lightboxCaption) lightboxCaption.textContent = current.caption;

        if (lightboxImg && current.imgSrc) {
            lightboxImg.src = current.imgSrc;
            lightboxImg.alt = current.title;
            lightboxImg.classList.remove('hidden');
            if (lightboxPlaceholder) lightboxPlaceholder.classList.add('hidden');
        } else if (lightboxPlaceholder) {
            if (lightboxImg) lightboxImg.classList.add('hidden');
            lightboxPlaceholder.classList.remove('hidden');
        }

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % galleryData.length;
        showLightbox(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + galleryData.length) % galleryData.length;
        showLightbox(currentIndex);
    }

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (nextBtn) nextBtn.addEventListener('click', nextImage);
    if (prevBtn) prevBtn.addEventListener('click', prevImage);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox || e.target.classList.contains('lightbox-backdrop')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    });

    // Touch Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;

    lightbox.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    lightbox.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchEndX < touchStartX - 50) {
            nextImage();
        }
        if (touchEndX > touchStartX + 50) {
            prevImage();
        }
    }, { passive: true });
}

/* --------------------------------------------------------------------------
 * 5. FAQ Accordion
 * -------------------------------------------------------------------------- */
function initFaqAccordion() {
    const faqButtons = document.querySelectorAll('.faq-toggle-btn');

    faqButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');

            // Close all others
            faqButtons.forEach(otherBtn => {
                if (otherBtn !== btn) {
                    otherBtn.setAttribute('aria-expanded', 'false');
                    if (otherBtn.nextElementSibling) {
                        otherBtn.nextElementSibling.classList.add('hidden');
                    }
                    const otherIcon = otherBtn.querySelector('.faq-icon');
                    if (otherIcon) otherIcon.classList.remove('rotate-180');
                }
            });

            // Toggle current
            if (isExpanded) {
                btn.setAttribute('aria-expanded', 'false');
                if (answer) answer.classList.add('hidden');
                if (icon) icon.classList.remove('rotate-180');
            } else {
                btn.setAttribute('aria-expanded', 'true');
                if (answer) answer.classList.remove('hidden');
                if (icon) icon.classList.add('rotate-180');
            }
        });
    });
}

/* --------------------------------------------------------------------------
 * 6. AI "Tanya Kost" Chat Widget
 * -------------------------------------------------------------------------- */
function initTanyaKostAi() {
    const widget = document.getElementById('tanya-kost-widget');
    const openBtn = document.getElementById('tanya-kost-open-btn');
    const closeBtn = document.getElementById('tanya-kost-close-btn');
    const form = document.getElementById('tanya-kost-form');
    const input = document.getElementById('tanya-kost-input');
    const messagesContainer = document.getElementById('tanya-kost-messages');
    const quickPrompts = document.querySelectorAll('.tanya-kost-quick-prompt');

    if (!widget || !openBtn) return;

    const toggleWidget = () => {
        const isHidden = widget.classList.contains('hidden');
        if (isHidden) {
            widget.classList.remove('hidden');
            if (input) input.focus();
        } else {
            widget.classList.add('hidden');
        }
    };

    openBtn.addEventListener('click', toggleWidget);
    if (closeBtn) closeBtn.addEventListener('click', () => widget.classList.add('hidden'));

    quickPrompts.forEach(btn => {
        btn.addEventListener('click', () => {
            const promptText = btn.textContent.trim();
            if (input) {
                input.value = promptText;
                submitQuestion(promptText);
            }
        });
    });

    if (form && input) {
        // Handle Enter to submit and Shift+Enter for newline
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                if (e.shiftKey) {
                    // Shift + Enter: Keep native newline behavior
                    return;
                } else {
                    // Enter alone: Submit question
                    e.preventDefault();
                    const text = input.value.trim();
                    if (!text) return;
                    submitQuestion(text);
                    input.style.height = 'auto';
                }
            }
        });

        // Auto-expand textarea height as user types
        input.addEventListener('input', () => {
            input.style.height = '36px';
            const newHeight = Math.min(Math.max(input.scrollHeight, 36), 84);
            input.style.height = newHeight + 'px';
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) return;
            submitQuestion(text);
            input.style.height = '36px';
        });
    }

    async function submitQuestion(question) {
        if (!messagesContainer) return;
        input.value = '';
        input.style.height = '36px';

        // Append User Message
        appendMessage('user', question);

        // Append Typing indicator
        const typingId = 'typing-' + Date.now();
        const typingElement = document.createElement('div');
        typingElement.id = typingId;
        typingElement.className = 'flex items-start gap-2';
        typingElement.innerHTML = `<div class="w-7 h-7 bg-brutal-pink border-2 border-brutal-black text-brutal-black flex items-center justify-center text-[10px] font-black shrink-0" style="background-color: #FF5E8A !important; color: #111111 !important; font-weight: 900 !important; border: 2px solid #111111 !important;">KP</div><div class="bg-white text-brutal-black border-2 border-brutal-black px-3 py-2 text-xs neo-shadow-xs flex items-center gap-1.5" style="background-color: #ffffff !important; color: #111111 !important; border: 2px solid #111111 !important; box-shadow: 2px 2px 0 #111111 !important;"><span style="font-size: 11px; font-weight: 800; color: #555555;">Mengetik</span><span style="display: inline-flex; gap: 3px; align-items: center;"><span class="w-1.5 h-1.5 rounded-full bg-brutal-black animate-bounce" style="animation-delay: 0s;"></span><span class="w-1.5 h-1.5 rounded-full bg-brutal-pink animate-bounce" style="animation-delay: 0.2s;"></span><span class="w-1.5 h-1.5 rounded-full bg-brutal-yellow animate-bounce" style="animation-delay: 0.4s;"></span></span></div>`;
        messagesContainer.appendChild(typingElement);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            // Run fetch and natural typing delay (800ms - 1100ms) in parallel so loading animation is visible
            const [response] = await Promise.all([
                fetch('/api/tanya-kost', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token || '',
                    },
                    body: JSON.stringify({ question }),
                }),
                new Promise(resolve => setTimeout(resolve, 800 + Math.floor(Math.random() * 300)))
            ]);

            const data = await response.json();
            const typingNode = document.getElementById(typingId);
            if (typingNode) typingNode.remove();

            if (data && data.answer) {
                appendMessage('ai', data.answer, data.show_wa_cta, data.wa_url);
            } else {
                appendMessage('ai', 'Maaf, layanan Tanya Kost sedang tidak tersedia. Silakan hubungi kami melalui WhatsApp.', true);
            }
        } catch (err) {
            const typingNode = document.getElementById(typingId);
            if (typingNode) typingNode.remove();
            appendMessage('ai', 'Maaf, terjadi kendala saat menghubungkan ke asisten. Silakan hubungi kami via WhatsApp.', true);
        }
    }

    function appendMessage(sender, text, showWaCta = false, waUrl = null) {
        if (!messagesContainer) return;
        const msgDiv = document.createElement('div');
        msgDiv.className = sender === 'user' ? 'flex justify-end' : 'flex items-start gap-2';
        msgDiv.style.transition = 'all 0.2s ease-out';

        const formattedText = escapeHtml(text).replace(/\n/g, '<br>');

        if (sender === 'user') {
            msgDiv.innerHTML = `<div class="bg-brutal-black text-white p-2.5 text-xs font-bold max-w-[85%] leading-relaxed border-2 border-brutal-black neo-shadow-xs" style="background-color: #111111 !important; color: #ffffff !important; border: 2px solid #111111 !important; box-shadow: 2px 2px 0 #111111 !important; word-break: break-word;"><span style="color: #ffffff !important;">${formattedText}</span></div>`;
        } else {
            let waBtnHtml = '';
            if (showWaCta) {
                const link = waUrl || 'https://wa.me/6281339259179?text=Halo%20Ibu%20Idah,%20saya%20ingin%20tanya%20seputar%20kost';
                waBtnHtml = `<div class="mt-2 pt-2 border-t-2 border-brutal-black/10"><a href="${link}" target="_blank" class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-[#25D366] hover:bg-[#1ebd5b] text-brutal-black font-extrabold text-[11px] border-2 border-brutal-black neo-shadow-xs transition-transform" style="background-color: #25D366 !important; color: #111111 !important; border: 2px solid #111111 !important; text-decoration: none !important;"><span>Hubungi Ibu Idah via WhatsApp</span><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg></a></div>`;
            }

            msgDiv.innerHTML = `<div class="w-7 h-7 bg-brutal-pink border-2 border-brutal-black text-brutal-black flex items-center justify-center text-[10px] font-black shrink-0" style="background-color: #FF5E8A !important; color: #111111 !important; font-weight: 900 !important; border: 2px solid #111111 !important;">KP</div><div class="bg-white text-brutal-black border-2 border-brutal-black p-2.5 text-xs font-medium leading-relaxed max-w-[85%] neo-shadow-xs" style="background-color: #ffffff !important; color: #111111 !important; border: 2px solid #111111 !important; box-shadow: 2px 2px 0 #111111 !important; word-break: break-word;"><p style="color: #111111 !important; margin: 0; line-height: 1.55; font-weight: 600; text-align: justify; text-justify: inter-word;">${formattedText}</p>${waBtnHtml}</div>`;
        }

        messagesContainer.appendChild(msgDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    function escapeHtml(string) {
        const div = document.createElement('div');
        div.textContent = string;
        return div.innerHTML;
    }
}

/* --------------------------------------------------------------------------
 * 7. Lazy Load Maps on Scroll
 * -------------------------------------------------------------------------- */
function initLazyMaps() {
    const lazyIframes = document.querySelectorAll('iframe.lazy-map');
    if (!lazyIframes.length) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const iframe = entry.target;
                    if (iframe.dataset.src) {
                        iframe.src = iframe.dataset.src;
                    }
                    obs.unobserve(iframe);
                }
            });
        }, { rootMargin: '300px' });

        lazyIframes.forEach(iframe => observer.observe(iframe));
    } else {
        lazyIframes.forEach(iframe => {
            if (iframe.dataset.src) iframe.src = iframe.dataset.src;
        });
    }
}

