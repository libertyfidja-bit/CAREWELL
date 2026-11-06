// Carewell — client-side behaviour (search, auth demo, booking)

// ─── CAREWELL HOME ───────────────────────────────────────────
const careSearch = document.getElementById('center-search');
const centerGrid = document.getElementById('center-grid');
const noResults = document.getElementById('no-results');
if (careSearch && centerGrid) {
    const filterCenters = () => {
        const query = careSearch.value.trim().toLowerCase();
        let visible = 0;
        centerGrid.querySelectorAll('.center-card').forEach(card => {
            const matches = !query || card.dataset.search.includes(query);
            card.hidden = !matches;
            if (matches) visible += 1;
        });
        if (noResults) noResults.hidden = visible !== 0;
    };
    careSearch.addEventListener('input', filterCenters);
    document.getElementById('search-button')?.addEventListener('click', () => {
        filterCenters();
        document.getElementById('centers')?.scrollIntoView({ behavior: 'smooth' });
    });
}

const menuButton = document.getElementById('menu-button');
const careNav = document.getElementById('care-nav');
if (menuButton && careNav) {
    menuButton.addEventListener('click', () => {
        const open = careNav.classList.toggle('open');
        menuButton.setAttribute('aria-expanded', String(open));
    });
}

const bookingForm = document.getElementById('booking-form');
const careToast = document.getElementById('care-toast');
const authOverlay = document.getElementById('auth-overlay');
const authForm = document.getElementById('auth-form');
const authSwitch = document.getElementById('auth-switch');
const authClose = document.getElementById('auth-close');
const authActions = document.querySelectorAll('[data-auth-action]');
const bookingLinks = document.querySelectorAll('.booking-link');
const authSignupFields = document.querySelectorAll('.auth-signup-only');
let authMode = 'login';

const getAccounts = () => JSON.parse(localStorage.getItem('carewellAccounts') || '[]');
const getCurrentUser = () => JSON.parse(localStorage.getItem('carewellCurrentUser') || 'null');
const showCareToast = message => {
    if (!careToast) return;
    careToast.textContent = message;
    careToast.classList.add('show');
    setTimeout(() => careToast.classList.remove('show'), 4500);
};

const setAuthMode = mode => {
    authMode = mode;
    const signup = mode === 'signup';
    document.getElementById('auth-eyebrow').textContent = signup ? 'Join Carewell' : 'Welcome back';
    document.getElementById('auth-title').textContent = signup ? 'Create your care account.' : 'Sign in to your care.';
    document.getElementById('auth-copy').textContent = signup ? 'Save appointments and find thoughtful care whenever you need it.' : 'Access your appointments and continue booking with Carewell.';
    document.getElementById('auth-submit').innerHTML = `${signup ? 'Create account' : 'Sign in'} <span>↗</span>`;
    document.getElementById('auth-switch-label').textContent = signup ? 'Already have an account?' : 'New to Carewell?';
    authSwitch.textContent = signup ? 'Sign in' : 'Create an account';
    authSignupFields.forEach(field => {
        field.hidden = !signup;
        field.querySelectorAll('input').forEach(input => input.required = signup);
    });
};

const openAuth = mode => {
    setAuthMode(mode);
    authOverlay.removeAttribute('hidden');
    document.getElementById('auth-email')?.focus();
};

const updateAuthUI = () => {
    const user = getCurrentUser();
    const loginButton = document.querySelector('[data-auth-action="login"]');
    if (!loginButton) return;
    loginButton.textContent = user ? `Sign out, ${user.name.split(' ')[0]}` : 'Sign in';
    loginButton.setAttribute('aria-label', user ? 'Sign out' : 'Sign in');
    const headerBooking = document.querySelector('.care-header-actions .booking-link');
    if (headerBooking) {
        headerBooking.classList.toggle('is-signed-in', Boolean(user));
        headerBooking.innerHTML = user ? 'My appointment <span>↗</span>' : 'Book an appointment <span>↗</span>';
    }
    const bookingEmail = document.getElementById('booking-email');
    if (bookingEmail && user) bookingEmail.value = user.email;
};

authActions.forEach(action => action.addEventListener('click', () => {
    if (getCurrentUser()) {
        localStorage.removeItem('carewellCurrentUser');
        updateAuthUI();
        showCareToast('You have been signed out.');
        return;
    }
    openAuth('login');
}));

authSwitch?.addEventListener('click', () => setAuthMode(authMode === 'login' ? 'signup' : 'login'));
authClose?.addEventListener('click', () => { authOverlay.setAttribute('hidden', ''); });
authOverlay?.addEventListener('click', event => {
    if (event.target === authOverlay) authOverlay.setAttribute('hidden', '');
});

authForm?.addEventListener('submit', event => {
    event.preventDefault();
    const email = document.getElementById('auth-email').value.trim().toLowerCase();
    const password = document.getElementById('auth-password').value;
    const accounts = getAccounts();
    if (authMode === 'signup') {
        const name = document.getElementById('auth-name').value.trim();
        const confirmation = document.getElementById('auth-confirm-password').value;
        if (password !== confirmation) {
            showCareToast('Your passwords do not match.');
            return;
        }
        if (accounts.some(account => account.email === email)) {
            showCareToast('An account with this email already exists.');
            setAuthMode('login');
            return;
        }
        const account = { name, email, password };
        localStorage.setItem('carewellAccounts', JSON.stringify([...accounts, account]));
        localStorage.setItem('carewellCurrentUser', JSON.stringify({ name, email }));
        authOverlay.setAttribute('hidden', '');
        authForm.reset();
        updateAuthUI();
        showCareToast('Account created. You are now signed in.');
        return;
    }
    const account = accounts.find(item => item.email === email && item.password === password);
    if (!account) {
        showCareToast('Email or password is incorrect.');
        return;
    }
    localStorage.setItem('carewellCurrentUser', JSON.stringify({ name: account.name, email: account.email }));
    authOverlay.setAttribute('hidden', '');
    authForm.reset();
    updateAuthUI();
    showCareToast(`Welcome back, ${account.name.split(' ')[0]}.`);
});

bookingLinks.forEach(link => link.addEventListener('click', event => {
    if (!getCurrentUser()) {
        event.preventDefault();
        openAuth('login');
        showCareToast('Sign in or create an account to book an appointment.');
    }
}));

if (bookingForm && careToast) {
    bookingForm.addEventListener('submit', event => {
        event.preventDefault();
        const user = getCurrentUser();
        if (!user) {
            openAuth('login');
            showCareToast('Please sign in before booking.');
            return;
        }
        localStorage.setItem('carewellAppointment', JSON.stringify({ email: user.email, createdAt: new Date().toISOString() }));
        showCareToast('Appointment request received. Our care team will contact you shortly.');
    });
}

updateAuthUI();
