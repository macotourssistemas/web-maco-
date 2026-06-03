/**
 * Maco Tours — site interactions (header, carousel, scroll)
 */

// Global Guard - Prevent double execution (e.g., from security extensions virtualizing the script)
if (window.__MACOTOURS_MAIN_JS_LOADED__) {
  console.log('DEBUG: main.js already loaded globally (possibly by security extension), aborting re-execution.');
} else {
  window.__MACOTOURS_MAIN_JS_LOADED__ = true;
  console.log('DEBUG: main.js loading for the first time.');

document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  console.log('DEBUG: DOMContentLoaded fired');

  /**
   * Global Image Error Handler
   * Replaces broken images with a fallback placeholder.
   */
  window.addEventListener('error', function(e) {
    if (e.target.tagName === 'IMG') {
      // Prevent infinite loop if the placeholder also fails
      if (e.target.getAttribute('data-error-handled')) return;
      e.target.setAttribute('data-error-handled', 'true');
      
      console.warn('Image load failed:', e.target.src);
      if (e.target.closest('.logo')) return;
      e.target.src = 'assets/img/logo-transparent.png';
      e.target.alt = 'Imagen no disponible';
    }
  }, true); // Capture phase is essential for 'error' events

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    console.log('DEBUG: Preloader found in DOM');

    // Function to remove preloader
    const removePreloader = (source) => {
      console.log(`DEBUG: Attempting to remove preloader. Source: ${source}`);
      const preloaderEl = document.querySelector('#preloader');
      if (preloaderEl) {
        // Try multiple methods to ensure it's gone
        preloaderEl.style.display = 'none';
        preloaderEl.style.opacity = '0';
        preloaderEl.style.visibility = 'hidden';
        preloaderEl.classList.add('preloader-hidden');
        try {
          preloaderEl.remove();
          console.log('DEBUG: Preloader removed successfully');
        } catch(e) {
          console.log('DEBUG: Preloader removal failed, but hidden via CSS');
        }
      } else {
        console.log('DEBUG: Preloader was already removed');
      }
    };

    // Force content visible function
    const forceContentVisible = () => {
      console.log('DEBUG: Forcing AOS elements visible');
      document.querySelectorAll('[data-aos]').forEach(el => {
        el.classList.add('aos-animate');
        el.style.opacity = '1';
        el.style.visibility = 'visible';
        el.style.transform = 'none';
      });
    };

    // Remove on load, but give a tiny delay to let AOS init
    window.addEventListener('load', () => {
      console.log('DEBUG: Window load event fired');
      setTimeout(() => {
        removePreloader('window.load');
        // Force visibility after preloader removed
        setTimeout(forceContentVisible, 500);
      }, 100); 
    });

    // Safety timeout: remove after 2.5 seconds max
    setTimeout(() => {
      removePreloader('safety_timeout');
    }, 2500);

    // NUCLEAR OPTION: Force everything visible after 3 seconds no matter what
    setTimeout(() => {
      console.log('DEBUG: NUCLEAR OPTION - Forcing all content visible');
      removePreloader('nuclear_timeout');
      forceContentVisible();
    }, 3000);

    // If page is already loaded (cached), remove immediately
    if (document.readyState === 'complete') {
      console.log('DEBUG: Document already complete');
      removePreloader('document.readyState');
    }
  } else {
    console.log('DEBUG: Preloader NOT found in DOM');
  }

  let headerScrollBound = false;

  window.initHeaderBehavior = function () {
    const selectHeader = document.querySelector("#header");
    if (!selectHeader || headerScrollBound) return;
    headerScrollBound = true;

    const onScroll = () => {
      window.scrollY > 40
        ? selectHeader.classList.add("sticked")
        : selectHeader.classList.remove("sticked");
    };

    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });

    if (typeof window.initSiteUI === "function") {
      window.initSiteUI();
    }
  };

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));
  }

  // Initialize on load (for pages with static header)
  window.initHeaderBehavior();

  /**
   * Initiate pURE cOUNTER
   */
  new PureCounter();

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init swiper slider with 1 slide at once in desktop view
   */
  new Swiper('.slides-1', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    console.log('DEBUG: Initializing AOS');
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }

  // Initialize AOS immediately so elements are prepared (hidden) if needed
  // aos_init(); // Moved to window load to Ensure proper height calculation

  window.addEventListener('load', () => {
    console.log('DEBUG: Triggering AOS init on load');
    aos_init();
    setTimeout(() => {
      console.log('DEBUG: Refreshing AOS');
      AOS.refresh();
    }, 100);
    initClientsSwiper();
  });

  function initClientsSwiper() {
    const el = document.querySelector('.clients-swiper');
    const wrapper = el?.querySelector('.swiper-wrapper');
    if (!el || !wrapper || typeof Swiper === 'undefined') return;

    if (window.MACO_CLIENT_LOGOS?.length && !wrapper.children.length) {
      window.MACO_CLIENT_LOGOS.forEach((src) => {
        const slide = document.createElement('div');
        slide.className = 'swiper-slide flex items-center justify-center py-4';
        slide.innerHTML = `<img src="${src}" alt="Cliente Maco Tours" loading="lazy">`;
        wrapper.appendChild(slide);
      });
    }

    new Swiper('.clients-swiper', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      slidesPerView: 2,
      spaceBetween: 24,
      pagination: {
        el: '.clients-swiper .swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: { slidesPerView: 3 },
        1024: { slidesPerView: 5 },
      },
    });
  }

}); // End DOMContentLoaded

} // End Global Guard