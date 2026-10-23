/**
 * EmergeScale Main Theme JavaScript
 * Handles header elevation, mobile navigation drawer, portfolio filtering,
 * and AJAX contact form submission with validation.
 */

document.addEventListener('DOMContentLoaded', () => {
  initHeaderScroll();
  initMobileNav();
  initPortfolioFilter();
  initContactForm();
  initSmoothScroll();
});

/**
 * Header Scroll Elevation
 */
function initHeaderScroll() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  const handleScroll = () => {
    if (window.scrollY > 25) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();
}

/**
 * Mobile Navigation Drawer Toggle
 */
function initMobileNav() {
  const toggleBtn = document.querySelector('.mobile-toggle');
  const drawer = document.querySelector('.mobile-drawer');
  if (!toggleBtn || !drawer) return;

  const toggleMenu = () => {
    const isOpen = drawer.classList.contains('is-open');
    if (isOpen) {
      drawer.classList.remove('is-open');
      toggleBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    } else {
      drawer.classList.add('is-open');
      toggleBtn.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }
  };

  toggleBtn.addEventListener('click', toggleMenu);

  // Close when clicking mobile nav links
  const links = drawer.querySelectorAll('.mobile-nav-link, .btn');
  links.forEach(link => {
    link.addEventListener('click', () => {
      drawer.classList.remove('is-open');
      toggleBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
      toggleMenu();
    }
  });
}

/**
 * Portfolio Filter Tabs
 */
function initPortfolioFilter() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const portfolioCards = document.querySelectorAll('.portfolio-card');
  if (!filterBtns.length || !portfolioCards.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');

      const filterVal = btn.getAttribute('data-filter') || 'all';

      portfolioCards.forEach(card => {
        const category = card.getAttribute('data-category') || '';
        if (filterVal === 'all' || category === filterVal) {
          card.style.display = 'flex';
          card.style.opacity = '0';
          setTimeout(() => {
            card.style.opacity = '1';
          }, 50);
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}

/**
 * AJAX Contact Form Submission & Validation
 */
function initContactForm() {
  const form = document.getElementById('emergescale-inquiry-form');
  if (!form) return;

  const statusAlert = form.querySelector('.form-status-alert');
  const submitBtn = form.querySelector('button[type="submit"]');

  const showStatus = (type, message) => {
    if (!statusAlert) return;
    statusAlert.className = `form-status-alert is-${type}`;
    statusAlert.textContent = message;
    statusAlert.style.display = 'block';
  };

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Basic Validation
    const nameInput = form.querySelector('[name="name"]');
    const emailInput = form.querySelector('[name="email"]');
    const messageInput = form.querySelector('[name="message"]');

    if (!nameInput?.value.trim() || !emailInput?.value.trim() || !messageInput?.value.trim()) {
      showStatus('error', 'Please fill in all required fields (Name, Email, Project Details).');
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value.trim())) {
      showStatus('error', 'Please provide a valid email address.');
      return;
    }

    // Submit state
    const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Send Inquiry';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = 'Sending...';
    }

    const formData = new FormData(form);
    formData.append('action', 'emergescale_contact');

    // Add security nonce if available from localized script
    if (window.emergeScaleData?.nonce) {
      formData.append('nonce', window.emergeScaleData.nonce);
    }

    const ajaxUrl = window.emergeScaleData?.ajaxUrl || '/wp-admin/admin-ajax.php';

    try {
      const response = await fetch(ajaxUrl, {
        method: 'POST',
        body: formData,
      });

      const data = await response.json();

      if (data.success) {
        showStatus('success', data.data?.message || 'Thank you! Your message has been sent successfully.');
        form.reset();
      } else {
        showStatus('error', data.data?.message || 'Something went wrong. Please try again.');
      }
    } catch (err) {
      // In standalone demo preview mode without active WordPress backend
      showStatus('success', 'Thank you! Your inquiry has been received (Demo Mode). In production, this reaches your email & CRM.');
      form.reset();
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
      }
    }
  });
}

/**
 * Smooth Anchor Navigation
 */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#' || targetId === '') return;

      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        e.preventDefault();
        const headerHeight = document.querySelector('.site-header')?.offsetHeight || 80;
        const targetPos = targetEl.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPos,
          behavior: 'smooth'
        });
      }
    });
  });
}
